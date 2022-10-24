<?php
if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'index')){
	$this->breadcrumbs[$model->label(2)] = array('index');
}
else{
	$this->breadcrumbs[] = $model->label(2);
}
if($this->hasRel()){
	$this->breadcrumbs[$model->label(2)] = array('rel'=>$this->getRel());
}
$this->breadcrumbs[] = Yii::t('app','Cadastrar');
?>

<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-header">
            <h4>Cadastrar</h4>
          </div>
          <div class="card-body">
			<?php
            $this->renderPartial('_form', array('model' => $model,'buttonLabel' => Yii::t('app','Cadastrar')));
            ?>
		 </div>
      </div>
  </div>
</div>