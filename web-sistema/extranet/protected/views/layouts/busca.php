<div class="col-md-12">
    <?php /* ?>
      <div class="float-left " style="margin-right:30px;">
          <form id="form_busca" name="form_busca" method="get" action="<?php echo Yii::app()->request->baseUrl; ?>/<?=$controller?><?=$action?('/'.$action):''?>"> 
          
            <div class="controls">
              <div class="input-append">
                <input size="16" type="text" name="q" value="<?=$_GET['q'];?>" class="span10">
                <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i> Busca</button>
              </div>
            </div>
        </form>
      </div>
      <?php */ ?>
<?
//if($_SESSION[usuario_logado]->perfil->temPermissao($modulo,'formulario') && is_array($template_botao_novo)){
	if($button != ""){
		?>
		<div class="float-right">
			<a href="<?php echo $this->createUrlRel('create');?>" class="btn btn-primary "><i class=" ion ion-md-add"></i>&nbsp;<?=Util::formataTexto($button)?></a>
		</div>
		<?
	}
//}
?>
</div>
<div class="clearfix"></div>
