<?php

return [
    'class' => 'frontend\filters\MyAccessControl',
    'rules' => [
        [
            'controllers' => ['site', 'intro', 'news', 'projects', 'contact'],
            'allow' => true,
        ],
    ]
];