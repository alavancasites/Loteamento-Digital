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
$this->breadcrumbs[] = Yii::t('app','Visualizar');
?><div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4>Visualizar</h4>
			</div>
			<div class="card-body">

				<?
				$this->renderPartial("//layouts/sucesso",array(
					'success' => $_GET['success'],
				));
				?>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('data'));?></dt>
						<dd><?=Util::formataTexto($model->data)?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('idarquivo_categoria'));?></dt>
						<dd><?=($model->categoria !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->categoria)), array('categoria/view', 'id' => GxActiveRecord::extractPkValue($model->categoria, true)),array('class' => 'relational-link')) : null)?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('titulo'));?></dt>
						<dd><?=Util::formataTexto($model->titulo)?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('arquivo'));?></dt>
						<dd><a style="margin-top:10px;" target="_blank" class="btn-link" href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/Arquivo/<?=$model->arquivo;?>" ><?=$model->arquivo;?></a></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('ativo'));?></dt>
						<dd><?=Util::formataTexto($model->ativo ? 'Sim' : 'Não')?></dd>
					</dl>
				</div>



				<div class="formSep">
					<dl class="dl-horizontal">
						<dt>&nbsp;</dt>
						<dd>
							<?
							if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'update')){
								?>
								<a class="btn btn-outline-primary" href="<?php echo $this->createUrlRel('update',array('id'=>$model->idarquivo));?>"><i class="ion ion-md-create "></i> Editar</a>
								<?
							}
							?>
							<?
							if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'index')){
								?>
								<a class="btn btn-outline-primary" href="<?php echo $this->createUrlRel('index');?>"><i class="icon-chevron-left"></i> Voltar</a>
								<?
							}
							?>
							<?
							if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'delete')){
								?>
								<a class="btn btn-outline-danger btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idarquivo));?>" style="margin-left:30px;"><i class=" ion ion-md-trash"></i> Excluir</a>
								<?
							}
							?>
						</dd>
					</dl>
				</div>

			</div>
		</div>
	</div>
</div>
