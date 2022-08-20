<?php 
include_once("gzip/gzipHTML.php");
session_start();
include_once("extranet/autoload.php");
include_once("RequestManager.php");
$rotas = array(
	'/funcionalidades'=> 'funcionalidades.php',
	'/planos'=> 'planos.php',
	'/contato'=> 'contato_page.php',
	'/termos-de-uso'=> 'termos.php',
	'/politica-de-privacidade'=> 'privacidade.php',
	'/servico/(?P<servico>\S+)/(?P<titulo>\S+)'=>'servicos_mostra.php',
	'/'=>'inicial.php',
	'/inicial'=>'inicial.php',
	'/inicial/(?P<acesso>\w+)'=>'inicial.php',
	'/index'=>'inicial.php',
	'/inicial'=>'inicial.php',
	'/(?P<url>\S+)'=>'inicial.php',
);
$request_manager = new RequestManager();
$request_manager->run($rotas);
exit;