<?php
use milkyway\comments\CommentsModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'commentsName' => 'Comments',
    'commentsVersion' => '1.0',
    'status' => [
        '0' => CommentsModule::t('comments', 'Tạm ngưng'),
        '1' => CommentsModule::t('comments', 'Hiển thị'),
    ]
];
