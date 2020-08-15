<?php

namespace milkyway\comments\models\metadata_interface;

trait MetadataTrait
{
    private $path = [];

    public function setPath(array $path = [])
    {
        if (is_array($path)) {
            $setPath = [];
            foreach ($path as $key => $value) {
                if (!property_exists($this, $key) || !is_array($value) || !array_key_exists('path', $value)) continue;
                if (substr($value['path'], -1) != '/') $value['path'] .= '/';
                $setPath[$key] = $value['path'];
            }
            $this->path = $setPath;
        }
    }

    public function getPath($key = null)
    {
        if ($key == null) return $this->path;
        if (is_array($this->path) && array_key_exists($key, $this->path)) return $this->path[$key];
        return null;
    }

    public function getMetadata()
    {
        return null;
    }

    public function attributeLabels()
    {
        return [
        ];
    }

    public function getImage($image = null)
    {
        if (!property_exists($this, $image) ||
            !array_key_exists($image, $this->path) ||
            is_dir($this->path[$image] . $this->$image) ||
            !file_exists($this->path[$image] . $this->$image)) return null;
        return \Yii::$app->assetManager->publish($this->path[$image] . $this->$image)[1];
    }
}