<?php
use milkyway\slider\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'slider/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@sliderweb' => '@milkyway/slider/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
