<?php

namespace milkyway\news\models;

use common\helpers\MyHelper;
use common\models\User;
use milkyway\news\NewsModule;
use milkyway\news\models\table\NewsImagesTable;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "news_images".
 *
 * @property int $id
 * @property int $news_id
 * @property string $image
 * @property int $type Loại hình ảnh
 *
 * @property News $news
 */
class NewsImages extends NewsImagesTable
{
    const SCENARIO_UPDATE = 'update';
    public $toastr_key = 'news-images';

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
            [['news_id'], 'required'],
            [['news_id', 'type'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::class, 'targetAttribute' => ['news_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => NewsModule::t('news', 'ID'),
            'news_id' => NewsModule::t('news', 'News ID'),
            'image' => NewsModule::t('news', 'Image'),
            'type' => NewsModule::t('news', 'Type'),
        ];
    }
}
