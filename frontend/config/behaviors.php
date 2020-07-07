<?php

return [
    'class' => 'frontend\filters\MyAccessControl',
    'rules' => [
        [
            'controllers' => ['site', 'intro', 'contact'],
            'allow' => true,
        ],
    ]
];