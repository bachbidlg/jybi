<?php
namespace milkyway\socials\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@milkyway/socials/views/error/error.php';

}
