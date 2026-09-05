<?php

if (YII_ENV === 'dev') {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'sqlite:@app/runtime/dev.db',
        'username' => '',
        'password' => '',
        'charset' => 'utf8',
    ];
}

if (YII_ENV === 'test') {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'sqlite:@app/runtime/test.db',
        'username' => '',
        'password' => '',
        'charset' => 'utf8',
    ];
}

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_NAME'],
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
    'charset' => 'utf8',
];
