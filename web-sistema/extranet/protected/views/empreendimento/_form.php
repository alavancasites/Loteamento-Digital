<div class="form">

	<?php $form = $this->beginWidget('GxActiveForm', array(
		'id' => 'empreendimento-form',
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
			<dt>
				<label>Selecione o local da quadra</label>
			</dt>
			<dd>
				<label>Informe o endere&ccedil;o da quadra para localizar no mapa: <br>
					<em>Ex.: Bairro, Cidade - UF, CEP, Pa&iacute;s</em></label>
					<br>
					<input type="text" id="addr-address" class="form-control" placeholder="Bairro, Cidade - UF, CEP, Pa&iacute;s" value=""/>
					<div id="addr" style="width: 543px; height: 400px;"></div>
				</dd>
			</dl>
		</div>
		<!-- row -->

		<div class="formSep">
			<dl class="dl-horizontal">
				<dt><?php echo $form->labelEx($model,'latitude',array('class'=>'control-label')); ?> </dt>
				<dd> <?php echo $form->textField($model, 'latitude', array('maxlength' => 50,'class' => 'form-control', 'id'=>'addr-lat')); ?> </dd>
				<dd>Coordenadas: <a href="http://www.mapcoordinates.net/pt" target="_blank">Acessar</a></dd>
			</dl>
		</div>
		<!-- row -->

		<div class="formSep">
			<dl class="dl-horizontal">
				<dt><?php echo $form->labelEx($model,'longitude',array('class'=>'control-label')); ?> </dt>
				<dd> <?php echo $form->textField($model, 'longitude', array('maxlength' => 50,'class' => 'form-control', 'id'=>'addr-lon')); ?> </dd>
				<dd>Coordenadas: <a href="http://www.mapcoordinates.net/pt" target="_blank">Acessar</a></dd>
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
						<a class="btn btn-outline-danger btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idempreendimento));?>" style="margin-left:30px;"><i class=" ion ion-md-trash"></i> Excluir</a>
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

	<div class="modal" id="bairroModal" style="display:none;">

		<div class="modal-dialog modal-md" role="document"  id="vt-mostra">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="cor-verde titulo-h2 fonte-open-sans-bold float-left"><span>Cadastrar bairro</span></h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="clear"></div>
				</div>

				<form action="<?=Yii::app()->baseUrl?>/site/createBairro" method="post" class="form-bairro-ajax">
					<div class="modal-body">
						<div class="modal-retorno">

						</div>
						<div class="formSep">
								<label class="control-label" for="Bairro_idestado">Estado</label>
									<select class="form-control select-estado" name="Bairro[idestado]" id="Bairro_idestado">
										<option value="">Selecione...</option>
										<option value="1">Goiás</option>
										<option value="2">Minas Gerais</option>
										<option value="3">Pará</option>
										<option value="4">Ceará</option>
										<option value="5">Bahia</option>
										<option value="6">Paraná</option>
										<option value="7">Santa Catarina</option>
										<option value="8">Pernambuco</option>
										<option value="9">Tocantins</option>
										<option value="10">Maranhão</option>
										<option value="11">Rio Grande do Norte</option>
										<option value="12">Piauí</option>
										<option value="13">Rio Grande do Sul</option>
										<option value="14">Mato Grosso</option>
										<option value="15">Acre</option>
										<option value="16">São Paulo</option>
										<option value="17">Espírito Santo</option>
										<option value="18">Alagoas</option>
										<option value="19">Paraíba</option>
										<option value="20">Mato Grosso do Sul</option>
										<option value="21">Rondônia</option>
										<option value="22">Roraima</option>
										<option value="23">Amazonas</option>
										<option value="24">Amapá</option>
										<option value="25">Sergipe</option>
										<option value="26">Rio de Janeiro</option>
										<option value="27">Distrito Federal</option>
									</select>

						</div>
						<div class="formSep">
							<label class="control-label" for="Bairro_idcidade">Cidade</label>

									<select class="form-control select-cidade" name="Bairro[idcidade]" id="Bairro_idcidade">
										<option value="">Cidade...</option>
									</select>

						</div>
						<div class="formSep">
							<label class="control-label" for="Bairro_nome">Nome do bairro</label>

									<input type="text" class="form-control " name="Bairro[nome]" id="Bairro_nome">

						</div>

					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					<button type="submit" class="btn btn-success" >Salvar</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div>


</div>

<?php
$cid = time();
Yii::app()->clientScript->registerScriptFile('https://maps.googleapis.com/maps/api/js?key=AIzaSyCkhJjMWNMgZeEgPRvAZbj-sYDR7KYBZuU&sensor=false&libraries=places',2);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl .'/js/locationpicker.jquery.js?cid='.$cid,2);
?>
<script type="text/javascript">
$(document).ready( function(){
	$('#addr').locationpicker({
		location: {
			latitude: <?=trim($model->latitude)!=''?$model->latitude:'-27.090094054129423'?>,
			longitude: <?=trim($model->longitude)!=''?$model->longitude:'-52.71423981401671'?>,
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
