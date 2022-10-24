<?php
$this->breadcrumbs['Inicial'] = array('index');

?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Carregar acesso</h4>
            </div>
            <div class="card-body" style="min-height:700px;">
                <div class="card-body-busca">
                    Selecione o cliente qual deseja acessar:
                    <hr>
                    <div class="row">


                        <?php

                        if (Yii::app()->user->obj->clientes) {
                            foreach (Yii::app()->user->obj->clientes as $cliente_rel) {

                                // echo 'idcorretor_cliente='.$cliente_rel->idcorretor_cliente.'<br>';
                                // echo 'idcorretor='.$cliente_rel->idcorretor.'<br>';
                                // echo 'idcliente='.$cliente_rel->idcliente.'<br>';
                                $cliente = Cliente::model()->findByPk($cliente_rel->idcliente);
                                // $cliente = ($cliente_rel->cliente);
                        ?>
                                <div class="col-md-3">

                                    <div class="card">
                                        <img class="card-img-top img-fluid" src="<?php echo Yii::app()->request->baseUrl; ?>/<?= $cliente->Logomarca->getAttachment('p'); ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $cliente->titulo ?></h5>
                                            <a href="<?php echo $this->createUrlRel('cliente', array('cliente' => md5($cliente->idcliente))); ?>" class="btn btn-primary">Acessar</a>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                        } else {
                            ?>
                            <div class="col-md-12">
                                <em>
                                    Você não é vinculado a nenhum cliente!
                                </em>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>