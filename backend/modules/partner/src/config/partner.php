<?php
use milkyway\partner\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'partner/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@partnerweb' => '@milkyway/partner/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
