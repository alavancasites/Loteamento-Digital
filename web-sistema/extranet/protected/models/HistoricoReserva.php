<?php

Yii::import('application.models._base.BaseHistoricoReserva');

class HistoricoReserva extends BaseHistoricoReserva
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

    public function behaviors(){
    	return array(
        	//{{behaviors}}
        );
    }

	public function adicionar($dados){
		$hist = new HistoricoReserva();
		$hist->setAttributes($dados);
		$hist->save();

		$message = new YiiMailMessage;
		$message->view = 'movimentacao-reserva';
		$message->setBody(array('imovel' => $hist->imovel, 'historico' => $hist, 'reserva'=>$hist->reserva),'text/html	','latin1');
		$message->subject = 'Reserva de Lote - '.date('d/m/Y H:i:s');
		$message->addTo(Yii::app()->sistema_email);
		// $message->addTo('gean.rotta@gmail.com');
		$message->setFrom(array("atendimento@popupdigital.com.br" => Yii::app()->sistema_nome));
		if(Yii::app()->mail->send($message)){
			return true;
		}
    	return true;
    }

	public function getTexto(){
		if($this->notificacao=='reserva'){
			return 'Lote reservado por '.$this->corretor->nome;
		}
		if($this->notificacao=='seg_reserva'){
			return 'Segunda reserva realizada por '.$this->corretor->nome;
		}
		if($this->notificacao=='contrato'){
			return 'Lote entrou em contrato por '.$this->corretor->nome;
		}
		if($this->notificacao=='renovada'){
			return 'Reserva cancelada por '.($this->corretor?$this->corretor->nome:'Sistema');
		}
		if($this->notificacao=='cancelada'){
			return 'Reserva cancelada por '.($this->corretor?$this->corretor->nome:'Sistema');
		}
		if($this->notificacao=='cancelada_transferida'){
			return 'Reserva cancelada por '.($this->corretor?$this->corretor->nome:'Sistema').' e transferida para segunda reserva';
		}
		if($this->notificacao=='expirada'){
			return 'Reserva expirada';
		}
		if($this->notificacao=='vendido'){
			return 'Lote vendido';
		}
		if($this->notificacao=='expirada_transferida'){
			return 'Reserva expirada e transferida para segunda reserva';
		}
		return 'Alterado de '.$this->status_antigo.' para '.$this->status_novo.' em '.Util::formataDataHoraApp($this->data).' por '.($this->corretor?$this->corretor:'Sistema');
	}

	public function mostraDados(){
		if($this->notificacao=='reserva'){
			return true;
		}
		if($this->notificacao=='seg_reserva'){
			return true;
		}
		if($this->notificacao=='contrato'){
			return true;
		}
		if($this->notificacao=='cancelada'){
			return false;
		}
		if($this->notificacao=='cancelada_transferida'){
			return true;
		}
		if($this->notificacao=='expirada'){
			return false;
		}
		if($this->notificacao=='expirada_transferida'){
			return true;
		}
		if($this->notificacao=='vendido'){
			return false;
		}
		return true;
	}

}
