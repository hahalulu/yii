<?php
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
    'name' => 'Ha Ha Ha',
    'defaultController' => 'user',
    'import'=>array(
        'application.models.*',
        'application.models.db*',
        'application.components.*',
    ),

    'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'hahaha',
        ),
    ),

));