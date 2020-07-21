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
            ->where(self::tableName() . '.category IS NULL')
            ->andWhere([self::tableName() . '.menu_main' => self::STATUS_PUBLISHED])
            ->published()
            ->sort();
        return $query->all();
    }
}