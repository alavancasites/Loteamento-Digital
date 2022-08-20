<?php

Yii::import('application.models._base.BaseEmpreendimento');

class Empreendimento extends BaseEmpreendimento
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}


	public function init(){
		$this->latitude = Yii::app()->sistema_lat;
		$this->longitude = Yii::app()->sistema_lng;
	}

	public function beforeSave(){
		$this->andamento = CJSON::encode(is_array($this->andamento)?$this->andamento:array());
		//{{beforeSave}}
		return parent::beforeSave();
	}

	public function afterFind(){
		if($this->andamento!=''){
			$this->andamento = CJSON::decode($this->andamento);
		}else{
			$this->andamento = array();
		}
		//{{afterFind}}
		return parent::afterFind();
	}

	public function behaviors(){
		return array(
			'galeria' => array(
				'class' => 'GalleryBehavior',
				'idAttribute' => 'gallery_id',
				'versions' => array(
					'small' => array(
						'centeredpreview' => array(200, 200),
					),
					'medium' => array(
						'resize' => array(800, null),
					)
				),
				'name' => false,
				'description' => true,
			)
			//{{behaviors}}
		);
	}

	public function count_disponiveis(){
		$criteria = new CDbCriteria();
		$criteria->addCondition("ativo = '1'");
		$criteria->addCondition("status = 'disponivel' OR limite < '".date('Y-m-d H:i:s')."'");
		$criteria->addCondition("status <> 'vendido'");
		$criteria->addCondition("idempreendimento = '".$this->idempreendimento."'");
		return Imovel::model()->count($criteria);
	}

	public function count_reservados($id=0){
		$criteria = new CDbCriteria();
		$criteria->addCondition("t.status <> 'vendido'");
		$criteria->addCondition("t.ativo = '1'");
		$criteria->addCondition("t.idempreendimento = '".$this->idempreendimento."'");
		$criteria->addCondition("t.status = 'reservado' AND t.limite > '".date('Y-m-d H:i:s')."'");
		if($id){
			$criteria->addCondition("imovelReserva.idcorretor = '".$id."'");
			$criteria->with = array('imovelReserva');
			$criteria->together = true;
		}
		return Imovel::model()->count($criteria);
	}

	public function count_contrato($id=0){
		$criteria = new CDbCriteria();
		$criteria->addCondition("t.ativo = '1'");
		$criteria->addCondition("t.status <> 'vendido'");
		$criteria->addCondition("t.idempreendimento = '".$this->idempreendimento."'");
		$criteria->addCondition("t.status = 'contrato' AND t.limite > '".date('Y-m-d H:i:s')."'");
		if($id){
			$criteria->addCondition("imovelReserva.idcorretor = '".$id."'");
			$criteria->with = array('imovelReserva');
			$criteria->together = true;
		}
		return Imovel::model()->count($criteria);
	}

	public function getAndamento($i){
		$values = array(
			'fundacao'=>'Fundações',
			'estrutura'=>'Estrutura de concreto',
			'alvenaria'=>'Alvenaria',
			'instalacoes'=>'Instalações',
			'rev_interno'=>'Revestimento Interno',
			'rev_externo'=>'Revestimento Externo',
			'acabamento'=>'Acabamentos',
		);
		return $values[$i];
	}

}
