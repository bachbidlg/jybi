<?php
use modava\tags\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'tags/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@tagsweb' => '@modava/tags/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
