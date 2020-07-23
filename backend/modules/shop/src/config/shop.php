<?php
use milkyway\shop\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'shop/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@shopweb' => '@milkyway/shop/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
