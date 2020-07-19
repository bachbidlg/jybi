<?php
use milkyway\freetype\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'freetype/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@freetypeweb' => '@milkyway/freetype/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
