<?php
use milkyway\socials\SocialsModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'socialsName' => 'Socials',
    'socialsVersion' => '1.0',
    'status' => [
        '0' => SocialsModule::t('socials', 'Tạm ngưng'),
        '1' => SocialsModule::t('socials', 'Hiển thị'),
    ]
];
