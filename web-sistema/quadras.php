<?php
include_once('extranet/autoload.php');

// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
//busca clientes que compraram o produto
$criteria= new CDbCriteria();
$criteria->addCondition("ativo = '1'");

$imoveis = Empreendimento::model()->findAll($criteria);

$retorno = array();
header("Content-type: application/json");
if(count($imoveis)){
	// Iterate through the rows, adding XML nodes for each
	foreach($imoveis as $imovel){
		// // Add to XML document node
		// $node = $dom->createElement("marker");
		// $newnode = $parnode->appendChild($node);
		// $newnode->setAttribute("name", utf8_encode($imovel->nome));
		// $newnode->setAttribute("description", utf8_encode($imovel->nome));
		// $newnode->setAttribute("lat", $imovel->latitude);
		// $newnode->setAttribute("lng", $imovel->longitude);
		// $newnode->setAttribute("type", 'lac');
		$retorno[]= array(
			"name"=>($imovel->nome),
			"description"=>'<a href="quadra/'.$imovel->idempreendimento.'/'.Util::removerAcentos($imovel->nome) .'" class="bt_empreendimento"><i class="icon-mapa"></i> + VER QUADRA NO MAPA</a>',
			"lat"=>$imovel->latitude,
			"lng"=> $imovel->longitude,
		);
	}
}
echo CJSON::encode($retorno);
// echo $dom->saveXML();
?>
