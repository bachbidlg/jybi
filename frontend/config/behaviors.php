<?php

return [
    'class' => 'frontend\filters\MyAccessControl',
    'rules' => [
        [
            'controllers' => ['site', 'intro', 'news', 'contact'],
            'allow' => true,
        ],
    ]
];