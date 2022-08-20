<?php

Yii::import('application.models._base.BaseImovel');

class Imovel extends BaseImovel
{

	public $empreendimento_nome;
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}


	public function init(){
		$this->status = 'disponivel';
		$this->limite = date('d/m/Y H:i:s');

	}

	public function beforeValidate(){
		if($this->valor != "")
		$this->valor= Util::formataMoedaFloat($this->valor);
		//{{beforeValidate}}
		return parent::beforeValidate();
	}

	public function afterFind(){
		$this->empreendimento_nome = $this->empreendimento->nome;
		if($this->limite != "")
		$this->limite = Util::formataDataHoraApp($this->limite);
		if($this->valor != "")
		$this->valor= Util::formataFloatMoeda($this->valor);

		if($this->verificaData()){
			$this->refresh();
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

	//tipo
	public function getTipoArray(){
		return array(
			'casa'=>'Casa',
			'terreno'=>'Terreno',
			'apartamento'=>'Apartamento',
			'barracao'=>'Barracão'
		);
	}
	public function getTipo(){
		$array = $this->getTipoArray();
		return $array[$this->tipo];
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

	public function verificaData(){
		if($this->status=='reservado' || $this->status=='contrato'){
			if(strtotime(date('Y-m-d H:i:s'))>strtotime(Util::formataDataHoraBanco($this->limite))){
				ImovelReserva::model()->updateByPk($this->idimovel_reserva, array('status'=>'expirado'));
				if($this->imovelReservaSeg){
					$data = date('Y-m-d H:i:s', strtotime(Yii::app()->sistema_duracao_reserva));
					Imovel::model()->updateByPk($this->idimovel, array('status'=>'reservado', 'limite'=>$data, 'idimovel_reserva'=>$this->idimovel_reserva_seg, 'idimovel_reserva_seg'=>NULL));
					HistoricoReserva::model()->adicionar(array(
						'idimovel'=>$this->idimovel,
						'status_antigo'=>$status,
						'status_novo'=>'Transferida a reserva',
						'idimovel_reserva'=>$this->idimovel_reserva_seg,
						'notificacao'=>'expirada_transferida',
					));
				}else{
					Imovel::model()->updateByPk($this->idimovel, array('status'=>'disponivel', 'idimovel_reserva'=>NULL));
					HistoricoReserva::model()->adicionar(array(
						'idimovel'=>$this->idimovel,
						'status_antigo'=>$status,
						'status_novo'=>'Disponivel',
						'idimovel_reserva'=>$imovel->idimovel_reserva,
						'notificacao'=>'expirada',
					));
				}
				// HistoricoReserva::model()->adicionar(array(
				// 	'idimovel'=>$this->idimovel,
				// 	'status_antigo'=>$this->getStatus(),
				// 	'status_novo'=>'Disponível'
				// ));
				// Imovel::model()->updateByPk($this->idimovel, array('status'=>'disponivel', 'idimovel_reserva'=>NULL));

				return true;
			}
			return false;
		}
		return false;
	}

	public function favorito($id){
		$criteria = new CDbCriteria();
		$criteria->addCondition("idimovel = '".$this->idimovel."'");
		$criteria->addCondition("idcorretor = '".$id."'");
		$fav = ImovelFavorito::model()->find($criteria);
		return is_object($fav);
	}

	public function getExpiracao(){

		$your_date = strtotime(Util::formataDataHoraBanco($this->limite));
		$now = strtotime(date('Y-m-d H:i:s'));
		$datediff = $your_date-$now;
		$dias = floor($datediff / (60 * 60 * 24));
		return $dias==0?'HOJE':('EM '.$dias.' DIAS');

	}

}
