<?php
use milkyway\language\LanguageModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'languageName' => 'Language',
    'languageVersion' => '1.0',
    'status' => [
        '0' => LanguageModule::t('language', 'Tạm ngưng'),
        '1' => LanguageModule::t('language', 'Hiển thị'),
    ],
    'default' => [
        '0' => LanguageModule::t('language', '-'),
        '1' => LanguageModule::t('language', 'Mặc định'),
    ]
];
