<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'prod');

require __DIR__ . '/../sphere/vendor/autoload.php';
require __DIR__ . '/../sphere/vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../sphere/common/config/bootstrap.php';
require_once __DIR__ . '/functions.php';


$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../sphere/common/config/main.php',
    require __DIR__ . '/../sphere/common/config/main-local.php',
    require __DIR__ . '/../sphere/frontend/config/main.php',
    require __DIR__ . '/../sphere/frontend/config/main-local.php'
);

(new yii\web\Application($config))->run();
