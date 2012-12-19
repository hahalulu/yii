<?php
defined('YII_DEBUG') or define('YII_DEBUG',true);
define('PATH', dirname(__FILE__));
// include Yii bootstrap file
require_once(dirname(__FILE__).'/../framework/yii.php');
$configFile=PATH.'/protected/config/main.php';
// create a Web application instance and run

if (!function_exists('vd')) {
    /**
     * it's function var_dump customized
     * @param bool $var
     * @param int $trace
     * @param bool $showHtml
     * @param bool $showFrom
     * @author NguyenTrongHa
     */
    function vd($var = false, $trace = 1, $showHtml = false, $showFrom = true) {
        if ($showFrom) {
            $calledFrom = debug_backtrace();
            for ($i = 0; $i < $trace; $i++) {
                if (!isset($calledFrom[$i]['file'])) {
                    break;
                }
                echo substr($calledFrom[$i]['file'], 1);
                echo ' (line <strong>' . $calledFrom[$i]['line'] . '</strong>)';
                echo "<br />";
            }
        }
        echo "<pre class=\"cake-debug\">\n";

        $var = var_dump($var);
        if ($showHtml) {
            $var = str_replace('<', '&lt;', str_replace('>', '&gt;', $var));
        }
        echo $var . "\n</pre>\n";
    }
    /**
     * it's function var_dump(), die(); customized
     * @param bool $var
     * @param int $trace
     * @param bool $showHtml
     * @param bool $showFrom
     * @author NguyenTrongHa
     */
    function vdd($var = false, $trace = 1, $showHtml = false, $showFrom = true) {
        if ($showFrom) {
            $calledFrom = debug_backtrace();
            for ($i = 0; $i < $trace; $i++) {
                if (!isset($calledFrom[$i]['file'])) {
                    break;
                }
                echo substr($calledFrom[$i]['file'], 1);
                echo ' (line <strong>' . $calledFrom[$i]['line'] . '</strong>)';
                echo "<br />";
            }
        }
        echo "<pre class=\"cake-debug\">\n";

        $var = var_dump($var);
        if ($showHtml) {
            $var = str_replace('<', '&lt;', str_replace('>', '&gt;', $var));
        }
        echo $var . "\n</pre>\n";
        die;
    }
}
Yii::createWebApplication($configFile)->run();