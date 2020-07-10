<?php
use milkyway\contact\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'contact/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@contactweb' => '@milkyway/contact/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
