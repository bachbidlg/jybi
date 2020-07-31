<?php
use milkyway\socials\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'socials/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@socialsweb' => '@milkyway/socials/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
