<?php

namespace milkyway\freetype\models\table;

use cheatsheet\Time;
use milkyway\freetype\models\query\FreetypeQuery;
use modava\auth\models\User;
use Yii;
use yii\db\ActiveRecord;

class FreetypeTable extends \yii\db\ActiveRecord
{
    const TYPE_FREETYPE = 0;
    const TYPE_FOOTER_INFO = 1;
    const TYPE = [
        self::TYPE_FREETYPE => 'Tự soạn thảo',
        self::TYPE_FOOTER_INFO => 'Thông tin footer'
    ];
    const STATUS_DISABLED = 0;
    const STATUS_PUBLISHED = 1;
    public $pathImage;
    public $urlImage;

    public function init()
    {
        $this->pathImage = Yii::getAlias('@frontend/web/uploads/freetype');
        $this->urlImage = Yii::getAlias('@frontendUrl/uploads/freetype');
        parent::init(); // TODO: Change the autogenerated stub
    }

    public static function tableName()
    {
        return 'freetype';
    }

    public static function find()
    {
        return new FreetypeQuery(get_called_class());
    }

    public function afterDelete()
    {
        $cache = Yii::$app->cache;
        $keys = [
            'redis-freetype-get-by-id-' . $this->id,
            'redis-freetype-get-one-by-type-' . $this->type,
            'redis-freetype-get-all-by-type-' . $this->type,
        ];
        foreach ($keys as $key) {
            $cache->delete($key);
        }
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public function afterSave($insert, $changedAttributes)
    {
        $cache = Yii::$app->cache;
        $keys = [
            'redis-freetype-get-by-id-' . $this->id,
            'redis-freetype-get-one-by-type-' . $this->type,
            'redis-freetype-get-all-by-type-' . $this->type,
        ];
        foreach ($keys as $key) {
            $cache->delete($key);
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
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

    public function getFreetypeLanguage()
    {
        return $this->hasMany(FreetypeLanguageTable::class, ['freetype_id' => 'id'])->indexBy('language_id');
    }

    public function getImage()
    {
        if (file_exists($this->pathImage . '/' . $this->image)) {
            return Yii::$app->assetManager->publish($this->pathImage . '/' . $this->image)[1];
        }
        return null;
    }

    public static function getById($id, $data_cache = YII2_CACHE)
    {
        $cache = Yii::$app->cache;
        $key = 'redis-freetype-get-by-id-' . $id;
        $data = $cache->get($key);
        if ($data == false || $data_cache === false) {
            $query = self::find()->where([self::tableName() . '.id' => $id])->published();
            $data = $query->one();
            $cache->set($key, $data);
        }
        return $data;
    }

    public static function getOneByType($type = self::TYPE_FREETYPE, $data_cache = YII2_CACHE)
    {
        $cache = Yii::$app->cache;
        $key = 'redis-freetype-get-one-by-type-' . $type;
        $data = $cache->get($key);
        if ($data == false || $data_cache === false) {
            $query = self::find()->where([self::tableName() . '.type' => $type])->published()->sort();
            $data = $query->one();
            $cache->set($key, $data);
        }
        return $data;
    }

    public static function getAllByType($type = self::TYPE_FREETYPE, $data_cache = YII2_CACHE)
    {
        $cache = Yii::$app->cache;
        $key = 'redis-freetype-get-all-by-type-' . $type;
        $data = $cache->get($key);
        if ($data == false || $data_cache === false) {
            $query = self::find()->where([self::tableName() . '.type' => $type])->published()->sort();
            $data = $query->all();
            $cache->set($key, $data);
        }
        return $data;
    }
}
