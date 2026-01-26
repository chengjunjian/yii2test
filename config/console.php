<?php

return [
    'id' => 'yii2test-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => getenv('DB_DSN') ?: 'mysql:host=mariadb;dbname=yii2test',
            'username' => getenv('DB_USERNAME') ?: 'yii2test',
            'password' => getenv('DB_PASSWORD') ?: '666666',
            'charset' => 'utf8mb4',
        ],
    ],
    'params' => [],
];
