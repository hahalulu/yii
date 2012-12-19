<?php
return array(
    'name' => 'Ha Ha Ha',
    'defaultController' => 'user',
    'import'=>array(
        'application.models.*',
        'application.components.*',
    ),

    'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'hahaha',
        ),
    ),
    'components'=>array(
        'db'=>array(
            'class'=>'CDbConnection',
            'connectionString'=>'mysql:host=localhost;dbname=test',
            'username'=>'root',
            'password'=>'',
            'charset' => 'utf8',
            'enableProfiling'=>true
        ),
    ),

);