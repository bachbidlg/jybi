<?php
namespace milkyway\news\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@milkyway/news/views/error/error.php';

}
