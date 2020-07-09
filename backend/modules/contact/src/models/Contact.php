<?php

namespace milkyway\contact\models;

use common\helpers\MyHelper;
use common\models\User;
use milkyway\contact\ContactModule;
use milkyway\contact\models\table\ContactTable;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "contact".
*
    * @property int $id
    * @property string $full_name
    * @property string $phone
    * @property string $email
    * @property string $subject
    * @property string $message
    * @property int $created_at
*/
class Contact extends ContactTable
{
    public $toastr_key = 'contact';
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
            ]
        );
    }

    /**
    * {@inheritdoc}
    */
    public function rules()
    {
        return [
			[['full_name', 'phone'], 'required'],
			[['message'], 'string'],
			[['created_at'], 'integer'],
			[['full_name', 'phone', 'email', 'subject'], 'string', 'max' => 255],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => ContactModule::t('contact', 'ID'),
            'full_name' => ContactModule::t('contact', 'Họ tên'),
            'phone' => ContactModule::t('contact', 'Số điện thoại'),
            'email' => ContactModule::t('contact', 'Email'),
            'subject' => ContactModule::t('contact', 'Subject'),
            'message' => ContactModule::t('contact', 'Message'),
            'created_at' => ContactModule::t('contact', 'Ngày tạo'),
        ];
    }
}
