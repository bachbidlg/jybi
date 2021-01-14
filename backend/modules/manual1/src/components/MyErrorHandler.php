<?php
namespace milkyway\manual\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@milkyway/manual/views/error/error.php';

}
