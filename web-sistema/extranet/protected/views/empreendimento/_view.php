<tr>
  <?
  foreach($this->getRepresentingFields() as $field){
  	?>	<td><?= Util::formataTexto($data->$field);?></td>
	<?
  }
  ?>
  <td><a class="btn " href="<?php echo $this->createUrlRel('imovel/index',array('idempreendimento'=>$data->idempreendimento));?>" title="Imoveis"> <i class="icon-home"></i> Lotes</a></td>
  <td style=" width: 200px;text-align:right;">
    <?
	if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'view')){
        ?>     	<a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/desativar', array('id'=>$data->idempreendimento));?>" <?=($data->ativo !=1)? 'style="display:none;"' : '';?> class="btn btn-small  btn-success desativar" rel="tooltip" data-original-title="Desativar"><span class="icon-ok icon-white"></span></a>
		<?
    }
	if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'view')){
        ?>      	<a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/ativar', array('id'=>$data->idempreendimento))?>" <?=($data->ativo == 1)? 'style="display:none;"' : '';?> class="btn btn-small  btn-danger ativar" rel="tooltip" data-original-title="Ativar"><span class="icon-ok icon-white"></span></a>		<?
    }
	if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'view')){
        ?>        <span><a class="btn " href="<?php echo $this->createUrlRel('view',array('id'=>$data->idempreendimento));?>" title="Visualizar"> <i class="icon-zoom-in"></i> </a></span>
    	<?
    }
    if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'update')){
        ?>        <span><a class="btn " href="<?php echo $this->createUrlRel('update',array('id'=>$data->idempreendimento));?>" title="Editar"> <i class="icon-edit "></i> </a></span>
        <?
    }
    if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'delete')){
        ?>        <span><a class="btn btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$data->idempreendimento));?>" title="Excluir"> <i class="icon-trash"></i> </a></span>
        <?
    }
    ?>  </td>
</tr>