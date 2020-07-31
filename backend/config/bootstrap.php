<?php

define('VERSION', 'V1.33');
define('LOGIN_VERSION', 'v2.4');
Yii::setAlias('@moduleBackend', realpath(__DIR__ . '/../backend/modules/'));
Yii::setAlias('@api', dirname(dirname(__DIR__)) . '/../backend/modules/api');
Yii::setAlias('modava/auth', dirname(dirname(__DIR__)) . '/backend/modules/auth/src');
Yii::setAlias('milkyway/socials', dirname(dirname(__DIR__)) . '/backend/modules/socials/src');

//Widget
Yii::setAlias('modava/tiny', dirname(dirname(__DIR__)) . '/backend/widgets/tiny/src');
Yii::setAlias('modava/imagick', dirname(dirname(__DIR__)) . '/package/imagick/src');