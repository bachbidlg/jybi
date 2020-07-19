<?php
use milkyway\freetype\FreetypeModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'freetypeName' => 'Freetype',
    'freetypeVersion' => '1.0',
    'status' => [
        '0' => FreetypeModule::t('freetype', 'Tạm ngưng'),
        '1' => FreetypeModule::t('freetype', 'Hiển thị'),
    ]
];
