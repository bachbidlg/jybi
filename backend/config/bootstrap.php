<?php

define('VERSION', 'V1.33');
define('LOGIN_VERSION', 'v2.4');
Yii::setAlias('@moduleBackend', realpath(__DIR__ . '/../backend/modules/'));
Yii::setAlias('@api', dirname(dirname(__DIR__)) . '/../backend/modules/api');
Yii::setAlias('modava/auth', dirname(dirname(__DIR__)) . '/backend/modules/auth/src');
Yii::setAlias('milkyway/language', dirname(dirname(__DIR__)) . '/backend/modules/language/src');
Yii::setAlias('milkyway/news', dirname(dirname(__DIR__)) . '/backend/modules/news/src');
Yii::setAlias('milkyway/tags', dirname(dirname(__DIR__)) . '/backend/modules/tags/src');
Yii::setAlias('milkyway/contact', dirname(dirname(__DIR__)) . '/backend/modules/contact/src');
Yii::setAlias('milkyway/slider', dirname(dirname(__DIR__)) . '/backend/modules/slider/src');
Yii::setAlias('milkyway/label', dirname(dirname(__DIR__)) . '/backend/modules/label/src');

//Widget
Yii::setAlias('modava/tiny', dirname(dirname(__DIR__)) . '/backend/widgets/tiny/src');
Yii::setAlias('modava/imagick', dirname(dirname(__DIR__)) . '/package/imagick/src');