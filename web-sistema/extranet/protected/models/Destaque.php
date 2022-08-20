<?php

Yii::import('application.models._base.BaseDestaque');

class Destaque extends BaseDestaque
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    
    public function init(){
		$this->data = date('d/m/Y H:i:s');
		$this->data_entrada = date('d/m/Y H:i:s');
		$this->data_saida = date('d/m/Y H:i:s');
  
    }
    
    public function beforeSave(){
		if($this->data != "")
				$this->data= Util::formataDataHoraBanco($this->data);
		if($this->data_entrada != "")
				$this->data_entrada= Util::formataDataHoraBanco($this->data_entrada);
		if($this->data_saida != "")
				$this->data_saida= Util::formataDataHoraBanco($this->data_saida);
		//{{beforeSave}}
		return parent::beforeSave();
	}
	
	public function afterFind(){
		if($this->data != "")
				$this->data = Util::formataDataHoraApp($this->data);
		if($this->data_entrada != "")
				$this->data_entrada = Util::formataDataHoraApp($this->data_entrada);
		if($this->data_saida != "")
				$this->data_saida = Util::formataDataHoraApp($this->data_saida);
		//{{afterFind}}
		return parent::afterFind();
	}
    
    public function behaviors(){
    	return array(
        	//{{behaviors}}
        );
    }
    
        
}