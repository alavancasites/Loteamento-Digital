<?php

Yii::import('application.models._base.BaseImovelReserva');

class ImovelReserva extends BaseImovelReserva
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}


	public function init(){
		$this->data = date('d/m/Y H:i:s');

	}

	public function beforeSave(){
		if($this->data != "")
		$this->data= Util::formataDataHoraBanco($this->data);
		//{{beforeSave}}
		return parent::beforeSave();
	}

	public function afterFind(){
		if($this->data != "")
		$this->data = Util::formataDataHoraApp($this->data);
		//{{afterFind}}
		return parent::afterFind();
	}

	public function beforeValidate(){
		$this->cpf_cnpj = Util::soNumero($this->cpf_cnpj);
		//{{beforeValidate}}
		return parent::beforeValidate();
	}

	public function behaviors(){
		return array(
			//{{behaviors}}
		);
	}

	//status
	public function getStatusArray(){
		return array(
			'indisponivel'=>'Indisponível',
			'disponivel'=>'Disponível',
			'reservado'=>'Reservado',
			'contrato'=>'Em Contrato',
			'vendido'=>'Vendido',
		);
	}
	public function getStatus(){
		$array = $this->getStatusArray();
		return $array[$this->status];
	}


}
