<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/9/2020
 * Time: 10:10
 */

namespace frontend\models\form;

use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

class ContactForm extends ActiveRecord
{
    public static function tableName()
    {
        return 'contact';
    }

    public function behaviors()
    {
        return [
            'created_at' => [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                ],
                'value' => time()
            ]
        ];
    }

    public function rules()
    {
        return [
            [['full_name', 'phone', 'message'], 'required'],
            [['full_name', 'phone', 'email', 'subject'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['message'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'full_name' => \Yii::t('frontend', 'Họ và tên'),
            'phone' => \Yii::t('frontend', 'Số điện thoại'),
            'email' => \Yii::t('frontend', 'Email'),
            'subject' => \Yii::t('frontend', 'Tiêu đề'),
            'message' => \Yii::t('frontend', 'Nội dung'),
        ];
    }
}