<?php
include_once("RequestManager.php");
$rotas = array(
	//'/cadastro'=> 'cadastro.php',
	//'/perfil'=> 'perfil.php',
	//'/esqueci-senha'=> 'esqueci-senha.php',
	//'/imoveis'=> 'imoveis.php',
	//'/favoritos'=> 'favoritos.php',
	'/downloads'=> 'downloads.php',
	'/download/(?P<id>\d+)'=> 'force_download.php',

	//Links para inicial
	//'/'=>'inicial.php',
	//'/inicial'=>'inicial.php',
	//'/inicial/(?P<acesso>\w+)'=>'inicial.php',
	//'/index'=>'inicial.php',
	//'/inicial'=>'inicial.php',
	'/(?P<rota>\w+)/(?P<id>\d+)/(?P<tit>\S+)'=>'controle.php',
	'/(?P<rota>\S+)'=>'controle.php',

);
$request_manager = new RequestManager();
$request_manager->run($rotas);
exit;
