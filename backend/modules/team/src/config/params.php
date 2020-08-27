<?php
use milkyway\team\TeamModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'teamName' => 'Team',
    'teamVersion' => '1.0',
    'status' => [
        '0' => TeamModule::t('team', 'Tạm ngưng'),
        '1' => TeamModule::t('team', 'Hiển thị'),
    ]
];
