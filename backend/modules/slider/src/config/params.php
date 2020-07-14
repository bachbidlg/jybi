<?php
use milkyway\slider\SliderModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'sliderName' => 'Slider',
    'sliderVersion' => '1.0',
    'status' => [
        '0' => SliderModule::t('slider', 'Tạm ngưng'),
        '1' => SliderModule::t('slider', 'Hiển thị'),
    ]
];
