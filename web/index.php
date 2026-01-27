<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

if (file_exists(dirname(__DIR__) . '/.env')) {
    Dotenv\Dotenv::createImmutable(dirname(__DIR__))->safeLoad();
}

defined('YII_DEBUG') or define('YII_DEBUG', (bool)(getenv('YII_DEBUG') ?: true));
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV') ?: 'dev');

require dirname(__DIR__) . '/vendor/yiisoft/yii2/Yii.php';

$config = require dirname(__DIR__) . '/config/web.php';

(new yii\web\Application($config))->run();
