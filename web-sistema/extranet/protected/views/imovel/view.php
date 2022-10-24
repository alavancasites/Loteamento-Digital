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
						<dt><?=Util::formataTexto($model->getAttributeLabel('idempreendimento'));?></dt>
						<dd><?=($model->empreendimento !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->empreendimento)), array('empreendimento/view', 'id' => GxActiveRecord::extractPkValue($model->empreendimento, true)),array('class' => 'relational-link')) : null)?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('nome'));?></dt>
						<dd><?=Util::formataTexto($model->nome)?></dd>
					</dl>
				</div>

				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('cadastro_imobiliario'));?></dt>
						<dd><?=Util::formataTexto($model->cadastro_imobiliario)?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('matricula_imobiliaria'));?></dt>
						<dd><?=Util::formataTexto($model->matricula_imobiliaria)?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('metragem'));?></dt>
						<dd><?=Util::formataTexto($model->metragem)?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('metragem_fundo'));?></dt>
						<dd><?=Util::formataTexto($model->metragem_fundo)?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('metragem_frente'));?></dt>
						<dd><?=Util::formataTexto($model->metragem_frente)?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('metragem_esquerda'));?></dt>
						<dd><?=Util::formataTexto($model->metragem_esquerda)?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('metragem_direita'));?></dt>
						<dd><?=Util::formataTexto($model->metragem_direita)?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('valor'));?></dt>
						<dd><?=Util::formataTexto($model->valor)?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('destaque'));?></dt>
						<dd><?=Util::formataTexto($model->destaque ? 'Sim' : 'Não')?></dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('descricao'));?></dt>
						<dd><?=$model->descricao?></dd>
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
						<dt><?=Util::formataTexto('Reservas');?></dt>
						<dd>
							<?
							if($model->imovelReserva !== null ){
								?>
								<table class="text-left">
									<tr>
										<td><strong>Status</strong></td>
										<td><?=Util::formataTexto($model->getStatus())?></td>
									</tr>
									<?php
									if(!$model->status != 'vendido'){
										?>
										<tr>
											<td><strong>Expira em</strong></td>
											<td><?=Util::formataTexto($model->limite)?></td>
										</tr>
										<?php
									}
									?>
									<tr>
										<td><strong>Corretor</strong></td>
										<td><?=Util::formataTexto($model->imovelReserva->corretor)?></td>
									</tr>
									<tr>
										<td><strong>Cliente</strong></td>
										<td><?=Util::formataTexto($model->imovelReserva->nome)?></td>
									</tr>
									<tr>
										<td><strong>CPF</strong></td>
										<td><?=Util::formataTexto($model->imovelReserva->cpf_cnpj)?></td>
									</tr>
								</table>
								<?php
							}

							if($model->imovelReservaSeg !== null ){
								?>
								<hr>
								<table class="text-left">
									<tr>
										<td><strong>Status</strong></td>
										<td><?=Util::formataTexto($model->imovelReservaSeg->getStatus())?></td>
									</tr>
									<?php
									if(!$model->status != 'vendido'){
										?>
										<tr>
											<td><strong>Valida a partir de</strong></td>
											<td><?=Util::formataTexto($model->limite)?></td>
										</tr>
										<?php
									}
									?>
									<tr>
										<td><strong>Corretor</strong></td>
										<td><?=Util::formataTexto($model->imovelReservaSeg->corretor)?></td>
									</tr>
									<tr>
										<td><strong>Cliente</strong></td>
										<td><?=Util::formataTexto($model->imovelReservaSeg->nome)?></td>
									</tr>
									<tr>
										<td><strong>CPF</strong></td>
										<td><?=Util::formataTexto($model->imovelReservaSeg->cpf_cnpj)?></td>
									</tr>
								</table>
								<?php
							}
							?>
						</dd>
					</dl>
				</div>

				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('status'));?></dt>
						<dd><?=Util::formataTexto($model->getStatus())?></dd>
					</dl>
				</div>
				<?php
				if(($model->status!='vendido'&&$model->status!='disponivel'&&$model->status!='indisponivel')&&(strtotime(date('Y-m-d H:i:s'))<=strtotime(Util::formataDataHoraBanco($model->limite) ) )){
					?>
					<div class="formSep">
						<dl class="dl-horizontal">
							<dt><?=Util::formataTexto($model->getStatus().' até');?></dt>
							<dd><?=Util::formataTexto($model->limite)?></dd>
						</dl>
					</div>
					<?php
				}

				?>



				<?
				//if(Yii::app()->user->obj->group->temPermissaoAction('historicoreserva','index')){
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
									echo 'Alterado de '.$relatedModel->status_antigo.' para '.$relatedModel->status_novo.' em '.$relatedModel->data.' por '.($relatedModel->corretor?$relatedModel->corretor:'Sistema');
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
				//}
				?>




				<?
				if(Yii::app()->user->obj->group->temPermissaoAction('imovelfavorito','index')){
					?>
					<div class="formSep">
						<dl class="dl-horizontal">
							<dt><?php echo GxHtml::encode($model->getRelationLabel('imovelFavoritos')); ?></dt>
							<dd>
								<?php
								if(count($model->imovelFavoritos) > 0){
									echo GxHtml::openTag('ul');
									foreach($model->imovelFavoritos as $relatedModel) {
										echo GxHtml::openTag('li');
										echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('imovelFavorito/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
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

				<?
				if(Yii::app()->user->obj->group->temPermissaoAction('imovelreserva','index')){
					?>
					<div class="formSep">
						<dl class="dl-horizontal">
							<dt><?php echo GxHtml::encode($model->getRelationLabel('imovelReservas')); ?></dt>
							<dd>
								<?php
								if(count($model->imovelReservas) > 0){
									echo GxHtml::openTag('ul');
									foreach($model->imovelReservas as $relatedModel) {
										echo GxHtml::openTag('li');
										echo GxHtml::link(utf8_decode(GxHtml::valueEx($relatedModel)), array('cliente/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
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
								<a class="btn btn-outline-primary" href="<?php echo $this->createUrlRel('update',array('id'=>$model->idimovel));?>"><i class="ion ion-md-create "></i> Editar</a>
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
								<a class="btn btn-outline-danger btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idimovel));?>" style="margin-left:30px;"><i class=" ion ion-md-trash"></i> Excluir</a>
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
