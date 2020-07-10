<?php

namespace milkyway\partner\models;

use common\helpers\MyHelper;
use common\models\User;
use milkyway\partner\PartnerModule;
use milkyway\partner\models\table\PartnerTable;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "partner".
*
    * @property int $id
    * @property string $name
    * @property string $image
    * @property string $url
    * @property int $status
    * @property int $created_at
    * @property int $created_by
    * @property int $updated_at
    * @property int $updated_by
    *
            * @property User $createdBy
            * @property User $updatedBy
    */
class Partner extends PartnerTable
{
    public $toastr_key = 'partner';
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                [
                    'class' => BlameableBehavior::class,
                    'createdByAttribute' => 'created_by',
                    'updatedByAttribute' => 'updated_by',
                ],
                'timestamp' => [
                    'class' => 'yii\behaviors\TimestampBehavior',
                    'preserveNonEmptyValues' => true,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    ],
                ],
            ]
        );
    }

    /**
    * {@inheritdoc}
    */
    public function rules()
    {
        return [
			[['name'], 'required'],
			[['status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
			[['name', 'image', 'url'], 'string', 'max' => 255],
			[['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
			[['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'id' => PartnerModule::t('partner', 'ID'),
            'name' => PartnerModule::t('partner', 'Name'),
            'image' => PartnerModule::t('partner', 'Image'),
            'url' => PartnerModule::t('partner', 'Url'),
            'status' => PartnerModule::t('partner', 'Status'),
            'created_at' => PartnerModule::t('partner', 'Created At'),
            'created_by' => PartnerModule::t('partner', 'Created By'),
            'updated_at' => PartnerModule::t('partner', 'Updated At'),
            'updated_by' => PartnerModule::t('partner', 'Updated By'),
        ];
    }
}
