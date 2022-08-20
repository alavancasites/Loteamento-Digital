<?php

/**
* This is the model base class for the table "empreendimento".
* DO NOT MODIFY THIS FILE! It is automatically generated by giix.
* If any changes are necessary, you must set or override the required
* property or method in class "Empreendimento".
*
* Columns in table "empreendimento" available as properties of the model,
* followed by relations of table "empreendimento" available as properties of the model.
*
* @property integer $idempreendimento
* @property string $nome
* @property string $descricao
* @property string $andamento
* @property string $latitude
* @property string $longitude
* @property integer $idestado
* @property integer $idcidade
* @property integer $idbairro
* @property string $foto
* @property integer $gallery_id
* @property string $ativo
*
* @property Bairro $bairro
* @property Cidade $cidade
* @property Estado $estado
* @property Gallery $gallery
* @property Imovel[] $imovels
*/
abstract class BaseEmpreendimento extends GxActiveRecord {



	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'empreendimento';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Quadra|Quadras', $n);
	}

	public static function representingColumn() {
		return array('nome');
	}

	public function rules() {
		return array(
			array('idestado, idcidade, idbairro, gallery_id, idcliente', 'numerical', 'integerOnly'=>true),
			array('nome, latitude, longitude', 'length', 'max'=>100),
			array('foto', 'length', 'max'=>160),
			array('ativo', 'length', 'max'=>1),
			array('descricao, andamento', 'safe'),
			array('nome, descricao, andamento, latitude, longitude, idestado, idcidade, idbairro, foto, gallery_id, idcliente, ativo', 'default', 'setOnEmpty' => true, 'value' => null),
			array('idempreendimento, nome, descricao, andamento, latitude, longitude, idestado, idcidade, idbairro, foto, gallery_id, idcliente, ativo', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'bairro' => array(self::BELONGS_TO, 'Bairro', 'idbairro'),
			'cidade' => array(self::BELONGS_TO, 'Cidade', 'idcidade'),
			'estado' => array(self::BELONGS_TO, 'Estado', 'idestado'),
			'imovels' => array(self::HAS_MANY, 'Imovel', 'idempreendimento','condition'=>"imovels.status <> 'vendido'"),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'idempreendimento' => Yii::t('app', 'Idempreendimento'),
			'nome' => Yii::t('app', 'Nome'),
			'descricao' => Yii::t('app', 'Descri��o'),
			'andamento' => Yii::t('app', 'Andamento da obra'),
			'latitude' => Yii::t('app', 'Latitude'),
			'longitude' => Yii::t('app', 'Longitude'),
			'idestado' => null,
			'idcidade' => null,
			'idbairro' => null,
			'foto' => Yii::t('app', 'Foto'),
			'gallery_id' => Yii::t('app', 'Fotos'),
			'ativo' => Yii::t('app', 'Ativo'),
			'bairro' => null,
			'cidade' => null,
			'estado' => null,
			'gallery' => null,
			'imovels' => null,
			'idcliente' => Yii::t('app', 'Cliente'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('idempreendimento', $this->idempreendimento);
		$criteria->compare('nome', $this->nome, true);
		$criteria->compare('descricao', $this->descricao, true);
		$criteria->compare('andamento', $this->andamento, true);
		$criteria->compare('latitude', $this->latitude, true);
		$criteria->compare('longitude', $this->longitude, true);
		$criteria->compare('idestado', $this->idestado);
		$criteria->compare('idcidade', $this->idcidade);
		$criteria->compare('idbairro', $this->idbairro);
		$criteria->compare('foto', $this->foto, true);
		$criteria->compare('gallery_id', $this->gallery_id);
		$criteria->compare('ativo', $this->ativo, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}