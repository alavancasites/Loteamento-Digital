<tr>
    <?
    foreach($this->getRepresentingFields() as $field){
        ?>
        <td>
            <?php
            if($field=='status'){
                echo Util::formataTexto($data->getStatus());
            }elseif($field=='corretor'){
                if($this->action->id=='reservas'){
                    echo Util::formataTexto($data->imovelReservaSeg->corretor->nome);
                }else{
                    echo Util::formataTexto($data->imovelReserva->corretor->nome);
                }
            }else {
                echo Util::formataTexto($data->$field);
            }
            ?>
        </td>
        <?php
    }
    if($this->action->id=='negociacao'){
        ?>
        <td width="200">
            <?php
            if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'vendido')&&$data->status!='vendido'){
                ?>
                <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/vendido', array('id'=>$data->idimovel));?>" class="btn btn-small  btn-default btn-vendido">
                    <span class="icon-ok"></span> Vendido
                </a>
                <?php
            }
            if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'contrato')&&$data->status=='reservado'){
                ?>
                <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/contrato', array('id'=>$data->idimovel));?>" class="btn btn-small  btn-default btn-contrato">
                    <span class="icon-ok"></span> Em Contrato
                </a>
                <?php
            }

            if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'cancelarReserva')&&$data->status!='vendido'){
                ?>
                <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/cancelarReserva', array('id'=>$data->idimovel));?>" class="btn btn-small  btn-default btn-cancelar">
                    <span class="icon-remove"></span> Cancelar
                </a>
                <?php
            }
            ?>
        </td>
        <?php
    }
    if($this->action->id=='reservas'){
        ?>
        <td width="200">
            <?php
            if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'cancelarSegundaReserva')&&$data->status!='vendido'){
                ?>
                <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/cancelarSegundaReserva', array('id'=>$data->idimovel));?>" class="btn btn-small  btn-default btn-cancelar">
                    <span class="icon-remove"></span> Cancelar
                </a>
                <?php
            }
            ?>
        </td>
        <?php
    }
    if($this->action->id!='negociacao'&&$this->action->id!='reservas'){
        ?>
        <td style="text-align:right; width:200px;">
            <?
            if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'view')){
                ?>
                <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/desativar', array('id'=>$data->idimovel));?>" <?=($data->ativo !=1)? 'style="display:none;"' : '';?> class="btn btn-small  btn-success desativar" rel="tooltip" data-original-title="Desativar"><span class="icon-ok icon-white"></span></a>
                <?
            }
            if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'view')){
                ?>
                <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/ativar', array('id'=>$data->idimovel))?>" <?=($data->ativo == 1)? 'style="display:none;"' : '';?> class="btn btn-small  btn-danger ativar" rel="tooltip" data-original-title="Ativar"><span class="icon-ok icon-white"></span></a>		<?
            }
            if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'view')){
                ?>
                <span><a class="btn " href="<?php echo $this->createUrlRel('view',array('id'=>$data->idimovel));?>" title="Visualizar"> <i class="icon-zoom-in"></i> </a></span>
                <?
            }
            if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'update')){
                ?>
                <span><a class="btn " href="<?php echo $this->createUrlRel('update',array('id'=>$data->idimovel));?>" title="Editar"> <i class="icon-edit "></i> </a></span>
                <?
            }
            if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'delete')){
                ?>
                <span><a class="btn btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$data->idimovel));?>" title="Excluir"> <i class="icon-trash"></i> </a></span>
                <?
            }
            ?>  </td>
            <?php
        }
        ?>
    </tr>
