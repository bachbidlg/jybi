<?php

namespace backend\models;

use milkyway\comments\models\metadata_interface\MetadataInterface;
use milkyway\comments\models\metadata_interface\MetadataTrait;
use yii\base\Model;
use yii\web\UploadedFile;

class CommentsMetadata extends Model implements MetadataInterface
{
    use MetadataTrait;

    public $name;
    public $address;
    public $image;
    public $iptImage;
    public $background;
    public $iptBackground;

    public function rules()
    {
        return [
            [['name', 'address'], 'required'],
            [['name', 'address', 'image', 'background'], 'string', 'max' => 255],
            [['iptImage', 'iptBackground'], 'file', 'extensions' => ['png', 'jpg', 'jpeg'], 'maxSize' => 1024 * 1024, 'wrongExtension' => 'Chỉ chấp nhận định dạng: {extensions}']
        ];
    }

    public function getMetadata()
    {
        /* @var $iptImage UploadedFile */
        if (!$this->hasErrors()) {
            $path = $this->getPath();
            if (is_array($path)) {
                if (array_key_exists('image', $path) && is_dir($path['image'])) {
                    $iptImage = $this->iptImage;
                    if ($iptImage != null) {
                        $fileName = $iptImage->baseName . '-' . time() . '.' . $iptImage->extension;
                        if ($iptImage->saveAs($path['image'] . $fileName)) $this->image = $fileName;
                    }
                }
                if (array_key_exists('image', $path) && is_dir($path['image'])) {
                    $iptBackground = $this->iptBackground;
                    if ($iptBackground != null) {
                        $fileName = $iptBackground->baseName . '-' . time() . '.' . $iptBackground->extension;
                        if ($iptBackground->saveAs($path['image'] . $fileName)) $this->background = $fileName;
                    }
                }
            }
            return $this->getAttributes([
                'name', 'address', 'image', 'background'
            ]);
        }
    }
}