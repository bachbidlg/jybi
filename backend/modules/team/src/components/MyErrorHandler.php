<?php
namespace milkyway\team\components;

class MyErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@milkyway/team/views/error/error.php';

}
