<?php

namespace milkyway\slider\models\query;

use milkyway\slider\models\Slider;

/**
 * This is the ActiveQuery class for [[Slider]].
 *
 * @see Slider
 */
class SliderQuery extends \yii\db\ActiveQuery
{
    public function published()
    {
        return $this->andWhere([Slider::tableName() . '.status' => Slider::STATUS_PUBLISHED]);
    }

    public function disabled()
    {
        return $this->andWhere([Slider::tableName() . '.status' => Slider::STATUS_DISABLED]);
    }
}
