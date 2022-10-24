<div class="form">

	<?php $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'arquivo-form',
        'enableAjaxValidation' => false,
        'htmlOptions'=> array (
            'class' => 'form-horizontal',
            'enctype' => 'multipart/form-data',
			'action' => $this->createUrlRel($this->action->id),
        )
    ));
    ?>

	<?
    $this->renderPartial("//layouts/erros",array(
        'model' => $model,
    ));
    ?>


    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'data',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php $this->widget('CJuiDateTimePicker',array(
					'model'=>$model, //Model object
					'attribute'=>'data', //attribute name
					'language' => 'pt',
					'mode'=>'datetime', //use 'time','date' or 'datetime' (default)
					'options'=>array(
						'readonly' => 'readonly',
						'changeYear' => true,
						'changeMonth' => true,
					)
				)
			); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->

	<div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'idarquivo_categoria',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->dropDownList($model, 'idarquivo_categoria', GxHtml::listDataEx(ArquivoCategoria::model()->findAllAttributes(null, true)), array('class' => 'form-control','empty'=>'Selecione...')); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->

    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'titulo',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'titulo', array('maxlength' => 100,'class' => 'form-control')); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->

    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'arquivo',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php $this->widget('application.extensions.Plupload.PluploadWidget', array(
			'model' => $model,
			'attribute' => 'arquivo',
		  )); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->

	<div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'ativo',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->checkBox($model, 'ativo'); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->



   <div class="formSep">
      <dl class="dl-horizontal">
          <dt>&nbsp;</dt>
          <dd>

          <button type="submit" class="btn btn-outline-primary">
            <?
            if($this->action->id == 'create'){
                ?>
                <i class=" ion ion-md-add"></i>&nbsp;Cadastrar
                <?
            }
            else{
                ?>
                <i class="icon-pencil"></i>&nbsp;Atualizar
                <?
            }
            ?>
          </button>
			<?
            if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'index')){
                ?>
                <a class="btn btn-outline-primary" href="<?php echo $this->createUrlRel('index');?>"><i class="icon-chevron-left"></i> Voltar</a>
                <?
            }
            ?>
            <?
            if($this->action->id == 'update' && Yii::app()->user->obj->group->temPermissaoAction($this->id,'delete')){
                ?>
                <a class="btn btn-outline-danger btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idarquivo));?>" style="margin-left:30px;"><i class=" ion ion-md-trash"></i> Excluir</a>
                <?
            }
            ?>
        </dd>
       </dl>
   </div>


    <?
	$this->endWidget();
	?>

</div>
<!-- form -->
