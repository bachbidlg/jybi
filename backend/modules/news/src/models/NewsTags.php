<?php

namespace milkyway\news\models;

use common\helpers\MyHelper;
use common\models\User;
use milkyway\news\NewsModule;
use milkyway\news\models\table\NewsTagsTable;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "news_tags".
 *
 * @property int $id
 * @property string $tag
 * @property string $slug
 */
class NewsTags extends NewsTagsTable
{
    public $toastr_key = 'news-tags';

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
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tag', 'slug'], 'required'],
            [['id'], 'integer'],
            [['tag', 'slug'], 'string', 'max' => 255],
            [['tag'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => NewsModule::t('news', 'ID'),
            'tag' => NewsModule::t('news', 'Tag'),
            'slug' => NewsModule::t('news', 'Slug'),
        ];
    }
}
