<?php

namespace milkyway\label\models;

use common\helpers\MyHelper;
use common\models\User;
use milkyway\label\LabelModule;
use milkyway\label\models\table\LabelTable;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "label".
*
    * @property string $label
    * @property int $language_id
    * @property string $text
    *
            * @property Language $language
    */
class Label extends LabelTable
{
    public $toastr_key = 'label';
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
			[['label', 'language_id'], 'required'],
			[['language_id'], 'integer'],
			[['label'], 'string', 'max' => 255],
			[['text'], 'string', 'max' => 500],
			[['label', 'language_id'], 'unique', 'targetAttribute' => ['label', 'language_id']],
			[['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::class, 'targetAttribute' => ['language_id' => 'id']],
		];
    }

    /**
    * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'label' => LabelModule::t('label', 'Label'),
            'language_id' => LabelModule::t('label', 'Language ID'),
            'text' => LabelModule::t('label', 'Text'),
        ];
    }
}
