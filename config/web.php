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
            'dsn' => getenv('DB_DSN') ?: 'mysql:host=mariadb;dbname=yii2test',
            'username' => getenv('DB_USERNAME') ?: 'yii2test',
            'password' => getenv('DB_PASSWORD') ?: '666666',
            'charset' => 'utf8mb4',
        ],
    ],
];
