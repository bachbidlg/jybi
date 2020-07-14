<?php

namespace milkyway\label\models;

use common\helpers\MyHelper;
use common\models\User;
use milkyway\label\LabelModule;
use milkyway\label\models\table\LabelTable;
use milkyway\language\models\Language;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "label".
 *
 * @property string $label
 * @property int $language
 * @property string $text
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
            [['label', 'language'], 'required'],
            [['language'], 'integer'],
            [['label'], 'string', 'max' => 255],
            [['text'], 'string', 'max' => 500],
            [['label', 'language'], 'unique', 'targetAttribute' => ['label', 'language']],
            [['language'], 'exist', 'skipOnError' => true, 'targetClass' => Language::class, 'targetAttribute' => ['language' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'label' => LabelModule::t('label', 'Label'),
            'language' => LabelModule::t('label', 'Language ID'),
            'text' => LabelModule::t('label', 'Text'),
        ];
    }
}
