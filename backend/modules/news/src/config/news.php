<?php
use milkyway\news\components\MyErrorHandler;

$config = [
    'defaultRoute' => 'news/index',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'aliases' => [
        '@newsweb' => '@milkyway/news/web',
    ],
    'components' => [
        'errorHandler' => [
            'class' => MyErrorHandler::class,
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

return $config;
