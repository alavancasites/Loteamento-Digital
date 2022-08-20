<?php

Yii::import('application.models._base.BaseInteresse');

class Interesse extends BaseInteresse
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    
    public function init(){
		$this->data = date('d/m/Y H:i:s');
		$this->dia = date('d/m/Y');
  
    }
    
    public function beforeSave(){
		if($this->data != "")
				$this->data= Util::formataDataHoraBanco($this->data);
		if($this->dia != "")
			$this->dia = Util::formataDataBanco($this->dia);
		//{{beforeSave}}
		return parent::beforeSave();
	}
	
	public function afterFind(){
		if($this->data != "")
				$this->data = Util::formataDataHoraApp($this->data);
		if($this->dia != "")
			$this->dia = Util::formataDataApp($this->dia);
		//{{afterFind}}
		return parent::afterFind();
	}
    
    public function behaviors(){
    	return array(
        	//{{behaviors}}
        );
    }
    
        
}