<?php

/**
 * This is the model base class for the table "newsletter".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Newsletter".
 *
 * Columns in table "newsletter" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $idnewsletter
 * @property string $ip
 * @property string $data
 * @property string $nome
 * @property string $email
 * @property string $aceito
 * @property string $ativo
 *
 */
abstract class BaseNewsletter extends GxActiveRecord {


  public static function model( $className = __CLASS__ ) {
    return parent::model( $className );
  }

  public function tableName() {
    return 'newsletter';
  }

  public static function label( $n = 1 ) {
    return Yii::t( 'app', 'Newsletter|Newsletters', $n );
  }

  public static function representingColumn() {
    return array( 'nome' );
  }

  public function rules() {
    return array(
      array( 'ip, nome, email', 'length', 'max' => 100 ),
      array( 'aceito, ativo', 'length', 'max' => 1 ),
      array( 'data', 'safe' ),
      array( 'email', 'email' ),
      array( 'nome, email, aceito', 'required' ),
      array( 'ip, data, nome, email, aceito, ativo', 'default', 'setOnEmpty' => true, 'value' => null ),
      array( 'idnewsletter, ip, data, nome, email, aceito, ativo', 'safe', 'on' => 'search' ),
    );
  }

  public function relations() {
    return array();
  }

  public function pivotModels() {
    return array();
  }

  public function attributeLabels() {
    return array(
      'idnewsletter' => Yii::t( 'app', 'Idnewsletter' ),
      'ip' => Yii::t( 'app', 'Ip' ),
      'data' => Yii::t( 'app', 'Data' ),
      'nome' => Yii::t( 'app', 'Nome' ),
      'email' => Yii::t( 'app', 'Email' ),
      'aceito' => Yii::t( 'app', 'Aceitou receber' ),
      'ativo' => Yii::t( 'app', 'Ativo' ),
    );
  }

  public function search() {
    $criteria = new CDbCriteria;
    $criteria->compare( 'idnewsletter', $this->idnewsletter );
    $criteria->compare( 'ip', $this->ip, true );
    $criteria->compare( 'data', $this->data, true );
    $criteria->compare( 'nome', $this->nome, true );
    $criteria->compare( 'email', $this->email, true );
    $criteria->compare( 'aceito', $this->aceito, true );
    $criteria->compare( 'ativo', $this->ativo, true );
    return new CActiveDataProvider( $this, array(
      'criteria' => $criteria,
    ) );
  }
  public function afterSave(){
    $message = new YiiMailMessage;
    $message->view ='newsletter';
    $message->setBody(array('newsletter' => $this),'text/html','latin1');
    $message->subject = 'Newsletter'.' - '.date('d/m/Y H:i:s');
    $message->addTo(Yii::app()->params['email_contato']);
    $message->setReplyTo($this->email);
    $message->setFrom(array('noreply@popupdigital.com.br'=>Yii::app()->name));
    Yii::app()->mail->send($message);
  }
}