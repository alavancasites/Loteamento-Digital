<?php
$db = include('main-db.php');
include('main-email.php');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Gerenciador de conteúdo',
	'sistema_nome'=>'Loteamento Digital',
	'sistema_email'=>'atendimento@popupdigital.com.br',
	'sistema_url'=>'www.popupdigital.com.br',//NÃO COLOCAR O HTTP

	'sistema_lat'=>'-27.090094054129423',
	'sistema_lng'=>'-52.71423981401671',
	'sistema_duracao_reserva'=>'+7 days',
	'sistema_duracao_renovacao'=>'+7 days',
	'sistema_duracao_contrato'=>'+10 days',
	'sistema_cliente_nome'=>'Loteamento Digital',
	'sistema_cliente_email'=>'atendimento@popupdigital.com.br',
	'sistema_cliente_site'=>'www.popupdigital.com.br',
	'sistema_cliente_telefone'=>'',
	'sistema_cliente_endereco'=>'',

	'preload'=>array('log'),
	'language'=>'pt_br',
	'sourceLanguage'=>'00',
	'charset' => 'ISO-8859-1',
	'import'=>array(
		'application.models.*',
		'application.models.Estado',
		'application.models.Interesse',
		'application.components.*',
		'application.controllers.ApiController',
		'application.helpers.*',

		'ext.giix-components.*',
		'ext.yii-mail.YiiMailMessage',
		'ext.CJuiDateTimePicker.CJuiDateTimePicker',
		'ext.galleryManager.models.*',
		'ext.galleryManager.*',
		'ext.cascadedropdown.ECascadeDropDown',
		'ext.behaviors.AttachmentBehavior',
		'ext.validator.cpf',
        'ext.validator.cnpj',
		'ext.m2brimagem.m2brimagem',
	),
	'aliases' => array(
		'xupload' => 'ext.xupload',
	),
	'controllerMap' => array(
        'gallery' => array(
            'class' => 'ext.galleryManager.GalleryController',
        ),
	),
	'modules'=>array(
		'gii'=>array(
			'class'=>'ext.gii.GiiModule',
			'password'=>'7249',
			'ipFilters'=>array('127.0.0.1','192.168.0.*','::1', '192.167.0.*','dev'),
			'generatorPaths' => array(
				'ext.giix-core',
			),
		),

	),
	'components'=>array(
		'user'=>array(
			'allowAutoLogin'=>true,
		),

		'image'=>array(
			'class'=>'application.extensions.image.CImageComponent',
			'driver'=>'GD',
        ),

		'mail' => array(
			'class' => 'application.extensions.yii-mail.YiiMail',
			'transportType'=>'smtp',
			'transportOptions'=>array(
				'host'=>$email['host'],
				'username'=>$email['username'],
				'password'=>$email['password'],
				'port'=>$email['port'],
				'encryption'=>'ssl',
				),
			'viewPath' => 'application.views.mail',
			'logging' => true,
			'dryRun' => false
		),

		'metadata'=>array('class'=>'Metadata'),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=> require('main-routes.php'),
		),
		'db'=>array(
			'connectionString' => 'mysql:host='.$db['host'].';dbname='.$db['db'],
			'emulatePrepare' => true,
			'username' => $db['username'],
			'password' => $db['password'],
			'charset' => 'latin1',
			'enableProfiling' => true,
     		'enableParamLogging' => true,
		),
		'errorHandler'=>array(
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(),
		),
	),
	'params'=>array(
		'email_contato'=>'thiago@popupdigital.com.br',
		'defaultPageSize' => 10,
	),
);
