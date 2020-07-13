<?php
use milkyway\label\LabelModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'labelName' => 'Label',
    'labelVersion' => '1.0',
    'status' => [
        '0' => LabelModule::t('label', 'Tạm ngưng'),
        '1' => LabelModule::t('label', 'Hiển thị'),
    ]
];
