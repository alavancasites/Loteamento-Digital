<tr>
  <?
  foreach($this->getRepresentingFields() as $field){
  	?>
    <td><?= Util::formataTexto($data->$field);?></td>
	<?
  }
  ?>  <td class="actions">
    <?
	if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'view')){
        ?>        <span><a class="btn btn-outline-primary" href="<?php echo $this->createUrlRel('view',array('id'=>$data->idUserGroup));?>" title="Visualizar"> <i class=" ion ion-md-eye"></i> </a></span>
    	<?
    }
    if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'update')){
        ?>        <span><a class="btn btn-outline-primary" href="<?php echo $this->createUrlRel('update',array('id'=>$data->idUserGroup));?>" title="Editar"> <i class="ion ion-md-create "></i> </a></span>
        <?
    }
    if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'delete')){
        ?>        <span><a class="btn btn-outline-danger btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$data->idUserGroup));?>" ><i class=" ion ion-md-trash"></i> </a></span>
        <?
    }
    ?>  </td>
</tr>