<?php
error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
define('PATH', dirname(__FILE__));
date_default_timezone_set('Asia/Saigon');

// change the following paths if necessary
require_once(dirname(__FILE__).'/../framework/yii.php');
$configFile=PATH.'/protected/config/admin.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($configFile);
/*require_once(_APP_PATH_.'/protected/components/common/QvvApp.php');*/
/*$app = new QvvApp($config);*/
Yii::createWebApplication($configFile)->run();
/*$app->run();*/