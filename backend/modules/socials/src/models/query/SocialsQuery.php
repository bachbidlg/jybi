<?php

namespace milkyway\socials\models\query;

use milkyway\socials\models\Socials;

/**
 * This is the ActiveQuery class for [[Socials]].
 *
 * @see Socials
 */
class SocialsQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([Socials::tableName() . '.status' => Socials::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([Socials::tableName() . '.status' => Socials::STATUS_DISABLED]);
    }
}
