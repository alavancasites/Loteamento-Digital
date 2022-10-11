<?php

function iniciarSessao($model){
	$_SESSION['hash_model_sessao'] = md5(md5(Util::soNumero($model->cpf_cnpj)).'91283hs85427h'.$model->senha);
}

function fecharSessao(){
	unset($_SESSION['hash_model_sessao']);
}


function carregarCliente(){
	$model = Cliente::model()->findByPk($_SESSION['filtro_cliente']);
	return $model;
}
function carregarLogin(){
	$obj = new Corretor();
	$criteria_sessao = new CDbCriteria();
	$criteria_sessao->addCondition("MD5(CONCAT(MD5(cpf_cnpj),'91283hs85427h',senha)) = '".$_SESSION['hash_model_sessao']."'");

	$model = $obj->find($criteria_sessao);

	return $model;
}



if(isset($_SESSION['hash_model_sessao'])){

	$model_sessao = carregarLogin();

}
if(isset($_SESSION['filtro_cliente'])){

	$cliente_sessao = carregarCliente();

}

$req_pagina = '404.php';
$prox_pagina = '';

if(!isset($_GET['rota'])){
	$req_pagina = '';
	$prox_pagina = 'login';
}

/*
echo $_SESSION['hash_model_sessao'].'<br/>';
echo $model_sessao->nome.'<br/>';
exit;
*/

$r = $_GET['rota'];

