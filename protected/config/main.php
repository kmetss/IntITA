<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'INTITA',

	'sourceLanguage'=>'ua',
	'language'=>'ru',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.autoadmin.*',
		'ext.autoadmin.models.*',
		'ext.autoadmin.models.field.*',
		'ext.autoadmin.helpers.*',
		'ext.autoadmin.controllers.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

		'autoadmin'=>array(
			'class'=>'ext.autoadmin.AutoAdmin',
			'basePath' => dirname(__FILE__).'/../modules/autoadmin',
			'wwwDirName' => 'www', //your DocumentRoot
			'authMode' => true, //Switch on authorization system
			'openMode' => true, //Use for temporary switching off all access limitations
			'logMode' => false,
		),

	),

	// application components
	'components'=>array(
		
		'clientScript'   => array(
    		'class' => 'system.web.CClientScript'
    	),

        'messages'=>array(
            'class'=>'CDbMessageSource',
            'sourceMessageTable'=>'mainpage',
            'translatedMessageTable'=>'mainpagetranslated',
        ),

		'user' => array(
			'class'          => 'application.components.WebUser',
			'loginUrl'       => array('/?r=register/submitForm'),
			'allowAutoLogin' => false,
		),

		'authManager' => array(
			'class'         => 'application.components.AuthManager',
			'defaultRoles'  => array('0'), // по умолчанию 0, то есть гость
		),

		'urlManager'=>array(
			//'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',

				'/<module:autoadmin>' => 'autoadmin/default/index',
				'/<module:autoadmin>/<controller:\w+>' => 'autoadmin/<controller>/index',
				'/<module:autoadmin>/<controller:\w+>/<action:\w+>' => 'autoadmin/<controller>/<action>',
				'/<controller:\w+>/<action:\w+>' => 'autoadmin/<controller>/<action>',

				'<controller:aajax>/<action:\w+>' => 'autoadmin/<controller>/<action>',
				'<controller:afile>/<action:\w+>' => 'autoadmin/<controller>/<action>',
				'<controller:\w+>/foreign-<key:\w+>' => 'autoadmin/<controller>/foreign<key>',
			),
		),


		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),
		'db2'=>require(dirname(__FILE__).'/database.php'),
		'dbAdmin' => require(dirname(__FILE__).'/database.php'),

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

		'messages'=>array(
			'class' => 'CDbMessageSource',
			'translatedMessageTable' => 'mainpagetranslated',
			'sourceMessageTable' => 'mainpage',
			'cachingDuration'=>3600.
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
