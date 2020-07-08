<?php

namespace milkyway\news\models;

use common\helpers\MyHelper;
use common\models\User;
use milkyway\language\models\Language;
use milkyway\news\NewsModule;
use milkyway\news\models\table\NewsLanguageTable;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "news_language".
 *
 * @property int $news_id
 * @property int $language_id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $content
 * @property array $metadata
 *
 * @property Language $language
 * @property News $news
 */
class NewsLanguage extends NewsLanguageTable
{
    const SCENARIO_UPDATE = 'update';
    public $toastr_key = 'news-language';

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
            [['news_id'], 'required', 'on' => self::SCENARIO_UPDATE],
            [['language_id', 'name'], 'required'],
            [['news_id', 'language_id'], 'integer'],
            [['description', 'content'], 'string'],
            [['metadata'], 'safe'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['news_id', 'language_id'], 'unique', 'targetAttribute' => ['news_id', 'language_id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::class, 'targetAttribute' => ['language_id' => 'id']],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::class, 'targetAttribute' => ['news_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'news_id' => NewsModule::t('news', 'News ID'),
            'language_id' => NewsModule::t('news', 'Language ID'),
            'name' => NewsModule::t('news', 'Name'),
            'slug' => NewsModule::t('news', 'Slug'),
            'description' => NewsModule::t('news', 'Description'),
            'content' => NewsModule::t('news', 'Content'),
            'metadata' => NewsModule::t('news', 'Metadata'),
        ];
    }
}
