<?php

Yii::import('application.models._base.BaseCorretorRecuperaSenha');

class CorretorRecuperaSenha extends BaseCorretorRecuperaSenha
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    
    public function init(){
		$this->data_solicitacao = date('d/m/Y H:i:s');
		$this->data_validade = date('d/m/Y H:i:s');
		$this->utilizado_data = date('d/m/Y H:i:s');
  
    }
    
    public function beforeSave(){
		if($this->data_solicitacao != "")
				$this->data_solicitacao= Util::formataDataHoraBanco($this->data_solicitacao);
		if($this->data_validade != "")
				$this->data_validade= Util::formataDataHoraBanco($this->data_validade);
		if($this->utilizado_data != "")
				$this->utilizado_data= Util::formataDataHoraBanco($this->utilizado_data);
		//{{beforeSave}}
		return parent::beforeSave();
	}
	
	public function afterFind(){
		if($this->data_solicitacao != "")
				$this->data_solicitacao = Util::formataDataHoraApp($this->data_solicitacao);
		if($this->data_validade != "")
				$this->data_validade = Util::formataDataHoraApp($this->data_validade);
		if($this->utilizado_data != "")
				$this->utilizado_data = Util::formataDataHoraApp($this->utilizado_data);
		//{{afterFind}}
		return parent::afterFind();
	}
    
    public function behaviors(){
    	return array(
        	//{{behaviors}}
        );
    }
    
        
}