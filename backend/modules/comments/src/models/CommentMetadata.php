<?php

namespace milkyway\comments\models;

use milkyway\comments\CommentsModule;
use yii\base\Model;

class CommentMetadata extends Model
{
    private $path;
    public $name;
    public $address;
    public $image;
    public $iptImage;

    public function setPath(array $path = [])
    {
        if (is_array($path)) {
            foreach ($path as $key => $value) {
                if (!property_exists($this, $key)) continue;
                if (substr($value, -1) != '/') $value .= '/';
                $path[$key] = $value;
            }
            $this->path = $path;
        }
    }

    public function getPath($key = null)
    {
        if ($key == null) return $this->path;
        if (is_array($this->path) && array_key_exists($key, $this->path)) return $this->path[$key];
        return null;
    }

    public function rules()
    {
        return [
            [['name', 'address'], 'required'],
            [['name', 'address', 'image'], 'string', 'max' => 255],
            [['iptImage'], 'file', 'extensions' => ['png', 'jpg', 'jpeg'], 'maxSize' => 1024 * 1024, 'wrongExtension' => 'Chỉ chấp nhận định dạng: {extensions}']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => CommentsModule::t('comments', 'Name'),
            'address' => CommentsModule::t('comments', 'Address'),
            'image' => CommentsModule::t('comments', 'Image'),
        ];
    }
}