<?php
use milkyway\manual\ManualModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'manualName' => 'Manual',
    'manualVersion' => '1.0',
    'status' => [
        '0' => ManualModule::t('manual', 'Tạm ngưng'),
        '1' => ManualModule::t('manual', 'Hiển thị'),
    ]
];
