<?
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
<meta name="author" content="Alavanca Sites e Sistemas | www.alavanca.digital"/>
<meta name="reply-to" content="somos@alavanca.digital"/>
<meta name="custodian" content="somos@alavanca.digital"/>
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
<?php /*?><link href="img/favicon.ico" rel="shortcut icon" /><?php */?>
<?php include("header_nocache.php"); ?>
<meta property="og:title" content="Loteamento Digital - Sistema de gestão de loteamentos" />
<meta property="og:description" content="Gerencie facilmente as vendas do seu loteamento e acabe com os milhares de e-mails e mensagens com propostas e contratos de vendas." />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.loteamento.digital" />
<meta property="og:image" content="" />
<meta property="og:site_name" content="Loteamento Digital - Sistema de gestão de loteamentos" />
<?php /*?>Pagina para verificação: https://developers.facebook.com/tools/debug<?php */?>
<meta name="Title" content="Loteamento Digital - Sistema de gestão de loteamentos"/>
<meta name="reply-to" content="atendimento@loteamento.digital"/>
<meta name="description" content="Gerencie facilmente as vendas do seu loteamento e acabe com os milhares de e-mails e mensagens com propostas e contratos de vendas."/>
<meta name="keywords" content=""/>
<meta name="copyright" content="Copyright 2021"/>
<meta name="DC.date.created" content="2021-06-10" />
<meta name="URL" content="http://www.loteamento.digital" />
<style type="text/css"><?php echo file_get_contents ('css/all.css');?></style>
<?php include("analytics.php"); ?>