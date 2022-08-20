<?php
$this->breadcrumbs['Inicial'] = array('index');

?>
<div class="row-fluid">
    <div class="span12">
        <div class="w-box">
            <div class="w-box-header">
                <h4>Carregar acesso</h4>
            </div>
            <div class="w-box-content" style="min-height:700px;">
                <div class="w-box-content-busca">
                    Selecione o cliente qual deseja acessar:
                    <hr>

                    <?php

                    if(Yii::app()->user->obj->clientes){
                        foreach (Yii::app()->user->obj->clientes as $cliente_rel) {

                            // echo 'idcorretor_cliente='.$cliente_rel->idcorretor_cliente.'<br>';
                            // echo 'idcorretor='.$cliente_rel->idcorretor.'<br>';
                            // echo 'idcliente='.$cliente_rel->idcliente.'<br>';
                            $cliente = Cliente::model()->findByPk($cliente_rel->idcliente);
                            // $cliente = ($cliente_rel->cliente);
                            ?>
                            <div class="row-fluid">
                                <div class="span3">
                                    <img style="margin-top:10px;" class="img-polaroid" src="<?php echo Yii::app()->request->baseUrl; ?>/<?=$cliente->Logomarca->getAttachment('p');?>" />
                                </div>
                                <div class="span9">
                                    <h3><?=$cliente->titulo?></h3>
                                    <a class="btn btn-default" href="<?php echo $this->createUrlRel('cliente',array('cliente'=>md5($cliente->idcliente)));?>" title="Acessar"> Acessar </a>
                                </div>
                            </div>
                            <?php
                        }

                    }else{
                        ?>
                        <p>
                            <em>
                                Você não é vinculado a nenhum cliente!
                            </em>
                        </p>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
