<?php
namespace modava\tags\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@modava/tags/views/error/error.php';

}
