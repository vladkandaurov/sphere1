<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'prod');

require __DIR__ . '/../../sphere/vendor/autoload.php';
require __DIR__ . '/../../sphere/vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../../sphere/common/config/bootstrap.php';
require __DIR__ . '/../../sphere/backend/config/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../../sphere/common/config/main.php',
    require __DIR__ . '/../../sphere/common/config/main-local.php',
    require __DIR__ . '/../../sphere/backend/config/main.php',
    require __DIR__ . '/../../sphere/backend/config/main-local.php'
);

(new yii\web\Application($config))->run();
