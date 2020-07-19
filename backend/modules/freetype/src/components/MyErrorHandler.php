<?php
namespace milkyway\freetype\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@milkyway/freetype/views/error/error.php';

}
