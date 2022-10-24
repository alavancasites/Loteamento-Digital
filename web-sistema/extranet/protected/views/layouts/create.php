<?php
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