if($r == 'sair'){
	fecharSessao();
	$req_pagina = '';
	$prox_pagina = 'login';
}elseif($r == 'cliente'){
	$req_pagina = 'sel_cliente.php';
	$prox_pagina = '';
	if($_GET['cliente']!=''){

		$criteria = new CDbCriteria();
		$criteria->addCondition("MD5(idcliente) = '".$_GET['cliente']."'");
		$model = Cliente::model()->find($criteria);
		if(is_object($model)){
			$_SESSION['filtro_cliente'] = $model->idcliente;
			$req_pagina = '';
			$prox_pagina = 'terrenos';
		}
	}
}
elseif($r == 'login' && is_object($model_sessao)){
	$req_pagina = '';
	$prox_pagina = 'terrenos';
}elseif($r == 'login' ){

	$req_pagina = 'login.php';

	if(isset($_POST['Login'])){
		$criteria = new CDbCriteria();
		$criteria->addCondition("ativo = '1'");
		$login = $_POST['Login'];

		$obj = new Corretor();

		$criteria->addCondition("email = '".$login['email']."' OR cpf_cnpj = '".Util::soNumero($login['email'])."'");

		$model = $obj->find($criteria);
		$erro = Util::formataTexto('E-mail ou senha inválidos');
		if(is_object($model)){
			if($model->senhaValida($login['senha'])){
				iniciarSessao($model);

				if(count($model->clientes)==1){
					$_SESSION['filtro_cliente'] = $model->clientes[0]->idcliente;
					$req_pagina = '';
					$prox_pagina = 'terrenos';
				}else{
					$req_pagina = '';
					$prox_pagina = 'cliente';
				}

			}
		}

	}


}else if($r == 'esqueci-senha'){

	$req_pagina = 'esqueci-senha.php';
	if(isset($_POST['cpf_cnpj'])){
		$erro = Util::formataTexto('CPF/CNPJ inválido!');

		$criteria = new CDbCriteria();
		$criteria->addCondition("ativo = '1'");
		$criteria->addCondition("cpf_cnpj = '".Util::soNumero($_POST['cpf_cnpj'])."'");
		$model = Corretor::model()->find($criteria);

		if(is_object($model)){
			$rp = str_pad('', strlen(substr($model->email, 3, strlen($model->email)-9 )), '*');
			$fd = substr($model->email, 3, strlen($model->email)-9);
			$model->enviarEmailRecuperarSenha();
			$req_pagina = '';
			$prox_pagina = 'esqueci-senha?sucesso=senha&mail='.str_replace($fd, $rp, $model->email);
			$erro = '';
		}

	}


}else if($r == 'recupera-senha'){

	$req_pagina = 'recupera-senha.php';

	$erro = Util::formataTexto('Link de recuperação de senha inválido');

	if(isset($_GET['token'])){

		# verifica se existe usuario com este e-mail e senha...
		$criteria = new CDbCriteria();
		$criteria->addCondition("token = :token");
		$criteria->addCondition("data_validade >= '".date('Y-m-d H:i:s')."'");
		$criteria->addCondition("utilizado != '1' OR utilizado IS NULL");
		$criteria->params = array(":token" => $_GET['token']);
		$corretor_recupera_senha = CorretorRecuperaSenha::model()->find($criteria);
		//Token inválido
		if(is_object($corretor_recupera_senha)){

			$erro = "";

			if(is_array($_POST['RecuperarSenha'])){

				$corretor = $corretor_recupera_senha->corretor;

				$corretor->scenario = 'insert';
				$corretor->senha = $_POST['RecuperarSenha']['senha'];
				$corretor->senha_confirma = $_POST['RecuperarSenha']['senha_confirma'];

				if($corretor->validate(array('senha','senha_confirma'))){

					$corretor->updateByPk($corretor->idcorretor,array(
						'senha'=>$corretor->cryptoSenha($corretor->senha)
					));

					$corretor_recupera_senha->updateByPk($corretor_recupera_senha->idcorretor_recupera_senha,array(
						'utilizado'=>'1',
						'utilizado_ip'=> $_SERVER["REMOTE_ADDR"],
						'utilizado_data'=> date('Y-m-d H:i:s'),
					));

					$erro = '';
					$sucesso="Senha alterada com sucesso, por favor, realize login com a nova senha";
				}
				else{
					$erro = CHtml::errorSummary($corretor);
				}

			}

		}

	}

}elseif($r == 'cadastro'){

	$req_pagina = 'cadastro.php';

	$form = new CActiveForm();
	$model = new Corretor();

	if(is_array($_POST['Corretor'])){
		$model->attributes = $_POST['Corretor'];
		$model->ativo = 0;

		if($model->save()){
			//iniciarSessao($model);
			$model->sendNotificacao();
			$req_pagina = '';
			$prox_pagina = 'cadastro-sucesso';
			$erro = '';
		}
		$erro = CHtml::errorSummary($model);

	}



}elseif($r == 'cadastro-sucesso'){

	$req_pagina = 'cadastro-sucesso.php';

}else if(is_object($model_sessao)){
	if($r == 'index' || $r == 'inicial'){
		$req_pagina = 'inicial.php';
	}else if($r == 'destaques'){
		$req_pagina = 'destaques.php';

		$criteria_imoveis = new CDbCriteria();
		$criteria_imoveis->addCondition("t.ativo = '1'");
		$criteria_imoveis->addCondition("imovel.status <> 'vendido'");
		$criteria_imoveis->addCondition("imovel.destaque = '1'");
		$criteria_imoveis->order = 'nome asc';
		$criteria_imoveis->addCondition("imovel.ativo = '1'");
		$criteria_imoveis->join  = 'INNER JOIN imovel ON imovel.idempreendimento = t.idempreendimento';
		$criteria_imoveis->group = 't.idempreendimento';
		$criteria_imoveis->select = 't.*';

		$data_provider = new CActiveDataProvider('Empreendimento', array(
			'criteria'=> $criteria_imoveis,
			'pagination'=>array(
				'pageSize'=> 100,
				'pageVar' => 'page',
				'route'=>$r,
			),
		));

		$empreendimentos = $data_provider->getData();

	}else if($r == 'favoritos'){
		$req_pagina = 'favoritos.php';

		$criteria_imoveis = new CDbCriteria();
		$criteria_imoveis->addCondition("t.ativo = '1'");
		$criteria_imoveis->addCondition("imovel.ativo = '1'");
		$criteria_imoveis->addCondition("imovel.status <> 'vendido'");
		$criteria_imoveis->addCondition("imovel_favorito.idcorretor = '".$model_sessao->idcorretor."'");
		$criteria_imoveis->join  = 'INNER JOIN imovel ON imovel.idempreendimento = t.idempreendimento INNER JOIN imovel_favorito ON imovel_favorito.idimovel = imovel.idimovel';
		$criteria_imoveis->group = 't.idempreendimento';
		$criteria_imoveis->select = 't.*';

		$data_provider = new CActiveDataProvider('Empreendimento', array(
			'criteria'=> $criteria_imoveis,
			'pagination'=>array(
				'pageSize'=> 100,
				'pageVar' => 'page',
				'route'=>$r,
			),
		));

		$empreendimentos = $data_provider->getData();

	}else if($r == 'reservados'){
		$req_pagina = 'reservados.php';

		$criteria_imoveis = new CDbCriteria();
		$criteria_imoveis->addCondition("t.ativo = '1'");
		$criteria_imoveis->addCondition("imovel.ativo = '1'");
		$criteria_imoveis->addCondition("imovel.status <> 'vendido'");
		$criteria_imoveis->addCondition("imovel.idimovel_reserva IS NOT NULL");
		$criteria_imoveis->addCondition("imovel_reserva.idcorretor = '".$model_sessao->idcorretor."'");
		$criteria_imoveis->join  = 'INNER JOIN imovel ON imovel.idempreendimento = t.idempreendimento INNER JOIN imovel_reserva ON imovel_reserva.idimovel = imovel.idimovel';
		$criteria_imoveis->group = 't.idempreendimento';
		$criteria_imoveis->select = 't.*';
		$data_provider = new CActiveDataProvider('Empreendimento', array(
			'criteria'=> $criteria_imoveis,
			'pagination'=>array(
				'pageSize'=> 100,
				'pageVar' => 'page',
				'route'=>$r,
			),
		));

		$empreendimentos = $data_provider->getData();

	}else if($r == 'add-favorito'){
		$fav = new ImovelFavorito();
		$fav->idimovel = $_GET['id'];
		$fav->idcorretor = $model_sessao->idcorretor;
		if($fav->save()){
			$retorno = array('status'=>true);
		}else{
			$retorno = array('status'=>false, 'erro'=>CHtml::errorSummary($fav));
		}

	}else if($r == 'remove-favorito'){
		$criteria = new CDbCriteria();
		$criteria->addCondition("idimovel = '".$_GET['id']."'");
		$criteria->addCondition("idcorretor = '".$model_sessao->idcorretor."'");
		ImovelFavorito::model()->deleteAll($criteria);
		$retorno = array('status'=>true);

	}else if($r == 'terrenos'){

		$req_pagina = 'imoveis.php';

		$criteria_imoveis = new CDbCriteria();
		$criteria_imoveis->addCondition("t.ativo = '1'");
		$criteria_imoveis->addCondition("imovel.ativo = '1'");
		$criteria_imoveis->addCondition("imovel.status <> 'vendido'");
		$criteria_imoveis->join  = 'INNER JOIN imovel ON imovel.idempreendimento = t.idempreendimento';
		$criteria_imoveis->group = 't.idempreendimento';
		$criteria_imoveis->select = 't.*';

		if(is_numeric($_GET['empreendimento'])){
			$criteria_imoveis->addCondition("t.idempreendimento = '".$_GET['empreendimento']."'");
		}
		if(is_numeric($_GET['metragem_min'])){
			$val = Util::formataMoedaFloat($_GET['metragem_min']);
			$criteria_imoveis->addCondition("imovel.metragem >= '".$val."'");
		}
		if(is_numeric($_GET['metragem_max'])){
			$val = Util::formataMoedaFloat($_GET['metragem_max']);
			$criteria_imoveis->addCondition("imovel.metragem <= '".$val."'");
		}
		if(is_numeric($_GET['valor_min'])){
			$val = Util::formataMoedaFloat($_GET['valor_min']);
			$criteria_imoveis->addCondition("imovel.valor >= '".$val."'");
		}
		if(is_numeric($_GET['valor_max'])){
			$val = Util::formataMoedaFloat($_GET['valor_max']);
			$criteria_imoveis->addCondition("imovel.valor <= '".$val."'");
		}

		$data_provider = new CActiveDataProvider('Empreendimento', array(
			'criteria'=> $criteria_imoveis,
			'pagination'=>array(
				'pageSize'=> 100,
				'pageVar' => 'page',
				'route'=>$r,
			),
		));

		$empreendimentos = $data_provider->getData();

	}else if($r == 'perfil'){

		$req_pagina = 'perfil.php';

		$form = new CActiveForm();
		$model = $model_sessao;

		if(is_array($_POST['Corretor'])){
			$model->attributes = $_POST['Corretor'];
			$model->ativo = 1;

			if($model->save()){
				$model->refresh();
				iniciarSessao($model);
				$req_pagina = '';
				$prox_pagina = 'perfil?sucesso=atualizar';
				$erro = '';
			}
			$erro = CHtml::errorSummary($model);

		}



	}else if($r == 'reserva'){

		$req_pagina = 'reserva.php';
		$form = new CActiveForm();
		$criteria = new CDbCriteria();
		$criteria->addCondition("idcorretor = '".$model_sessao->idcorretor."'");
		$model = ImovelReserva::model()->findByPk($_GET['id'], $criteria);
		if(is_array($_POST['ImovelReserva'])){

			$model->setAttributes($_POST['ImovelReserva']);
			$model->ativo = 1;
			if($model->save()){

				$req_pagina = '';
				$prox_pagina = 'reserva?id='.$model->idimovel_reserva.'&sucesso=atualizar';
				$erro = '';
			}

			$erro = CHtml::errorSummary($model);

		}

	}else if($r=='add-reserva'){

		$criteria = new CDbCriteria();
		$criteria->addCondition("t.ativo = '1'");
		$criteria->addCondition("t.status <> 'vendido'");
		$imovel = Imovel::model()->findByPk($_POST['ImovelReserva']['idimovel']);
		$retorno = array('status'=>false, 'erro'=>'<div class="errorSummary">Imóvel inválido!</div>');

		if(is_object($imovel)){

			$retorno = array('status'=>false, 'erro'=>'<div class="errorSummary">Imovel ja foi reservado!</div>');
			if($imovel->status=='disponivel' || (!$imovel->imovelReservaSeg && $imovel->imovelReserva->idcorretor!=$model_sessao->idcorretor)){
				$retorno = array('status'=>false, 'erro'=>'<div class="errorSummary">Formulario vazio!</div>');
				if(is_array($_POST['ImovelReserva'])){
					$model = new ImovelReserva();
					$model->idcorretor = $model_sessao->idcorretor;
					$model->setAttributes($_POST['ImovelReserva']);
					$model->ativo = 1;
					$model->status='reservado';
					if($model->save()){
						if($imovel->status=='disponivel'){
							$notif = 'reserva';
							$novo_status = 'Reservado';
							$data = date('Y-m-d H:i:s', strtotime(Yii::app()->sistema_duracao_reserva));
							Imovel::model()->updateByPk($imovel->idimovel, array('status'=>'reservado','idimovel_reserva'=>$model->idimovel_reserva, 'limite'=>$data));
						}else{
							$notif = 'seg_reserva';
							$novo_status = 'Segunda Reserva';
							Imovel::model()->updateByPk($imovel->idimovel, array('idimovel_reserva_seg'=>$model->idimovel_reserva));
						}
						HistoricoReserva::model()->adicionar(array(
							'idcorretor'=>$model_sessao->idcorretor,
							'idimovel'=>$imovel->idimovel,
							'status_antigo'=>$imovel->getStatus(),
							'status_novo'=>$novo_status,
							'idimovel_reserva'=>$model->idimovel_reserva,
							'notificacao'=>$notif,
						));
						$retorno = array('status'=>true);
					}else{
						$erro = CHtml::errorSummary($model);
						$retorno = array('status'=>false, 'erro'=>$erro);
					}
				}
			}

		}
	}elseif($r=='remove-reserva'){
		$criteria = new CDbCriteria();
		$criteria->addCondition("t.ativo = '1'");
		$criteria->addCondition("t.status <> 'vendido'");
		$imovel = Imovel::model()->findByPk($_GET['id'], $criteria);

		$retorno = array('status'=>false, 'erro'=>'Imóvel não foi reservado por você!');
		if(is_object($imovel) &&  $imovel->imovelReserva->idcorretor==$model_sessao->idcorretor){
			$status = $imovel->getStatus();
			if($imovel->imovelReservaSeg){
				ImovelReserva::model()->updateByPk($imovel->idimovel_reserva, array('status'=>'cancelada'));
				$data = date('Y-m-d H:i:s', strtotime(Yii::app()->sistema_duracao_reserva));
				Imovel::model()->updateByPk($imovel->idimovel, array('status'=>'reservado', 'limite'=>$data, 'idimovel_reserva'=>$imovel->idimovel_reserva_seg, 'idimovel_reserva_seg'=>NULL));
				HistoricoReserva::model()->adicionar(array(
					'idcorretor'=>$model_sessao->idcorretor,
					'idimovel'=>$imovel->idimovel,
					'status_antigo'=>'Reserva cancelada',
					'status_novo'=>'Transferida para a segunda reserva',
					'idimovel_reserva'=>$imovel->idimovel_reserva_seg,
					'notificacao'=>'cancelada_transferida',
				));
			}else{
				Imovel::model()->updateByPk($imovel->idimovel, array('status'=>'disponivel', 'limite'=>date('Y-m-d H:i:s'), 'idimovel_reserva'=>NULL));
				ImovelReserva::model()->updateByPk($imovel->idimovel_reserva, array('status'=>'cancelada'));
				HistoricoReserva::model()->adicionar(array(
					'idcorretor'=>$model_sessao->idcorretor,
					'idimovel'=>$imovel->idimovel,
					'status_antigo'=>'Reserva cancelada',
					'status_novo'=>'Disponivel',
					'idimovel_reserva'=>$imovel->idimovel_reserva,
					'notificacao'=>'cancelada',
				));
			}


			$retorno = array('status'=>true);
		}

	}elseif($r=='renovar-reserva'){
		$criteria = new CDbCriteria();
		$criteria->addCondition("t.ativo = '1'");
		$criteria->addCondition("t.status <> 'vendido'");
		$imovel = Imovel::model()->findByPk($_GET['id'], $criteria);

		$retorno = array('status'=>false, 'erro'=>'Imóvel não foi reservado por você!');
		if(is_object($imovel) &&  $imovel->imovelReserva->idcorretor==$model_sessao->idcorretor){

			$status = $imovel->getStatus();
			$retorno = array('status'=>false, 'erro'=>'Reserva só pode ser renovada uma vez!');
			if($imovel->imovelReserva->renovado!=1){
				ImovelReserva::model()->updateByPk($imovel->idimovel_reserva, array('renovado'=>'1'));
				$data = date('Y-m-d H:i:s', strtotime(Yii::app()->sistema_duracao_renovacao));
				Imovel::model()->updateByPk($imovel->idimovel, array('limite'=>$data));
				HistoricoReserva::model()->adicionar(array(
					'idcorretor'=>$model_sessao->idcorretor,
					'idimovel'=>$imovel->idimovel,
					'status_antigo'=>$status.' e renovada(o)',
					'status_novo'=>$status,
					'idimovel_reserva'=>$imovel->idimovel_reserva,
					'notificacao'=>'renovada',
				));
				$retorno = array('status'=>true);
			}


		}

	}else if($r=='quadra'){

		$req_pagina = 'empreendimento_mostra.php';
		$criteria = new CDbCriteria();
		$criteria->addCondition("t.ativo = '1'");
		$empreendimento = Empreendimento::model()->findByPk($_GET['id'], $criteria);

		$contato = new Contato();
		$enviado = false;
		if(is_array($_POST['Contato'])){

			$contato->setAttributes($_POST['Contato']);
			$contato->ativo = 1;
			$contato->idempreendimento = $empreendimento->idempreendimento;

			if($contato->save()){
				$contato = new Contato();
				$enviado = true;
				$erro = '';
			}else{
				$erro = CHtml::errorSummary($contato);
			}
		}

	}else{
		$req_pagina = '404.php';
	}


}else{
	if(is_object($model_sessao)){
		$req_pagina = '';
		$prox_pagina = 'imoveis';
	}else{
		$req_pagina = '404.php';
		$erro = Util::formataTexto('É necessário fazer login para acessar essa página!');
	}
}

// gera log
/*
$log = new LogCampanha();
$log->retorno = $erro!=''?$erro:'sucesso';
$log->rota = $_GET['r'];
$log->status = trim($erro)!=''?'erro':'sucesso';
$log->idcorretor = is_object($corretor_logado)?$corretor_logado->idcorretor:NULL;
$log->save();
*/


if($exit){
	exit;
}
elseif(is_array($retorno)){
	echo CJSON::encode($retorno);
	exit;
}
elseif ($req_pagina != "") {
	require($req_pagina);
}
elseif ($prox_pagina != "") {
	?>
	<html>
	<head>
		<title>Carregando...</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	</head>

	<body>
		<script language="JavaScript">
		// Despacha a requisiï¿½ï¿½o para a pï¿½gina apropriada
		location.href = '<? echo Yii::app()->baseUrl.'/'.$prox_pagina ?>';
		</script>
	</body>
	</html>
	<?
}
?>
