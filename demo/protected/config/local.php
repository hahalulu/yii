<?php
// this config define local configuration variables
// other common variable is defined in main config
return array(
    // application components
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
?>