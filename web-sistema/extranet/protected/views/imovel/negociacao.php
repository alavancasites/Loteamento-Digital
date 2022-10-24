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
?>
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-header">
            <h4><?=Util::formataTexto($model->label(2));?></h4>
          </div>
          <div class="card-body">
            <div  class="card-body-busca">
				<?
                $this->renderPartial("//layouts/busca",array(
                    'button' => (Yii::app()->user->obj->group->temPermissaoAction($this->id,'create')) ? Yii::t('app','Cadastrar').' '.$model->label() : NULL,
                    'controller' => $this->id,
					'action'=> $this->action->id,
                ));
                ?>            </div>
			<?
            if(is_array($dataProvider->data) && count($dataProvider->data) > 0){
                ?>                <table class="table table-hover">
                	<thead>
                    	<tr>
                        	<?
							foreach($this->getRepresentingFields() as $field){
								$icon = "fa-sort";
								$ordem = "asc";
								if($_GET['f'] == $field){
									if($_GET['o'] == "asc"){
										$ordem = "desc";
										$icon = "fa-sort-up";
									}
									elseif($_GET['o'] == "desc"){
										$ordem = "asc";
										$icon = "fa-sort-down";
									}
								}
								?>
								<th>
									<?php
									if($field !='corretor'){
										?>
										<a class="btn-link" href="<?php echo $this->createUrlRel('negociacao',array_merge($_GET,array('f'=>$field,'o'=>$ordem)));?>">
											<i class="fa <?=$icon;?>"></i> <?=Util::formataTexto($model->getAttributeLabel($field));?>
										</a>
										<?php
									}else{
										echo Util::formataTexto($model->getAttributeLabel($field));
									}
									 ?>
								</th>
								<?
							}

							?>
						</tr>
                    </thead>
                <?
                foreach($dataProvider->data as $data){
					$this->renderPartial('_view',array('data'=>$data));
				}
                ?>                </table>
                <?
				$this->renderPartial("//layouts/paginacao",array(
					'pagination' => $dataProvider->pagination,
				));
				?>                <?
            }
            else{
                ?>                <div class="alert alert-block">Nenhum registro encontrado!</div>
                <?
            }
            ?>            </div>
      </div>
  </div>
</div>
