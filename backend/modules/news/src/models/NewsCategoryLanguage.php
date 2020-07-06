<?php

namespace milkyway\news\models;

use common\helpers\MyHelper;
use common\models\User;
use milkyway\language\models\Language;
use milkyway\language\models\table\LanguageTable;
use milkyway\news\NewsModule;
use milkyway\news\models\table\NewsCategoryLanguageTable;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "news_category_language".
 *
 * @property int $news_category_id
 * @property int $language_id
 * @property string $name
 * @property string $description
 * @property array $metadata
 *
 * @property Language $language
 * @property NewsCategory $newsCategory
 */
class NewsCategoryLanguage extends NewsCategoryLanguageTable
{
    const SCENARIO_UPDATE = 'update';
    public $toastr_key = 'news-category-language';

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
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news_category_id'], 'required', 'on' => self::SCENARIO_UPDATE],
            [['language_id', 'name'], 'required'],
            [['news_category_id', 'language_id'], 'integer'],
            [['description'], 'string'],
            [['metadata'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['news_category_id', 'language_id'], 'unique', 'targetAttribute' => ['news_category_id', 'language_id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::class, 'targetAttribute' => ['language_id' => 'id']],
            [['news_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsCategory::class, 'targetAttribute' => ['news_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'news_category_id' => NewsModule::t('news', 'News Category ID'),
            'language_id' => NewsModule::t('news', 'Language ID'),
            'name' => NewsModule::t('news', 'Name'),
            'description' => NewsModule::t('news', 'Description'),
            'metadata' => NewsModule::t('news', 'Metadata'),
        ];
    }
}
