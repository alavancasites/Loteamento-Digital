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
?>
<div class="row">
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
                    <dt><?=Util::formataTexto($model->getAttributeLabel('name'));?></dt>
                    <dd><?=Util::formataTexto($model->name)?></dd>
                  </dl>
              </div>
              <div class="formSep">
                  <dl class="dl-horizontal">
                    <dt><?=Util::formataTexto($model->getAttributeLabel('permissions'));?></dt>
                    <dd>
                    	<table class="table" style="width:300px;">
							<?
                            foreach($model->permissions as $modulo => $operacoes){
                                ?>
                                <tr>
                                    <td>
                                       <strong> <?=Util::formataTexto($modulo);?></strong>
                                    </td>
                                    <td>
                                    <?
                                    foreach($operacoes as $operacao){
                                        ?>
                                        <?=$operacao?><br/>
                                        <?
                                    }
                                    ?>
                                    </td>
                                </tr>
                                <?
                            }
                            ?>
                        </table>
                    </dd>
                  </dl>
              </div>
              
              <?
				if(Yii::app()->user->obj->group->temPermissaoAction('user','index')){
					?>
                    <div class="formSep">
                        <dl class="dl-horizontal">
                            <dt><?php echo GxHtml::encode($model->getRelationLabel('users')); ?></dt>
                            <dd>
                            <?php
                            if(count($model->users) > 0){
                                        echo GxHtml::openTag('ul');
                                foreach($model->users as $relatedModel) {
                                    echo GxHtml::openTag('li');
                                    echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('user/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
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
                    </dd>
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
                              <a class="btn btn-outline-primary" href="<?php echo $this->createUrlRel('update',array('id'=>$model->idUserGroup));?>"><i class="ion ion-md-create "></i> Editar</a>
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
                              <a class="btn btn-outline-danger btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idUserGroup));?>" style="margin-left:30px;"><i class=" ion ion-md-trash"></i> Excluir</a>
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
