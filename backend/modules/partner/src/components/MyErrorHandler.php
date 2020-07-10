<?php
namespace milkyway\partner\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@milkyway/partner/views/error/error.php';

}
