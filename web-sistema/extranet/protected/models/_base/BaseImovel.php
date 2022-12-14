<?php

/**
* This is the model base class for the table "imovel".
* DO NOT MODIFY THIS FILE! It is automatically generated by giix.
* If any changes are necessary, you must set or override the required
* property or method in class "Imovel".
*
* Columns in table "imovel" available as properties of the model,
* followed by relations of table "imovel" available as properties of the model.
*
* @property integer $idimovel
* @property integer $idempreendimento
* @property string $nome
* @property string $descricao
* @property string $tipo
* @property string $cadastro_imobiliario
* @property string $matricula_imobiliaria
* @property double $metragem
* @property double $valor
* @property string $quartos
* @property string $garagens
* @property string $foto
* @property integer $gallery_id
* @property string $ativo
* @property integer $idimovel_reserva
* @property integer $idindice
* @property string $status
* @property string $limite
*
* @property HistoricoReserva[] $historicoReservas
* @property Empreendimento $empreendimento
* @property Gallery $gallery
* @property ImovelReserva $imovelReserva
* @property Indice $indice
* @property ImovelFavorito[] $imovelFavoritos
* @property ImovelReserva[] $imovelReservas
*/
abstract class BaseImovel extends GxActiveRecord {



	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'imovel';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Lote|Lotes', $n);
	}

	public static function representingColumn() {
		return array('nome');
	}

	public function rules() {
		return array(
			array('idempreendimento, idcliente, gallery_id, idimovel_reserva, idimovel_reserva_seg, idindice, quartos, garagens', 'numerical', 'integerOnly'=>true),
			array('metragem,metragem_fundo, metragem_frente, metragem_esquerda, metragem_direita, valor', 'numerical'),
			array('nome, cadastro_imobiliario, matricula_imobiliaria, quartos, garagens', 'length', 'max'=>100),
			array('tipo, status', 'length', 'max'=>150),
			array('foto', 'length', 'max'=>160),
			array('ativo, destaque', 'length', 'max'=>1),
			array('descricao, limite', 'safe'),
			array('idempreendimento, idcliente, nome, descricao, tipo, cadastro_imobiliario, matricula_imobiliaria, metragem, valor, quartos, garagens, foto, gallery_id, ativo, idimovel_reserva, idimovel_reserva_seg, idindice, status, limite, destaque,metragem_fundo, metragem_frente, metragem_esquerda, metragem_direita', 'default', 'setOnEmpty' => true, 'value' => null),
			array('idimovel, idempreendimento, idcliente, nome, descricao, tipo, cadastro_imobiliario, matricula_imobiliaria, metragem, valor, quartos, garagens, foto, gallery_id, ativo, idimovel_reserva, idimovel_reserva_seg, idindice, status, limite, destaque,metragem_fundo, metragem_frente, metragem_esquerda, metragem_direita', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'historicoReservas' => array(self::HAS_MANY, 'HistoricoReserva', 'idimovel'),
			'empreendimento' => array(self::BELONGS_TO, 'Empreendimento', 'idempreendimento'),
			'imovelReserva' => array(self::BELONGS_TO, 'ImovelReserva', 'idimovel_reserva'),
			'imovelReservaSeg' => array(self::BELONGS_TO, 'ImovelReserva', 'idimovel_reserva_seg'),
			'indice' => array(self::BELONGS_TO, 'Indice', 'idindice'),
			'imovelFavoritos' => array(self::HAS_MANY, 'ImovelFavorito', 'idimovel'),
			'imovelReservas' => array(self::HAS_MANY, 'ImovelReserva', 'idimovel'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'idimovel' => Yii::t('app', 'Idimovel'),
			'idempreendimento' => null,
			'nome' => Yii::t('app', 'Nome'),
			'descricao' => Yii::t('app', 'Descri??o'),
			'tipo' => Yii::t('app', 'Tipo'),
			'cadastro_imobiliario' => Yii::t('app', 'Cadastro Imobili?rio'),
			'matricula_imobiliaria' => Yii::t('app', 'Matr?cula Imobili?ria'),
			'metragem' => Yii::t('app', 'Metragem Total'),
			'metragem_fundo' => Yii::t('app', 'Metragem de fundo'),
			'metragem_frente' => Yii::t('app', 'Metragem de frente'),
			'metragem_esquerda' => Yii::t('app', 'Metragem do lado esquerdo'),
			'metragem_direita' => Yii::t('app', 'Metragem do lado direito'),
			'valor' => Yii::t('app', 'Valor'),
			'quartos' => Yii::t('app', 'Quartos'),
			'garagens' => Yii::t('app', 'Garagens'),
			'foto' => Yii::t('app', 'Foto'),
			'gallery_id' => null,
			'ativo' => Yii::t('app', 'Ativo'),
			'idimovel_reserva' => null,
			'idindice' => null,
			'status' => Yii::t('app', 'Status'),
			'limite' => Yii::t('app', 'Limite'),
			'destaque' => Yii::t('app', 'Destaque'),
			'historicoReservas' => null,
			'empreendimento' => null,
			'gallery' => null,
			'imovelReserva' => null,
			'indice' => null,
			'imovelFavoritos' => null,
			'imovelReservas' => null,
			'idcliente' => Yii::t('app', 'Cliente'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('idimovel', $this->idimovel);
		$criteria->compare('idempreendimento', $this->idempreendimento);
		$criteria->compare('nome', $this->nome, true);
		$criteria->compare('descricao', $this->descricao, true);
		$criteria->compare('tipo', $this->tipo, true);
		$criteria->compare('cadastro_imobiliario', $this->cadastro_imobiliario, true);
		$criteria->compare('matricula_imobiliaria', $this->matricula_imobiliaria, true);
		$criteria->compare('metragem', $this->metragem);
		$criteria->compare('valor', $this->valor);
		$criteria->compare('quartos', $this->quartos, true);
		$criteria->compare('garagens', $this->garagens, true);
		$criteria->compare('foto', $this->foto, true);
		$criteria->compare('gallery_id', $this->gallery_id);
		$criteria->compare('ativo', $this->ativo, true);
		$criteria->compare('idimovel_reserva', $this->idimovel_reserva);
		$criteria->compare('idindice', $this->idindice);
		$criteria->compare('status', $this->status, true);
		$criteria->compare('limite', $this->limite, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
