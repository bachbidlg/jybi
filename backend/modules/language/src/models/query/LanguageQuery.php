<?php

namespace milkyway\language\models\query;

use milkyway\language\models\Language;

/**
 * This is the ActiveQuery class for [[Language]].
 *
 * @see Language
 */
class LanguageQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([Language::tableName() . '.status' => Language::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([Language::tableName() . '.status' => Language::STATUS_DISABLED]);
    }

    public function sortDescById()
    {
        return $this->orderBy([Language::tableName() . '.id' => SORT_DESC]);
    }

    public function sort($sort = SORT_ASC)
    {
        return $this->orderBy([Language::tableName() . '.sort' => $sort]);
    }
}
