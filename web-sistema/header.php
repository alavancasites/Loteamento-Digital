<?
/*********************************************************
*Controle de versão: 2.2
*********************************************************/
$cid = time();
?>
<meta name="robots" content="index,follow"/>
<meta http-equiv="content-language" content="pt-br"/>
<meta name="resource-type" content="document"/>
<meta name="DocumentCountryCode" content="br"/>
<meta name="classification" content="internet"/>
<meta name="distribution" content="global"/>
<meta name="rating" content="general"/>
<meta name="robots" content="all"/>
<meta name="author" content="Alavanca sites e sistemas"/>
<meta name="reply-to" content="atendimento@loteamento.digital" />
<meta name="custodian" content="atendimento@loteamento.digital" />
<meta name="language" content="pt-br" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="format-detection" content="telephone=no"/>
<?php
include_once("RequestManager.php");
$request_manager = new RequestManager();
$base_url = $request_manager->getBaseUrl($absolute=true).'/';
$server = $_SERVER['SERVER_NAME'];
?>
<base href="<?=$base_url?>"/>
<meta property="og:title" content="<?php echo Yii::app()->sistema_nome; ?> - Gerenciamento de terrenos" />
<meta property="og:description" content="" />
<meta property="og:type" content="website" />
<meta property="og:url" content="url" />
<meta property="og:image" content="caminho absoluto da imagem que irá aparecer" />
<meta property="og:site_name" content="<?php echo Yii::app()->sistema_nome; ?> - Gerenciamento de terrenos" />
<meta name="Title" content="<?php echo Yii::app()->sistema_nome; ?> - Gerenciamento de terrenos"/>
<meta name="reply-to" content="email do cliente"/>
<meta name="description" content="<?php echo Yii::app()->sistema_nome; ?> - Gerenciamento de terrenos"/>
<meta name="keywords" content=""/>
<meta name="copyright" content="Copyright 2018"/>
<meta name="DC.date.created" content="2018-08-01" />
<meta name="URL" content="<?php echo Yii::app()->sistema_url; ?>" />
<link rel="stylesheet" type="text/css" href="gzip/gzip.php?arquivo=../css/all.css&amp;cid=<?=$cid?>"/>
<link rel="stylesheet" type="text/css" href="gzip/gzip.php?arquivo=../css/fancybox.css&amp;cid=<?=$cid?>"/>
<?php /*?>
<style type="text/css">
<?php
 echo file_get_contents ('css/inicial.css');
?>
</style>
<?php */?>
<?php include("analytics.php"); ?>
