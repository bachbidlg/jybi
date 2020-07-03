<?php
use milkyway\language\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'language/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@languageweb' => '@milkyway/language/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
