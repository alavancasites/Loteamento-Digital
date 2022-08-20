<?php

/**
 * This is the model base class for the table "arquivo_categoria".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ArquivoCategoria".
 *
 * Columns in table "arquivo_categoria" available as properties of the model,
 * followed by relations of table "arquivo_categoria" available as properties of the model.
 *
 * @property integer $idarquivo_categoria
 * @property integer $posicao
 * @property string $nome
 * @property string $ativo
 *
 * @property Arquivo[] $arquivos
 */
abstract class BaseArquivoCategoria extends GxActiveRecord {



	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'arquivo_categoria';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Categoria|Categorias', $n);
	}

	public static function representingColumn() {
		return array('nome');
	}

	public function rules() {
		return array(
			array('posicao, idcliente', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>100),
			array('ativo', 'length', 'max'=>1),
			array('posicao, nome, ativo, idcliente', 'default', 'setOnEmpty' => true, 'value' => null),
			array('idarquivo_categoria, posicao, nome, ativo, idcliente', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'arquivos' => array(self::HAS_MANY, 'Arquivo', 'idarquivo_categoria'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'idarquivo_categoria' => Yii::t('app', 'Idarquivo Categoria'),
			'posicao' => Yii::t('app', 'Posi��o'),
			'nome' => Yii::t('app', 'Nome'),
			'ativo' => Yii::t('app', 'Ativo'),
			'arquivos' => null,
			'idcliente' => Yii::t('app', 'Cliente'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('idarquivo_categoria', $this->idarquivo_categoria);
		$criteria->compare('posicao', $this->posicao);
		$criteria->compare('nome', $this->nome, true);
		$criteria->compare('ativo', $this->ativo, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
