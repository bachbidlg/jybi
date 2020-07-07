<?php
namespace milkyway\language\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@milkyway/language/views/error/error.php';

}
