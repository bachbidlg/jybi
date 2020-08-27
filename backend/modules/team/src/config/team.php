<?php
use milkyway\team\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'team/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@teamweb' => '@milkyway/team/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
