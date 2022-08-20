<?php

class CorretorController extends GxController {


    public function getRepresentingFields(){
        return Corretor::representingColumn();
    }

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Corretor'),
        ));
    }

    public function actionCreate() {
        $model = new Corretor;

        if (isset($_POST['Corretor'])) {
            $model->setAttributes($_POST['Corretor']);

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                Yii::app()->end();
                else
                $this->redirect($this->createUrlRel('view',array('id' => $model->idcorretor,'success'=>'create')));
            }
        }
        else{
            $model->setAttributes($this->rel_conditions);
        }

        $this->render('create', array( 'model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, 'Corretor');

        if (isset($_POST['Corretor'])) {
            $model->setAttributes($_POST['Corretor']);

            if ($model->save()) {
                $this->redirect($this->createUrlRel('view',array('id' => $model->idcorretor,'success'=>'update')));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        $model = $this->loadModel($id, 'Corretor');
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

    public function actionAtivar_cadastro($id){
        $model=$this->loadModel($id);
        $model->ativo= 1;
        $model->update(array('ativo'));
        $model->sendConfirmacao();
        Yii::app()->request->redirect(Yii::app()->user->returnUrl);
    }


    public function actionAtivar($id){
        $model=$this->loadModel($id);
        $model->ativo= 1;
        $model->update(array('ativo'));
        $model->sendConfirmacao();

        Yii::app()->request->redirect(Yii::app()->user->returnUrl);
    }


    public function actionDesativar($id){
        $model=$this->loadModel($id);
        $model->ativo= 0;
        $model->update(array('ativo'));
        Yii::app()->request->redirect(Yii::app()->user->returnUrl);
    }

    public function loadModel($id)
    {
        $model=Corretor::model()->findByPk($id);
        if($model===null)
        throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function actionIndex() {
        $criteria = new CDbCriteria;

        //Códgio de busca
        if(isset($_GET['q'])){
            $model = new Corretor();
            $atributos = $model->tableSchema->columns;

            foreach($atributos as $att){
                if(!$att->isPrimaryKey && !$att->isForeignKey)
                $criteria->addCondition('t.'.$att->name." like '%".$_GET['q']."%'", "OR");
            }
        }

        if(isset($_GET['o']) && isset($_GET['f']) ){
            $criteria->order = $_GET['f']." ".$_GET['o'];
        }
        else{
            $criteria->order = 't.idcorretor desc';
        }

        if(count($this->rel_conditions) > 0){
            foreach($this->rel_conditions as $field => $value){
                $criteria->addCondition($field." = '".$value."'");
            }
        }

        $dataProvider = new CActiveDataProvider('Corretor', array(
            'criteria'=>$criteria,
            'pagination' => array(
                'pageSize'=> Yii::app()->user->pageSize,
                'pageVar'=>'p',
            ),
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'model' => Corretor::model(),
        ));
    }

    public function afterAction($action){
        Yii::app()->user->returnUrl = Yii::app()->request->requestUri;
        return parent::afterAction($action);
    }

    public function beforeAction($action){
        /*
        if(is_numeric($_GET['idlinha'])){
        $linha = Linha::model()->findByPk($_GET['idlinha']);
        $this->rel_conditions['idlinha'] = $_GET['idlinha'];
        $this->rel_link['idlinha'] = $_GET['idlinha'];
        if(Yii::app()->user->obj->group->temPermissaoAction('linha','index')){
        $this->breadcrumbs[$linha->label(2)] = array('linha/index');
        $this->breadcrumbs[$linha->nome] = array('linha/view','id'=>$linha->idlinha);
    }
    else{
    $this->breadcrumbs[] = Linha::label(2);
    $this->breadcrumbs[] = $linha->nome;
}
}
*/

return parent::beforeAction($action);
}

}
