<?php
namespace milkyway\slider\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@milkyway/slider/views/error/error.php';

}
