<?php

namespace milkyway\shop\models;

use common\helpers\MyHelper;
use common\models\User;
use milkyway\language\models\Language;
use milkyway\shop\ShopModule;
use milkyway\shop\models\table\ShopTable;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;
use yii\db\Transaction;
use yii\web\UploadedFile;

/**
 * This is the model class for table "shop".
 *
 * @property int $id
 * @property string $email
 * @property string $phone
 * @property string $hotline
 * @property string $mst
 * @property int $created
 * @property int $started
 * @property int $created_at
 *
 * @property ShopLanguage[] $shopLanguages
 * @property Language[] $languages
 */
class Shop extends ShopTable
{
    const SCENARIO_UPDATE = 'update';
    public $toastr_key = 'shop';

    public $shop_language;
    public $iptLogo;

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
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
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_VALIDATE => ['created'],
                    ],
                    'value' => function () {
                        if (is_numeric($this->created)) return $this->created;
                        if (is_string($this->created)) return strtotime($this->created);
                        return null;
                    }
                ],
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_VALIDATE => ['started'],
                    ],
                    'value' => function () {
                        if (is_numeric($this->created)) return $this->created;
                        if (is_string($this->created)) return strtotime($this->created);
                        return null;
                    }
                ],
                [
                    'class' => AttributeBehavior::class,
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['metadata'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['metadata'],
                    ],
                    'value' => function () {
                        return $this->getAttributes(['email', 'hotline', 'phone', 'mst', 'created', 'started']);
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
            [['metadata', 'shop_language'], 'safe'],
            [['shop_language'], 'validateShopLanguage'],
            [['created_at'], 'integer'],
            [['iptLogo'], 'file', 'maxSize' => 2 * 1024 * 1024, 'extensions' => ['png', 'jpg', 'jpeg'], 'wrongExtension' => 'Chỉ chấp nhận định dạng: {extensions}'],
            [['email', 'phone', 'hotline', 'mst'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['created', 'started'], 'safe'],
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
            'id' => ShopModule::t('shop', 'ID'),
            'metadata' => ShopModule::t('shop', 'Metadata'),
            'iptLogo' => ShopModule::t('shop', 'Logo'),
            'logo' => ShopModule::t('shop', 'Logo'),
            'email' => ShopModule::t('shop', 'Email'),
            'hotline' => ShopModule::t('shop', 'Hotline'),
            'mst' => ShopModule::t('shop', 'Mã số thuế'),
            'created' => ShopModule::t('shop', 'Ngày cấp giấy phép'),
            'started' => ShopModule::t('shop', 'Ngày hoạt động'),
            'created_at' => ShopModule::t('shop', 'Created At'),
            'created_by' => ShopModule::t('shop', 'Created By'),
            'updated_at' => ShopModule::t('shop', 'Updated At'),
            'updated_by' => ShopModule::t('shop', 'Updated By'),
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        $old_metadata = $this->getOldAttribute('metadata');
        $file = UploadedFile::getInstance($this, 'iptLogo');
        if ($file != null) {
            $fileName = $file->baseName . '-' . time() . '.' . $file->extension;
            if ($file->saveAs($this->pathImage . '/logo/' . $fileName)) {
                $metadata = $this->getAttribute('metadata');
                $metadata['logo'] = $fileName;
                $this->updateAttributes([
                    'metadata' => $metadata
                ]);
                $old_logo = isset($old_metadata['logo']) ? $old_metadata['logo'] : null;
                if (file_exists($this->pathImage.'/logo/'.$old_logo)) {
                    @unlink($this->pathImage . '/logo/' . $old_logo);
                }
            }
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    public function setShopLanguage()
    {
        foreach ($this->shopLanguage as $language_id => $shop_language) {
            $shop_language_metadata = is_array($shop_language->getAttribute('metadata')) ? $shop_language->getAttribute('metadata') : [];
            $this->shop_language[$language_id] = array_merge($shop_language->getAttributes(), $shop_language_metadata);
        }
    }

    public function saveShopLanguage()
    {
        if (!$this->hasErrors()) {
            $transaction = Yii::$app->db->beginTransaction(Transaction::SERIALIZABLE);
            foreach ($this->shop_language as $shop_language) {
                $shop_language_model = null;
                if (isset($shop_language['shop_id']) && isset($shop_language['language_id'])) {
                    $shop_language_model = ShopLanguage::find()->where(['shop_id' => $shop_language['shop_id'], 'language_id' => $shop_language['language_id']])->one();
                }
                if ($shop_language_model == null) $shop_language_model = new ShopLanguage();
                $shop_language_model->scenario = ShopLanguage::SCENARIO_UPDATE;
                $shop_language_model->setAttributes(array_merge($shop_language, [
                    'shop_id' => $this->primaryKey
                ]));
                if (!$shop_language_model->save()) {
                    $transaction->rollBack();
                    return false;
                }
            }
            $transaction->commit();
            return true;
        }
    }

    public function validateShopLanguage()
    {
        if (!$this->hasErrors()) {
            foreach ($this->shop_language as $i => $shop_language) {
                $shop_language_model = null;
                if (isset($shop_language['shop_id']) && isset($shop_language['language_id'])) {
                    $shop_language_model = ShopLanguage::find()->where(['shop_id' => $shop_language['shop_id'], 'language_id' => $shop_language['language_id']])->one();
                }
                if ($shop_language_model == null) $shop_language_model = new ShopLanguage();
                if ($this->scenario === self::SCENARIO_UPDATE) $shop_language_model->scenario = ShopLanguage::SCENARIO_UPDATE;
                $shop_language_model->setAttributes($shop_language);
                if (!$shop_language_model->validate()) {
                    foreach ($shop_language_model->getErrors() as $k => $error) {
                        $this->addError("shop_language[$i][$k]", $error);
                    }
                }
            }
        }
    }
}
