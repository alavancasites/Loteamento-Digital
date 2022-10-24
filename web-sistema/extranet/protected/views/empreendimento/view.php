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
						<dt><?=Util::formataTexto($model->getAttributeLabel('nome'));?></dt>
						<dd><?=Util::formataTexto($model->nome)?></dd>
					</dl>
				</div>

				<div class="formSep">
					<dl class="dl-horizontal">
						<dt>
							<?=Util::formataTexto($model->getAttributeLabel('latitude'));?>
						</dt>
						<dd>
							<?=Util::formataTexto($model->latitude)?>
						</dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt>
							<?=Util::formataTexto($model->getAttributeLabel('longitude'));?>
						</dt>
						<dd>
							<?=Util::formataTexto($model->longitude)?>
						</dd>
					</dl>
				</div>
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt>Confira a localização</dt>
						<dd>
							<div id="addr" style="width: 543px; height: 400px;"></div>
						</dd>
					</dl>
				</div>
				
				<div class="formSep">
					<dl class="dl-horizontal">
						<dt><?=Util::formataTexto($model->getAttributeLabel('ativo'));?></dt>
						<dd><?=Util::formataTexto($model->ativo ? 'Sim' : 'Não')?></dd>
					</dl>
				</div>






				<?
				if(Yii::app()->user->obj->group->temPermissaoAction('imovel','index')){
					?>
					<div class="formSep">
						<dl class="dl-horizontal">
							<dt><?php echo GxHtml::encode($model->getRelationLabel('imovels')); ?></dt>
							<dd>
								<?php
								if(count($model->imovels) > 0){
									echo GxHtml::openTag('ul');
									foreach($model->imovels as $relatedModel) {
										echo GxHtml::openTag('li');
										echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('imovel/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
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
								<a class="btn btn-outline-primary" href="<?php echo $this->createUrlRel('update',array('id'=>$model->idempreendimento));?>"><i class="ion ion-md-create "></i> Editar</a>
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
								<a class="btn btn-outline-danger btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idempreendimento));?>" style="margin-left:30px;"><i class=" ion ion-md-trash"></i> Excluir</a>
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
<?php
Yii::app()->clientScript->registerScriptFile('https://maps.googleapis.com/maps/api/js?key=AIzaSyCkhJjMWNMgZeEgPRvAZbj-sYDR7KYBZuU&sensor=false&libraries=places',2);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl .'/js/locationpicker.jquery.js',2);
?>
<script type="text/javascript">
$(document).ready( function(){
  $('#addr').locationpicker({
      location: {
          latitude: <?=$model->latitude?>,
          longitude: <?=$model->longitude?>,
      },
	  zoom:17,
      radius: 0,
      inputBinding: {
          latitudeInput: $('#addr-lat'),
          longitudeInput: $('#addr-lon'),
          locationNameInput: $('#addr-address')
      },
      enableAutocomplete: true
  });
});

</script>
