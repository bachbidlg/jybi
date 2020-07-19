<?php

namespace milkyway\freetype\models;

use common\helpers\MyHelper;
use common\models\User;
use milkyway\freetype\FreetypeModule;
use milkyway\freetype\models\table\FreetypeLanguageTable;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "freetype_language".
*
    * @property int $freetype_id
    * @property int $language_id
    * @property string $name
    * @property string $content
    * @property array $metadata
*/
class FreetypeLanguage extends FreetypeLanguageTable
{
    const SCENARIO_UPDATE = 'update';
    public $toastr_key = 'freetype-language';
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
            [['freetype_id'], 'required', 'on' => self::SCENARIO_UPDATE],
			[['language_id', 'name'], 'required'],
			[['freetype_id', 'language_id'], 'integer'],
			[['content'], 'string'],
			[['metadata'], 'safe'],
			[['name'], 'string', 'max' => 255],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'freetype_id' => FreetypeModule::t('freetype', 'Freetype ID'),
            'language_id' => FreetypeModule::t('freetype', 'Language ID'),
            'name' => FreetypeModule::t('freetype', 'Name'),
            'content' => FreetypeModule::t('freetype', 'Content'),
            'metadata' => FreetypeModule::t('freetype', 'Metadata'),
        ];
    }
}
