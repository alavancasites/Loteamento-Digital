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
?><div class="row-fluid">
	<div class="span12">
		<div class="w-box">
			<div class="w-box-header">
				<h4>Visualizar</h4>
			</div>
			<div class="w-box-content">

				<?
				$this->renderPartial("//layouts/sucesso",array(
					'success' => $_GET['success'],
				));
				?>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('nome'));?></dt>
						<dd><?=Util::formataTexto($model->nome)?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('email'));?></dt>
						<dd><?=Util::formataTexto($model->email)?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('cpf_cnpj'));?></dt>
						<dd><?=Util::formataTexto($model->cpf_cnpj)?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('registro'));?></dt>
						<dd><?=Util::formataTexto($model->registro)?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('telefone'));?></dt>
						<dd><?=Util::formataTexto($model->telefone)?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('senha'));?></dt>
						<dd><em>Senha criptografada</em></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('ativo'));?></dt>
						<dd><?=Util::formataTexto($model->ativo ? 'Sim' : 'Não')?></dd>
					</dl>
				</div>
				
				<?php
				if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'ativar_cadastro') && $model->ativo!=1){
					?>
					<div class="formSep">
						<dl class="dl-horizontal">
							<dt></dt>
							<dd>
								Esse cadastro não foi ativado! Deseja ativá-lo?<br>
								<a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/ativar_cadastro', array('id'=>$model->idcorretor));?>" class="btn btn-small" rel="tooltip" data-original-title="Esse cadastro não foi ativado! Deseja ativá-lo?"><span class="icon-lock"></span> Ativar</a>
							</dd>
						</dl>
					</div>
					<?
				}
				?>



				<?
				if(Yii::app()->user->obj->group->temPermissaoAction('historicoreserva','index')){
					?>
					<div class="formSep">
						<dl class="dl-horizontal">
							<dt><?php echo GxHtml::encode($model->getRelationLabel('historicoReservas')); ?></dt>
							<dd>
								<?php
								if(count($model->historicoReservas) > 0){
									echo GxHtml::openTag('ul');
									foreach($model->historicoReservas as $relatedModel) {
										echo GxHtml::openTag('li');
										echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('historicoReserva/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
										echo GxHtml::closeTag('li');
									}
									echo GxHtml::closeTag('ul');
								}
								else{
									echo '<i>Nenhum registro encontrado</i>';
								}
								?>
							</dd>
						</dl>
					</div>
					<?
				}
				?>


				<div class="formSep">
					<dl class="dl-horizontal">
						<dt>&nbsp;</dt>
						<dd>
							<?
							if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'update')){
								?>
								<a class="btn" href="<?php echo $this->createUrlRel('update',array('id'=>$model->idcorretor));?>"><i class="icon-edit "></i> Editar</a>
								<?
							}
							?>
							<?
							if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'index')){
								?>
								<a class="btn" href="<?php echo $this->createUrlRel('index');?>"><i class="icon-chevron-left"></i> Voltar</a>
								<?
							}
							?>
							<?
							if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'delete')){
								?>
								<a class="btn btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idcorretor));?>" style="margin-left:30px;"><i class="icon-trash"></i> Excluir</a>
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
