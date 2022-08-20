<?php

Yii::import('application.models._base.BaseCorretor');

class Corretor extends BaseCorretor
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}


	public function init(){

	}
	public function cryptoSenha($senha) {
		return md5('&xh1%2as$(px827%-' . $senha);
	}

	public function senhaValida($senha, $senha_encript = false) {
		if (!$senha_encript)
		return $this->cryptoSenha($senha) == $this->senha;
		return $senha == $this->senha;
	}

	public function beforeSave(){
		if ($this->senha != "") {
			$this->senha = $this->cryptoSenha($this->senha);
		}elseif(!$this->isNewRecord){
			unset($this->senha);
		}

		//{{beforeSave}}
		return parent::beforeSave();
	}

	public function beforeValidate(){
		$this->cpf_cnpj = Util::soNumero($this->cpf_cnpj);
		//{{beforeValidate}}
		return parent::beforeValidate();
	}

	public function afterFind(){
		//{{afterFind}}
		return parent::afterFind();
	}

	public function behaviors(){
		return array(
			//{{behaviors}}
		);
	}

	public function enviarEmailRecuperarSenha() {
		$usuario_recupera_senha = new CorretorRecuperaSenha();
		$usuario_recupera_senha->ip = $_SERVER["REMOTE_ADDR"];
		$usuario_recupera_senha->data_solicitacao = date('d/m/Y H:i:s');
		$usuario_recupera_senha->idusuario = $this->idcorretor;
		$usuario_recupera_senha->email = $this->email;
		$usuario_recupera_senha->token = md5($this->email.time());
		$usuario_recupera_senha->data_validade = date('d/m/Y H:i:s', strtotime('+2 days'));

		if($usuario_recupera_senha->save()){
			$usuario_recupera_senha->refresh();
			if (trim($this->email)!=""){
				$message = new YiiMailMessage;
				$message->view = 'recupera-senha';
				$message->setBody(array('usuario' => $this, "usuario_recupera_senha"=> $usuario_recupera_senha),'text/html	','latin1');
				$message->subject = 'Recuperação de Senha - '.date('d/m/Y H:i:s');
				$message->addTo($this->email);
				$message->setFrom(array("atendimento@popupdigital.com.br" => Yii::app()->sistema_nome));
				if(Yii::app()->mail->send($message)){
					return true;
				}
			}

		}
		return false;

	}

	public function sendNotificacao() {

		if (trim($this->email)!=""){
			$message = new YiiMailMessage;
			$message->view = 'notificacao-cadastro';
			$message->setBody(array('corretor' => $this),'text/html	','latin1');
			$message->subject = 'Novo Corretor Cadastrado - '.date('d/m/Y H:i:s');
			$message->addTo(Yii::app()->sistema_email);
			$message->setFrom(array("atendimento@popupdigital.com.br" => Yii::app()->sistema_nome));
			if(Yii::app()->mail->send($message)){
				return true;
			}
		}
		return false;

	}

	public function sendConfirmacao() {

		if (trim($this->email)!=""){
			$message = new YiiMailMessage;
			$message->view = 'confirmacao-cadastro';
			$message->setBody(array('corretor' => $this),'text/html	','latin1');
			$message->subject = 'Confirmação de Cadastro - '.date('d/m/Y H:i:s');
			$message->addTo($this->email);
			$message->setFrom(array("atendimento@popupdigital.com.br" => Yii::app()->sistema_nome));
			if(Yii::app()->mail->send($message)){
				return true;
			}
		}
		return false;

	}

}
