<?php
/**
 * Created by PhpStorm.
 * User: Kem Bi
 * Date: 04-Jun-18
 * Time: 11:02 AM
 */

return [
    'auth' => [
        'class' => 'modava\auth\AuthModule',
    ],
    'filemanager' => [
        'class' => 'backend\modules\filemanager\FilemanagerModule',
    ],
    'user' => [
        'class' => 'backend\modules\user\User',
        'shouldBeActivated' => false,
        'enableLoginByPass' => false,
    ],
    'option' => [
        'class' => 'backend\modules\option\Option',
    ],
    'location' => [
        'class' => 'modava\location\LocationModule',
    ],
    'language' => [
        'class' => 'milkyway\language\LanguageModule',
    ],
    'news' => [
        'class' => 'milkyway\news\NewsModule',
    ],
    'tags' => [
        'class' => 'milkyway\tags\TagsModule',
    ],
    'contact' => [
        'class' => 'milkyway\contact\ContactModule',
    ],
    'partner' => [
        'class' => 'milkyway\partner\PartnerModule',
    ],
    'slider' => [
        'class' => 'milkyway\slider\SliderModule',
    ],
    'label' => [
        'class' => 'milkyway\label\LabelModule',
    ],
    'freetype' => [
        'class' => 'milkyway\freetype\FreetypeModule',
    ],
];
