<?php

namespace milkyway\shop\models;

use common\helpers\MyHelper;
use common\models\User;
use milkyway\language\models\Language;
use milkyway\shop\ShopModule;
use milkyway\shop\models\table\ShopLanguageTable;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "shop_language".
 *
 * @property int $shop_id
 * @property int $language_id
 * @property array $metadata
 *
 * @property Language $language
 * @property Shop $shop
 */
class ShopLanguage extends ShopLanguageTable
{
    const SCENARIO_UPDATE = 'update';
    public $toastr_key = 'shop-language';
    public $name;
    public $slogan;
    public $description;
    public $address;

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['metadata'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['metadata'],
                    ],
                    'value' => function () {
                        return $this->getAttributes(['name', 'slogan', 'description', 'address']);
                    }
                ]
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shop_id'], 'required', 'on' => self::SCENARIO_UPDATE],
            [['language_id'], 'required'],
            [['shop_id', 'language_id'], 'integer'],
            [['metadata'], 'safe'],
            [['shop_id', 'language_id'], 'unique', 'targetAttribute' => ['shop_id', 'language_id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::class, 'targetAttribute' => ['language_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shop::class, 'targetAttribute' => ['shop_id' => 'id'], 'on' => self::SCENARIO_UPDATE],
            [['name'], 'required'],
            [['name', 'slogan', 'description', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'shop_id' => ShopModule::t('shop', 'Shop ID'),
            'language_id' => ShopModule::t('shop', 'Language ID'),
            'metadata' => ShopModule::t('shop', 'Metadata'),
            'name' => ShopModule::t('shop', 'Tên công ty'),
            'slogan' => ShopModule::t('shop', 'Slogan'),
            'description' => ShopModule::t('shop', 'Mô tả'),
            'address' => ShopModule::t('shop', 'Địa chỉ'),
        ];
    }
}
