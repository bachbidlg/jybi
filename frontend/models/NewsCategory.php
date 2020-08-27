<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/10/2020
 * Time: 09:32
 */

namespace frontend\models;

use milkyway\language\models\table\LanguageTable;
use milkyway\news\models\table\NewsCategoryTable;
use yii\helpers\Url;

class NewsCategory extends NewsCategoryTable
{
    public static function getMenu($type = null, $current = null, $category = null, $get_published = true, $data = null, $prefix = '')
    {
        if ($data == null) $data = [];
        $default_language = LanguageTable::getDefaultLanguage();
        $query = self::find()->joinWith(['newsCategoryLanguage'])->where([self::tableName() . '.category' => $category])->sort()->groupBy([self::tableName() . '.id']);
        if ($type !== null) $query->andWhere([self::tableName() . '.type' => $type]);
        if ($get_published === true) $query->published();
        $rows = $query->all();
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                if ($current === $row->primaryKey) continue;
                $language = $default_language !== null ? $default_language->primaryKey : array_keys($row->newsCategoryLanguage)[0];
                $data[$row->primaryKey] = [
                    'id' => $row->primaryKey,
                    'name' => $prefix . $row->newsCategoryLanguage[$language]->name,
                    'url' => Url::toRoute(['/news/index', 'slug' => $row->slug]),
                    'icon' => $row->icon,
                    'children' => self::getMenu($type, $current, $row->primaryKey, $get_published, [], $prefix)
                ];
            }
        }
        return $data;
    }

    public static function getMenuMain()
    {
        $query = self::find()
            ->joinWith(['newsCategoryLanguage'])
            ->andWhere([self::tableName() . '.menu_main' => self::STATUS_PUBLISHED])
            ->published()
            ->sort();
        return $query->all();
    }

    public static function getMenuFooter()
    {
        $query = self::find()
            ->joinWith(['newsCategoryLanguage'])
            ->andWhere([self::tableName() . '.type' => self::TYPE_SUPPORT, self::tableName() . '.category' => null])
            ->published()
            ->sort();
        return $query->all();
    }

    public static function getDuAn()
    {
        return self::find()
            ->where([
                self::tableName() . '.type' => self::TYPE_PROJECT,
                self::tableName() . '.menu_main' => self::STATUS_PUBLISHED
            ])
            ->published()
            ->sort(SORT_DESC)
            ->one();
    }

    public static function getOneProjectDesign()
    {
        return self::find()->where([
            self::tableName() . '.type' => self::TYPE_PROJECT,
            self::tableName() . '.type_du_an' => self::TYPE_DU_AN_THIET_KE
        ])
            ->published()
            ->sort()
            ->one();
    }

    public static function findCategoryChildByTypeDuAn($alias, $type_du_an)
    {
        $query = self::find()
            ->where(self::tableName() . ".alias LIKE '{$alias}%'")
            ->andWhere(['<>', self::tableName() . '.alias', $alias])
            ->andWhere([self::tableName() . '.type_du_an' => $type_du_an]);
        return $query->all();
    }
}