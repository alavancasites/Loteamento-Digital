
<div class="imovel_box status_<?=$imovel->status?>">
    <div><a href="<?=$link_fav?>" class="favorito <?=$imovel->favorito($model_sessao->getPrimaryKey())?'on':'off'?>"><i class="icon-favorito"></i></a></div>
    <div class="imoveis_conteudo">
        <h2><?=Util::formataTexto($imovel->nome)?></h2>
        <div class="descricao">
            <span>Área total: <?=$imovel->metragem?> m&sup2;</span>
            <span>Frente: <?=$imovel->metragem_frente?> m</span>
            <span>Lateral Esquerda: <?=$imovel->metragem_esquerda?> m</span>
            <span>Lateral Direita: <?=$imovel->metragem_direita?> m</span>
            <span>Fundos: <?=$imovel->metragem_fundo?> m</span>
            <?php
            if($imovel->destaque){
                echo $imovel->descricao;
            }
            ?>
            <div class="valor">R$ <?=$imovel->valor?></div>
            <div class="botoes">
                <?php
                $show_link = true;
                if(is_file("extranet/uploads/Imovel/".$imovel->foto)){
                    $show_link = false;
                     ?>
                    <a href="extranet/thumbnail/fill/800x700/Imovel/<?=$imovel->foto?>" data-fancybox="gallery-<?=$imovel->idimovel?>">+ DETALHES</a>
                    <?php
                }
                $fotos = $imovel->galeria->getGallery()->galleryPhotos;
                if(count($fotos)){
                    foreach ($fotos as $foto){
                        $img = $foto->id.'.jpg';
                        $leg = Util::formataTexto($foto->description);

                        ?>
                        <a href="extranet/thumbnail/fill/800x700/gallery/<?=$img?>" data-fancybox="gallery-<?=$imovel->idimovel?>" style="display:<?=$show_link?'block':'none'?>">+ DETALHES</a>
                        <?
                        $show_link = false;
                    }
                }
                 ?>
                <?php
                if($imovel->status!='disponivel'){
                    if($imovel->imovelReserva->idcorretor==$model_sessao->idcorretor){
                        if($imovel->status=='reservado'){
                            if($imovel->imovelReserva->renovado!=1){
                                ?>
                                <a class="negociacao renovar" href="renovar-reserva?id=<?=$imovel->idimovel?>">RENOVAR</a>
                                <?php
                            }
                            ?>
                            
                            <a class="negociacao cancelar-reserva" href="remove-reserva?id=<?=$imovel->idimovel?>">CANCELAR RESERVA</a>
                            <?php
                        }
                        ?>

                        <a class="negociacao">EXPIRA <?=$imovel->getExpiracao()?></a>

                        <a class="negociacao bt botao">DADOS DO CLIENTE</a>
                        <?php
                    } elseif($imovel->imovelReservaSeg->idcorretor==$model_sessao->idcorretor){
                        ?>
                        <a class="negociacao">AGUARDANDO RESERVA PRINCIPAL</a>
                        <?php
                    }
                }
                if($imovel->status=='disponivel' || (!$imovel->imovelReservaSeg && $imovel->imovelReserva->idcorretor!=$model_sessao->idcorretor)){
                    ?>
                    <a class="bt botao">RESERVAR</a>
                    <?php
                }
                ?>
            </div>
            <section class="popup">
                <div class="conteudo_popup">
                    <div class="container container-1200"> <a class="close"><i class="icon-close"></i></a>
                        <div class="colunas col-12 off-4 mt20">
                            <h4 class="text-center">DADOS DO CLIENTE</h4>
                            <?php
                            if($imovel->status!='disponivel'){
                                if($imovel->imovelReserva->idcorretor==$model_sessao->idcorretor){
                                    ?>
                                    <div class="dados_clientes">
                                        <div class="mt50"><strong>Nome:</strong> <?=$imovel->imovelReserva->nome?></div>
                                        <div><strong>Telefone:</strong> <?=$imovel->imovelReserva->telefone?></div>
                                        <div><strong>Email:</strong> <?=$imovel->imovelReserva->email?></div>
                                        <div><strong>CPF/CNPJ:</strong> <?=$imovel->imovelReserva->cpf_cnpj?></div>
                                        <div><strong>Observções:</strong> <?=Util::formataTexto($imovel->imovelReserva->observacoes)?></div>
                                        <div class="text-center"><a href="reserva?id=<?=$imovel->idimovel_reserva?>">EDITAR DADOS</a></div>
                                    </div>
                                    <?php
                                }elseif($imovel->imovelReservaSeg->idcorretor==$model_sessao->idcorretor){
                                    ?>
                                    <div class="dados_clientes">
                                        <div class="mt50"><strong>Nome:</strong> <?=$imovel->imovelReservaSeg->nome?></div>
                                        <div><strong>Telefone:</strong> <?=$imovel->imovelReservaSeg->telefone?></div>
                                        <div><strong>Email:</strong> <?=$imovel->imovelReservaSeg->email?></div>
                                        <div><strong>CPF/CNPJ:</strong> <?=$imovel->imovelReservaSeg->cpf_cnpj?></div>
                                        <div><strong>Observções:</strong> <?=Util::formataTexto($imovel->imovelReservaSeg->observacoes)?></div>
                                        <div class="text-center"><a href="reserva?id=<?=$imovel->idimovel_reserva?>">EDITAR DADOS</a></div>
                                    </div>
                                    <?php
                                }

                            }


                            if($imovel->status=='disponivel' || (!$imovel->imovelReservaSeg && $imovel->imovelReserva->idcorretor!=$model_sessao->idcorretor)){
                                $form = new CActiveForm();
                        		$model = new ImovelReserva();
                                $model->idimovel = $imovel->idimovel;

                                ?>
                                <div class="imovel_formulario mt50">
                                    <?php
                                    if($imovel->imovelReserva){
                                        ?>
                                        <div class="alert alert-warning">
                                            <strong>Atenção corretor!</strong><br />
                                            Você está reservando um lote já reservado! Sua reserva ficará fila de espera, tornando-se válida apos o cancelamento ou vencimento da primeira reserva!
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <form class="form-reserva" name="form1" method="post" action="add-reserva">
                                        <div class="retorno">

                                        </div>
                                        <div class="campos">

                                            <?php echo $form->hiddenField($model, 'idimovel'); ?>
                                            <?php echo $form->textField($model, 'nome', array('placeholder' => 'NOME','class' => 'u-full-width')); ?>
                                            <?php echo $form->textField($model, 'telefone', array('placeholder' => 'TELEFONE','class' => 'u-full-width telefone')); ?>
                                           <?php echo $form->textField($model, 'email', array('placeholder' => 'E-MAIL','class' => 'u-full-width')); ?>
                                           <?php echo $form->textField($model, 'cpf_cnpj', array('placeholder' => 'CPF','class' => 'u-full-width')); ?>
                                           <?php echo $form->textArea($model, 'observacoes', array('placeholder' => 'OBSERVAÇÕES','class' => 'u-full-width', 'rows'=>3)); ?>
                                            <div class="text-center mt10"><button name="enviar" type="submit" value="ENVIAR">RESERVAR</button></div>
                                        </div>
                                    </form>
                                </div>
                                <?php
                            }
                            ?>


                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
