<?php

return [
    'id' => 'yii2test',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'change-this-key',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mariadb;dbname=yii2test',
            'username' => 'yii2test',
            'password' => '666666',
            'charset' => 'utf8mb4',
        ],
    ],
];
