<?php
namespace milkyway\contact\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@milkyway/contact/views/error/error.php';

}
