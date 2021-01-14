<?php
namespace milkyway\manual\components;

use modava\imagick\Imagick;
use yii\base\Component;

class MyUpload extends Component
{
    /**
     * @param int $width
     * @param int $height
     * @param string $pathImage Đường dẫn hình ảnh
     * @param string $pathSave Đường dẫn lưu hình ảnh mới
     * @return string
     */
    public static function upload($width, $height, $pathImage, $pathSave)
    {
        $imagick = new Imagick($pathImage, true);
        return $imagick->resizeImage($width, $height)->saveTo($pathSave);
    }
}
