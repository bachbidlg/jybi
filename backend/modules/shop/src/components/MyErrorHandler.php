<?php
namespace milkyway\shop\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@milkyway/shop/views/error/error.php';

}
