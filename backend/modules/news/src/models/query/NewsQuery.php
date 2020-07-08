<?php

namespace milkyway\news\models\query;

use milkyway\news\models\News;

/**
 * This is the ActiveQuery class for [[News]].
 *
 * @see News
 */
class NewsQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([News::tableName() . '.status' => News::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([News::tableName() . '.status' => News::STATUS_DISABLED]);
    }
}
