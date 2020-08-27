<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/10/2020
 * Time: 09:33
 */

namespace frontend\models;


use milkyway\news\models\table\NewsTable;

class News extends NewsTable
{
    public static function getProjectDesignByAlias($alias = null, $limit = null)
    {
        $query = self::find()
            ->joinWith('categoryHasOne')
            ->where(self::tableName() . ".alias LIKE '{$alias}/%'")
            ->andWhere([
                NewsCategory::tableName() . '.type' => NewsCategory::TYPE_PROJECT,
                NewsCategory::tableName() . '.type_du_an' => NewsCategory::TYPE_DU_AN_THIET_KE
            ]);
        if ($limit != null) $query->limit($limit)->offset(0);
        $query->published()->sort();
        return $query->all();
    }
}
