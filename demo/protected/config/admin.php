<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'name'=>'Backend demo',
        'id'=>'admin',
        'controllerPath'=>_APP_PATH_.DIRECTORY_SEPARATOR."protected".DIRECTORY_SEPARATOR."controllers".DIRECTORY_SEPARATOR."admin",
        'viewPath'=>_APP_PATH_.DIRECTORY_SEPARATOR."protected".DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."admin",
        // preloading 'log' component
        'preload'=>array('log'),

        //default controller
        'defaultController' => 'page',

        // autoloading model and component classes
        'import'=>array(
            'application.models.admin*',
            'application.components.admin*',
        ),

        'modules'=>array(
            // uncomment the following to enable the Gii tool

            'gii'=>array(
                'class'=>'system.gii.GiiModule',
                'password'=>'admin',
                // If removed, Gii defaults to localhost only. Edit carefully to taste.
                'ipFilters'=>array('127.0.0.1','::1'),
            ),

        ),

        // application components
        'components'=>array(
            'user'=>array(
                // enable cookie-based authentication
                'allowAutoLogin'=>true,
            ),
            // uncomment the following to enable URLs in path-format

            'urlManager'=>array(
              'urlFormat'=>'path',
              'rules'=>array(
                  '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                  '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                  '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
              ),
            ),

            'db'=>array(
                'class'=>'system.db.CDbConnection',
                'connectionString' => 'mysql:host=localhost;dbname=test',
                'emulatePrepare' => true,
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
            ),

            'errorHandler'=>array(
                // use 'site/error' action to display errors
                'errorAction'=>'site/error',
            ),
            'log'=>array(
                'class'=>'CLogRouter',
                'routes'=>array(
                    array(
                        'class'=>'CFileLogRoute',
                        'levels'=>'error, warning',
                    ),
                    // uncomment the following to show log messages on web pages
                    /*
                        array(
                            'class'=>'CWebLogRoute',
                        ),
                        */
                ),
            ),
        ),

        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
        'params'=>array(
            // this is used in contact page
            'adminEmail'=>'webmaster@example.com',
        ),

   )
);
?>