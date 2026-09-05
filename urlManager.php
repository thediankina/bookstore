<?php

return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'suffix' => '/',
    'normalizer' => [
        'class' => 'yii\web\UrlNormalizer',
        'action' => \yii\web\UrlNormalizer::ACTION_REDIRECT_PERMANENT,
    ],
    'rules' => [
        '<controller>/<action>/<id:\d+>' => '<controller>/<action>',
        'catalog' => 'book/index',
    ],
];
