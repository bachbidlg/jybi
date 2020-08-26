<?php

namespace milkyway\team\models;

use common\helpers\MyHelper;
use common\models\User;
use milkyway\team\TeamModule;
use milkyway\team\models\table\TeamCategoryTable;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "team_category".
*
    * @property int $id
    * @property string $name
    * @property string $slug
    * @property int $status 0: disabled, 1: published
    * @property int $sort
    * @property int $created_at
    * @property int $created_by
    * @property int $updated_at
    * @property int $updated_by
    *
            * @property Team[] $teams
            * @property User $createdBy
            * @property User $updatedBy
    */
class TeamCategory extends TeamCategoryTable
{
    public $toastr_key = 'team-category';
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'slug' => [
                    'class' => SluggableBehavior::class,
                    'immutable' => false,
                    'ensureUnique' => true,
                    'value' => function () {
                        return MyHelper::createAlias($this->name);
                    }
                ],
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
			[['name', 'slug'], 'required'],
			[['status', 'sort', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
			[['name', 'slug'], 'string', 'max' => 255],
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
            'id' => TeamModule::t('team', 'ID'),
            'name' => TeamModule::t('team', 'Name'),
            'slug' => TeamModule::t('team', 'Slug'),
            'status' => TeamModule::t('team', 'Status'),
            'sort' => TeamModule::t('team', 'Sort'),
            'created_at' => TeamModule::t('team', 'Created At'),
            'created_by' => TeamModule::t('team', 'Created By'),
            'updated_at' => TeamModule::t('team', 'Updated At'),
            'updated_by' => TeamModule::t('team', 'Updated By'),
        ];
    }
}
