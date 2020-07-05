<?php

namespace milkyway\news\models;

use common\helpers\MyHelper;
use common\models\User;
use milkyway\news\NewsModule;
use milkyway\news\models\table\NewsCategoryTable;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "news_category".
*
    * @property int $id
    * @property string $slug
    * @property int $category
    * @property string $image
    * @property int $status
    * @property int $sort Thứ tự
    * @property int $created_at
    * @property int $created_by
    * @property int $updated_at
    * @property int $updated_by
    * @property string $alias
    *
            * @property NewsCategory $category0
            * @property NewsCategory[] $newsCategories
            * @property User $createdBy
            * @property User $updatedBy
            * @property NewsCategoryLanguage[] $newsCategoryLanguages
            * @property Language[] $languages
    */
class NewsCategory extends NewsCategoryTable
{
    public $toastr_key = 'news-category';
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
                        return MyHelper::createAlias($this->id);
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
			[['category', 'status', 'sort', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
			[['slug', 'image'], 'string', 'max' => 255],
			[['alias'], 'string', 'max' => 500],
			[['category'], 'exist', 'skipOnError' => true, 'targetClass' => NewsCategory::class, 'targetAttribute' => ['category' => 'id']],
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
            'id' => NewsModule::t('news', 'ID'),
            'slug' => NewsModule::t('news', 'Slug'),
            'category' => NewsModule::t('news', 'Category'),
            'image' => NewsModule::t('news', 'Image'),
            'status' => NewsModule::t('news', 'Status'),
            'sort' => NewsModule::t('news', 'Sort'),
            'created_at' => NewsModule::t('news', 'Created At'),
            'created_by' => NewsModule::t('news', 'Created By'),
            'updated_at' => NewsModule::t('news', 'Updated At'),
            'updated_by' => NewsModule::t('news', 'Updated By'),
            'alias' => NewsModule::t('news', 'Alias'),
        ];
    }

    /**
    * Gets query for [[User]].
    *
    * @return \yii\db\ActiveQuery
    */
    public function getUserCreated()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
    * Gets query for [[User]].
    *
    * @return \yii\db\ActiveQuery
    */
    public function getUserUpdated()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }
}
