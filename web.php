<?php

$container = require __DIR__ . '/container.php';
$db = require __DIR__ . '/database.php';
$urlManager = require __DIR__ . '/urlManager.php';

return [
    'id' => 'web-app',
    'name' => 'Booking store',
    'basePath' => __DIR__,
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
    ],
    'controllerNamespace' => 'app\controllers',
    'container' => $container,
    'components' => [
        'db' => $db,
        'snowflake' => [
            'class' => 'xutl\snowflake\Snowflake',
            'workerId' => 0,
            'dataCenterId' => 0,
        ],
        'user' => [
            'identityClass' => 'app\models\User',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => $_ENV['COOKIE_VALIDATION_KEY'],
        ],
        'urlManager' => $urlManager,
    ],
];
