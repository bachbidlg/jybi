<?php
use milkyway\comments\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'comments/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@commentsweb' => '@milkyway/comments/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
