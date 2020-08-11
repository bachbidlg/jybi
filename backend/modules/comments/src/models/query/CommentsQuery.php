<?php

namespace milkyway\comments\models\query;

use milkyway\comments\models\Comments;

/**
 * This is the ActiveQuery class for [[Comments]].
 *
 * @see Comments
 */
class CommentsQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([Comments::tableName() . '.status' => Comments::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([Comments::tableName() . '.status' => Comments::STATUS_DISABLED]);
    }
}
