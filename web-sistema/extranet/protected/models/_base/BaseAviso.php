<?php

/**
 * This is the model base class for the table "aviso".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Aviso".
 *
 * Columns in table "aviso" available as properties of the model,
 * followed by relations of table "aviso" available as properties of the model.
 *
 * @property integer $idaviso
 * @property string $data
 * @property string $data_entrada
 * @property string $data_saida
 * @property string $texto
 * @property integer $idempreendimento
 * @property string $ativo
 *
 * @property Empreendimento $empreendimento
 */
abstract class BaseAviso extends GxActiveRecord {



	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'aviso';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Aviso|Avisos', $n);
	}

	public static function representingColumn() {
		return array('texto');
	}

	public function rules() {
		return array(
			array('idempreendimento, idcliente', 'numerical', 'integerOnly'=>true),
			array('ativo', 'length', 'max'=>1),
			array('data, data_entrada, data_saida, texto', 'safe'),
			array('data, data_entrada, data_saida, texto, idempreendimento, idcliente, ativo', 'default', 'setOnEmpty' => true, 'value' => null),
			array('idaviso, data, data_entrada, data_saida, texto, idempreendimento, idcliente, ativo', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'empreendimento' => array(self::BELONGS_TO, 'Empreendimento', 'idempreendimento'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'idaviso' => Yii::t('app', 'Idaviso'),
			'data' => Yii::t('app', 'Data'),
			'data_entrada' => Yii::t('app', 'Data de Entrada'),
			'data_saida' => Yii::t('app', 'Data de Sa?da'),
			'texto' => Yii::t('app', 'Texto'),
			'idempreendimento' => null,
			'ativo' => Yii::t('app', 'Ativo'),
			'empreendimento' => null,
			'idcliente' => Yii::t('app', 'Cliente'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('idaviso', $this->idaviso);
		$criteria->compare('data', $this->data, true);
		$criteria->compare('data_entrada', $this->data_entrada, true);
		$criteria->compare('data_saida', $this->data_saida, true);
		$criteria->compare('texto', $this->texto, true);
		$criteria->compare('idempreendimento', $this->idempreendimento);
		$criteria->compare('ativo', $this->ativo, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
