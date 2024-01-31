<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'translate-manager' => [
            'class' => 'common\modules\translationManager\TranslationManager',
            'languages' => ['en', 'uz'],
        ],
    ],
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'i18n' => [
            'translations' =>[
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/language',
                    'fileMap' => [
                        'frontend/app'       => 'app.php',
                        'frontend/app/error' => 'error.php',
                    ],
                ],
            ],
        ],
    ],
];
