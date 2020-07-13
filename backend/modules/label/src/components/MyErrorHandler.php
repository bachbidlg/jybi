<?php
namespace milkyway\label\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@milkyway/label/views/error/error.php';

}
