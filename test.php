<?php

$container = require __DIR__ . '/container.php';
$db = require __DIR__ . '/database.php';
$urlManager = require __DIR__ . '/urlManager.php';

return [
    'id' => 'app-test',
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
            'class' => 'yii\caching\ArrayCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logFile' => '@runtime/logs/app-test.log',
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => 'test-cookie-validation-key',
            'enableCsrfValidation' => false,
        ],
        'urlManager' => $urlManager,
    ],
];
