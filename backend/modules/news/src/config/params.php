<?php
use modava\news\NewsModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'newsName' => 'News',
    'newsVersion' => '1.0',
    'status' => [
        '0' => NewsModule::t('news', 'Tạm ngưng'),
        '1' => NewsModule::t('news', 'Hiển thị'),
    ]
];
