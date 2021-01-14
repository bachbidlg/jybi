<?php
use milkyway\manual\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'user-manual/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@manualweb' => '@milkyway/manual/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
