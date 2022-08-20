<?php

class ImovelController extends GxController {


    public function getRepresentingFields(){
        if($this->action->id=='negociacao'||$this->action->id=='reservas'){
            return array('empreendimento','nome', 'status', 'limite', 'corretor');
        }
        return array('empreendimento','nome', 'status');
    }

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Imovel'),
        ));
    }

    public function actionCreate() {
        $model = new Imovel;

        if (isset($_POST['Imovel'])) {
            $model->setAttributes($_POST['Imovel']);

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                Yii::app()->end();
                else
                $this->redirect($this->createUrlRel('view',array('id' => $model->idimovel,'success'=>'create')));
            }
        }
        else{
            $model->setAttributes($this->rel_conditions);
        }

        $this->render('create', array( 'model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, 'Imovel');

        if (isset($_POST['Imovel'])) {
            $model->setAttributes($_POST['Imovel']);

            if ($model->save()) {
                $this->redirect($this->createUrlRel('view',array('id' => $model->idimovel,'success'=>'update')));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        $model = $this->loadModel($id, 'Imovel');
        if($_GET['confirm'] == 1){
            $model->delete();
            if($_GET['ajax'] == 1){
                echo CJSON::encode(array('sucesso' => '1'));
                Yii::app()->end();
            }
            else
            $this->redirect($this->createUrlRel('index'));
        }
        else{
            $this->renderPartial("//site/delete_console", array(
                'model' => $model,
            ));
        }
    }
    public function actionAtivar($id){
        $model=$this->loadModel($id);
        $model->ativo= 1;
        $model->updateByPk($id, array('ativo'=>1));
        Yii::app()->request->redirect(Yii::app()->user->returnUrl);
    }

    public function actionDesativar($id){
        $model=$this->loadModel($id);
        $model->ativo= 0;
        $model->updateByPk($id, array('ativo'=>0));
        Yii::app()->request->redirect(Yii::app()->user->returnUrl);
    }

    public function loadModel($id)
    {
        $model=Imovel::model()->findByPk($id);
        if($model===null)
        throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function actionIndex() {
        $criteria = new CDbCriteria;

        $model = new Imovel();
        //Códgio de busca
        if(isset($_GET['q'])){
            $atributos = $model->tableSchema->columns;

            foreach($atributos as $att){
                if(!$att->isPrimaryKey && !$att->isForeignKey)
                $criteria->addCondition('t.'.$att->name." like '%".$_GET['q']."%'", "OR");
            }
        }

        if(isset($_GET['o']) && isset($_GET['f']) ){
            $relations = $model->relations();
			$relations_array = array_keys($relations);
			if(in_array($_GET['f'],$relations_array)){
				$criteria->with[] = $_GET['f'];
				$criteria->together = true;
				$model_class = $relations[$_GET['f']][1];
				$obj_class = new $model_class();
				$representing_column = $obj_class->representingColumn();
				if(is_array($representing_column)){
					$representing_column = $representing_column[0];
				}
				$criteria->order = $_GET['f'].".".$representing_column." ".$_GET['o'];
			}
			else{
				$criteria->order = 't.'.$_GET['f']." ".$_GET['o'];
			}
        }
        else{
            $criteria->order = 't.idimovel desc';
        }

        if(count($this->rel_conditions) > 0){
            foreach($this->rel_conditions as $field => $value){
                $criteria->addCondition($field." = '".$value."'");
            }
        }

        $dataProvider = new CActiveDataProvider('Imovel', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize'=> Yii::app()->user->pageSize,
                'pageVar'=>'p',
            ),
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'model' => Imovel::model(),
        ));
    }

    public function actionNegociacao() {

        $model = new Imovel();


        $criteria = new CDbCriteria;
        $criteria->addCondition("t.status <> 'disponivel'");
        $criteria->with = array('imovelReserva');
        $criteria->together = true;
        //Códgio de busca
        if(isset($_GET['q'])){
            $model = new Imovel();
            $atributos = $model->tableSchema->columns;

            foreach($atributos as $att){
                if(!$att->isPrimaryKey && !$att->isForeignKey)
                $criteria->addCondition('t.'.$att->name." like '%".$_GET['q']."%'", "OR");
            }
        }

        if(isset($_GET['o']) && isset($_GET['f']) ){
            $relations = $model->relations();
			$relations_array = array_keys($relations);
			if(in_array($_GET['f'],$relations_array)){
				$criteria->with[] = $_GET['f'];
				$criteria->together = true;
				$model_class = $relations[$_GET['f']][1];
				$obj_class = new $model_class();
				$representing_column = $obj_class->representingColumn();
				if(is_array($representing_column)){
					$representing_column = $representing_column[0];
				}
				$criteria->order = $_GET['f'].".".$representing_column." ".$_GET['o'];
			}
			else{
				$criteria->order = 't.'.$_GET['f']." ".$_GET['o'];
			}

        }
        else{
            $criteria->order = 't.idimovel desc';
        }

        if(count($this->rel_conditions) > 0){
            foreach($this->rel_conditions as $field => $value){
                $criteria->addCondition($field." = '".$value."'");
            }
        }

        $dataProvider = new CActiveDataProvider('Imovel', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize'=> Yii::app()->user->pageSize,
                'pageVar'=>'p',
            ),
        ));

        $this->render('negociacao', array(
            'dataProvider' => $dataProvider,
            'model' => Imovel::model(),
        ));
    }

    public function actionReservas() {

        $model = new Imovel();


        $criteria = new CDbCriteria;
        $criteria->addCondition("t.status <> 'disponivel'");
        $criteria->addCondition("t.idimovel_reserva_seg IS NOT NULL");
        $criteria->with = array('imovelReservaSeg');
        $criteria->together = true;
        //Códgio de busca
        if(isset($_GET['q'])){
            $model = new Imovel();
            $atributos = $model->tableSchema->columns;

            foreach($atributos as $att){
                if(!$att->isPrimaryKey && !$att->isForeignKey)
                $criteria->addCondition('t.'.$att->name." like '%".$_GET['q']."%'", "OR");
            }
        }

        if(isset($_GET['o']) && isset($_GET['f']) ){
            $relations = $model->relations();
			$relations_array = array_keys($relations);
			if(in_array($_GET['f'],$relations_array)){
				$criteria->with[] = $_GET['f'];
				$criteria->together = true;
				$model_class = $relations[$_GET['f']][1];
				$obj_class = new $model_class();
				$representing_column = $obj_class->representingColumn();
				if(is_array($representing_column)){
					$representing_column = $representing_column[0];
				}
				$criteria->order = $_GET['f'].".".$representing_column." ".$_GET['o'];
			}
			else{
				$criteria->order = 't.'.$_GET['f']." ".$_GET['o'];
			}

        }
        else{
            $criteria->order = 't.idimovel desc';
        }

        if(count($this->rel_conditions) > 0){
            foreach($this->rel_conditions as $field => $value){
                $criteria->addCondition($field." = '".$value."'");
            }
        }

        $dataProvider = new CActiveDataProvider('Imovel', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize'=> Yii::app()->user->pageSize,
                'pageVar'=>'p',
            ),
        ));

        $this->render('reservas', array(
            'dataProvider' => $dataProvider,
            'model' => Imovel::model(),
        ));
    }

    public function actionVendido($id) {
        $model = $this->loadModel($id, 'Imovel');
        HistoricoReserva::model()->adicionar(array(
            'idimovel'=>$model->idimovel,
            'status_antigo'=>$model->getStatus(),
            'status_novo'=>'Vendido',
            'idimovel_reserva'=>$model->idimovel_reserva,
            'notificacao'=>'vendido',
        ));
        Imovel::model()->updateByPk($model->idimovel, array('status'=>'vendido'));
        $this->redirect($this->createUrlRel('view',array('id' => $model->idimovel,'success'=>'update')));
    }
    public function actionContrato($id) {

        $model = $this->loadModel($id, 'Imovel');
        HistoricoReserva::model()->adicionar(array(
            'idimovel'=>$model->idimovel,
            'status_antigo'=>$model->getStatus(),
            'status_novo'=>'Em contrato',
            'idimovel_reserva'=>$model->idimovel_reserva,
            'notificacao'=>'contrato',
        ));
        $data = date('Y-m-d H:i:s', strtotime(Yii::app()->sistema_duracao_contrato));
        Imovel::model()->updateByPk($model->idimovel, array('status'=>'contrato', 'limite'=>$data));
        ImovelReserva::model()->updateByPk($model->idimovel_reserva, array('status'=>'contrato'));
        $this->redirect($this->createUrlRel('view',array('id' => $model->idimovel,'success'=>'update')));
    }



    public function actionCancelarSegundaReserva($id) {
        $imovel = $this->loadModel($id, 'Imovel');
        if($imovel->imovelReservaSeg){
            ImovelReserva::model()->updateByPk($imovel->idimovel_reserva_seg, array('status'=>'cancelada'));

            Imovel::model()->updateByPk($imovel->idimovel, array('idimovel_reserva_seg'=>NULL));
            HistoricoReserva::model()->adicionar(array(
                'idimovel'=>$imovel->idimovel,
                'status_antigo'=>'Segunda reserva cancelada',
                'status_novo'=>'',
                'idimovel_reserva'=>$imovel->idimovel_reserva_seg,
                'notificacao'=>'cancelada',
            ));
        }
        $this->redirect($this->createUrlRel('view',array('id' => $imovel->idimovel,'success'=>'update')));
    }

    public function actionCancelarReserva($id) {
        $imovel = $this->loadModel($id, 'Imovel');
        if($imovel->imovelReservaSeg){
            ImovelReserva::model()->updateByPk($imovel->idimovel_reserva, array('status'=>'cancelada'));
            $data = date('Y-m-d H:i:s', strtotime(Yii::app()->sistema_duracao_reserva));
            Imovel::model()->updateByPk($imovel->idimovel, array('status'=>'reservado', 'limite'=>$data, 'idimovel_reserva'=>$imovel->idimovel_reserva_seg, 'idimovel_reserva_seg'=>NULL));
            HistoricoReserva::model()->adicionar(array(
                'idimovel'=>$imovel->idimovel,
                'status_antigo'=>'Reserva cancelada',
                'status_novo'=>'transferido para segunda reserva.',
                'idimovel_reserva'=>$imovel->idimovel_reserva_seg,
                'notificacao'=>'cancelada_transferida',
            ));
        }else{
            Imovel::model()->updateByPk($imovel->idimovel, array('status'=>'disponivel', 'limite'=>date('Y-m-d H:i:s'), 'idimovel_reserva'=>NULL));
            ImovelReserva::model()->updateByPk($imovel->idimovel_reserva, array('status'=>'cancelada'));
            HistoricoReserva::model()->adicionar(array(
                'idimovel'=>$imovel->idimovel,
                'status_antigo'=>'Reserva cancelada',
                'status_novo'=>'Disponivel',
                'idimovel_reserva'=>$imovel->idimovel_reserva,
                'notificacao'=>'cancelada',
            ));
        }
        $this->redirect($this->createUrlRel('view',array('id' => $imovel->idimovel,'success'=>'update')));
    }

    public function afterAction($action){
        Yii::app()->user->returnUrl = Yii::app()->request->requestUri;
        return parent::afterAction($action);
    }

    public function beforeAction($action){

        if(is_numeric($_GET['idempreendimento'])){
            $empreendimento = Empreendimento::model()->findByPk($_GET['idempreendimento']);
            $this->rel_conditions['idempreendimento'] = $_GET['idempreendimento'];
            $this->rel_link['idempreendimento'] = $_GET['idempreendimento'];
            if(Yii::app()->user->obj->group->temPermissaoAction('empreendimento','index')){
                $this->breadcrumbs[$empreendimento->label(2)] = array('empreendimento/index');
                $this->breadcrumbs[$empreendimento->nome] = array('empreendimento/view','id'=>$empreendimento->idempreendimento);
            }
            else{
                $this->breadcrumbs[] = Empreendimento::label(2);
                $this->breadcrumbs[] = $empreendimento->nome;
            }
        }


        return parent::beforeAction($action);
    }

}
