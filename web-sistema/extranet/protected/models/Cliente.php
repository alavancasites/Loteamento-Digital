<?php

Yii::import('application.models._base.BaseCliente');

class Cliente extends BaseCliente
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    
    public function init(){
		$this->data_criacao = date('d/m/Y H:i:s');
  
    }
    
    public function beforeSave(){
		if($this->data_criacao != "")
				$this->data_criacao= Util::formataDataHoraBanco($this->data_criacao);
		if($this->logomarca != "")
				unset($this->logomarca);
		//{{beforeSave}}
		return parent::beforeSave();
	}
	
	public function afterFind(){
		if($this->data_criacao != "")
				$this->data_criacao = Util::formataDataHoraApp($this->data_criacao);
		//{{afterFind}}
		return parent::afterFind();
	}
    
    public function behaviors(){
    	return array(
			'Logomarca' => array(
				  'class' => 'ext.behaviors.AttachmentBehavior',
				  'attribute' => 'logomarca',
				  'fallback_image' => 'img/imagem_nao_cadastrada.png',
				  'attribute_delete' => 'logomarca_delete',
				  /*
				  'attribute_size' => 'logomarca_tamanho',
				  'attribute_type' => 'logomarca_tipo',
				  'attribute_ext' => 'logomarca_ext',
				  */
				  'path' => "uploads/:model/logomarca_:id_".time().".:ext",
				  'styles' => array(
					  'p' => '200x200',
					  'g' => '800x800',
				)          
			),
        	//{{behaviors}}
        );
    }
    
        
}