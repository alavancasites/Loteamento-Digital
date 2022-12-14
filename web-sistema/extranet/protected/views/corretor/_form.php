<div class="form">

	<?php $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'corretor-form',
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
          <dt><?php echo $form->labelEx($model,'nome',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'nome', array('maxlength' => 100,'class' => 'form-control')); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->

    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'email',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'email', array('maxlength' => 100,'class' => 'form-control')); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->

    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'cpf_cnpj',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'cpf_cnpj', array('maxlength' => 100,'class' => 'form-control')); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->

    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'registro',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'registro', array('maxlength' => 100,'class' => 'form-control')); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->

    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'telefone',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'telefone', array('maxlength' => 100,'class' => 'form-control')); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->

	<div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'senha',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->passwordField($model, 'senha', array('value' => '','class' => 'form-control')); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->

    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'senha_confirma',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->passwordField($model, 'senha_confirma', array('value' => '','class' => 'form-control')); ?>

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
                <a class="btn btn-outline-danger btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idcorretor));?>" style="margin-left:30px;"><i class=" ion ion-md-trash"></i> Excluir</a>
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
