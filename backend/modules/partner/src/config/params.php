<?php
use milkyway\partner\PartnerModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'partnerName' => 'Partner',
    'partnerVersion' => '1.0',
    'status' => [
        '0' => PartnerModule::t('partner', 'Tạm ngưng'),
        '1' => PartnerModule::t('partner', 'Hiển thị'),
    ]
];
