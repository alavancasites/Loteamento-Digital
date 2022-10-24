<tr>
  <?
  foreach($this->getRepresentingFields() as $field){
  	?>	<td><?= Util::formataTexto($data->$field);?></td>
	<?
  }
  ?>  <td class="actions">
    <?
	if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'view')){
        ?>     	<a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/desativar', array('id'=>$data->idaviso));?>" <?=($data->ativo !=1)? 'style="display:none;"' : '';?> class="btn btn-small  btn-success desativar" rel="tooltip" data-original-title="Desativar"><span class="ion ion-md-checkmark icon-white"></span></a>
		<?
    }
	if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'view')){
        ?>      	<a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/ativar', array('id'=>$data->idaviso))?>" <?=($data->ativo == 1)? 'style="display:none;"' : '';?> class="btn btn-small  btn-danger ativar" rel="tooltip" data-original-title="Ativar"><span class="ion ion-md-checkmark icon-white"></span></a>		<?
    }
	if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'view')){
        ?>        <span><a class="btn btn-outline-primary" href="<?php echo $this->createUrlRel('view',array('id'=>$data->idaviso));?>" title="Visualizar"> <i class=" ion ion-md-eye"></i> </a></span>
    	<?
    }
    if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'update')){
        ?>        <span><a class="btn btn-outline-primary" href="<?php echo $this->createUrlRel('update',array('id'=>$data->idaviso));?>" title="Editar"> <i class="ion ion-md-create "></i> </a></span>
        <?
    }
    if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'delete')){
        ?>        <span><a class="btn btn-outline-danger btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$data->idaviso));?>" title="Excluir"> <i class=" ion ion-md-trash"></i> </a></span>
        <?
    }
    ?>  </td>
</tr>