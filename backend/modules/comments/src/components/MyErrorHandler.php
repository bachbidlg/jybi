<?php
namespace milkyway\comments\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@milkyway/comments/views/error/error.php';

}
