<?php
use milkyway\shop\ShopModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'shopName' => 'Shop',
    'shopVersion' => '1.0',
    'status' => [
        '0' => ShopModule::t('shop', 'Tạm ngưng'),
        '1' => ShopModule::t('shop', 'Hiển thị'),
    ]
];
