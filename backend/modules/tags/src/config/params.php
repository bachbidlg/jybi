<?php
use modava\tags\TagsModule;

return [
    'availableLocales' => [
        'vi' => 'Tiếng Việt',
        'en' => 'English',
        'jp' => 'Japan',
    ],
    'tagsName' => 'Tags',
    'tagsVersion' => '1.0',
    'status' => [
        '0' => TagsModule::t('tags', 'Tạm ngưng'),
        '1' => TagsModule::t('tags', 'Hiển thị'),
    ]
];
