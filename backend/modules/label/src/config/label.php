<?php
use milkyway\label\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'label/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@labelweb' => '@milkyway/label/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
