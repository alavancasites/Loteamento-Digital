<?php
$file = '404-aberto.php';
if(is_object($model_sessao)){
	$file = '404-logado.php';
}
require($file);
?>