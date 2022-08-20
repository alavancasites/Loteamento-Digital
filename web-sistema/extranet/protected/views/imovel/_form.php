<div class="form">

	<?php $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'imovel-form',
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
          <dt><?php echo $form->labelEx($model,'idempreendimento',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->dropDownList($model, 'idempreendimento', GxHtml::listDataEx(Empreendimento::model()->findAllAttributes(null, true)), array('class' => 'input-xxlarge','empty'=>'Selecione...')); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->

    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'nome',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'nome', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->



    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'cadastro_imobiliario',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'cadastro_imobiliario', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->

    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'matricula_imobiliaria',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'matricula_imobiliaria', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->

    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'metragem',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'metragem', array('class' => 'input-xxlarge')); ?>

      	</dd>
       </dl>
    </div>

    <!-- row -->
	<div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'metragem_frente',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'metragem_frente', array('class' => 'input-xxlarge')); ?>

      	</dd>
       </dl>
    </div>

    <!-- row -->
	<div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'metragem_fundo',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'metragem_fundo', array('class' => 'input-xxlarge')); ?>

      	</dd>
       </dl>
    </div>
	<div class="formSep">
		<dl class="dl-horizontal">
		  <dt><?php echo $form->labelEx($model,'metragem_esquerda',array('class'=>'control-label')); ?>
	</dt>
		  <dd>
			<?php echo $form->textField($model, 'metragem_esquerda', array('class' => 'input-xxlarge')); ?>

		</dd>
	   </dl>
	</div>

	<!-- row --><div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'metragem_direita',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'metragem_direita', array('class' => 'input-xxlarge')); ?>

      	</dd>
       </dl>
    </div>

    <!-- row -->
    <!-- row -->

    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'valor',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'valor', array('class' => 'input-xxlarge moeda')); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->

	<div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'destaque',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->checkBox($model, 'destaque'); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->

	<div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'descricao',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php $this->widget('ext.imperavi-redactor-widget.ImperaviRedactorWidget',array(
			'model'=>$model,
			'attribute'=>'descricao',
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

          <button type="submit" class="btn">
            <?
            if($this->action->id == 'create'){
                ?>
                <i class="icon-plus"></i>&nbsp;Cadastrar
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
                <a class="btn" href="<?php echo $this->createUrlRel('index');?>"><i class="icon-chevron-left"></i> Voltar</a>
                <?
            }
            ?>
            <?
            if($this->action->id == 'update' && Yii::app()->user->obj->group->temPermissaoAction($this->id,'delete')){
                ?>
                <a class="btn btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idimovel));?>" style="margin-left:30px;"><i class="icon-trash"></i> Excluir</a>
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
