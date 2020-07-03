<?php
namespace modava\news\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/news/views/error/error.php';

}
