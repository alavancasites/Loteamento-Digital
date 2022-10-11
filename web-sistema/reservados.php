<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard 1 | Velonic - Responsive Bootstrap 4 Admin Dashboard</title>
    <?php include('header.php'); ?>

</head>

<body data-layout="horizontal">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Navigation Bar-->
        <?php
        include('topo.php');
        ?>
        <!-- End Navigation Bar-->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row mt-3">
                        <h3>

                            MEUS TERRENOS RESERVADOS
                        </h3>
                        <div class="col-lg-12">
                            <?
                            if (count($empreendimentos)) {
                            ?>
                                <div id="accordion" class="mb-3">
                                    <?php
                                    foreach ($empreendimentos as $empreendimento) {
                                        $criteria_imoveis = new CDbCriteria();
                                        $criteria_imoveis->addCondition("t.ativo = '1'");
                                        $criteria_imoveis->addCondition("t.status <> 'vendido'");
                                        $criteria_imoveis->addCondition("t.idimovel_reserva IS NOT NULL");
                                        $criteria_imoveis->addCondition("t.idempreendimento = '" . $empreendimento->idempreendimento . "'");
                                        $criteria_imoveis->addCondition("imovel_reserva.idcorretor = '" . $model_sessao->idcorretor . "'");
                                        $criteria_imoveis->join  = 'INNER JOIN imovel_reserva ON imovel_reserva.idimovel = t.idimovel';
                                        $criteria_imoveis->group = 't.idimovel';
                                        $criteria_imoveis->select = 't.*';
                                        $imoveis = Imovel::model()->findAll($criteria_imoveis);
                                    ?>
                                        <div class="card mb-0">
                                            <div class="card-header" id="heading<?= $empreendimento->idempreendimento ?>">
                                                <h6 class="m-0">
                                                    <a href="#collapse<?= $empreendimento->idempreendimento ?>" class="text-dark" data-toggle="collapse" aria-expanded="true" aria-controls="collapse<?= $empreendimento->idempreendimento ?>">


                                                        <div class="colunas col-13">
                                                            <h2><?php echo $empreendimento->nome ?></h2>
                                                            <h3><?php echo count($empreendimento->imovels($criteria_imoveis)) ?> LOTES</h3>
                                                        </div>
                                                        <div class="colunas col-3">
                                                            <div class="status disponivel"><strong><?php echo $empreendimento->count_disponiveis(); ?></strong> DISPON&Iacute;VEIS</div>
                                                        </div>
                                                        <div class="colunas col-3">
                                                            <div class="status reservado"><strong><?php echo $empreendimento->count_reservados(); ?></strong> RESERVADOS</div>
                                                        </div>
                                                        <div class="colunas col-1"><i></i></div>
                                                        <div class="clear"></div>

                                                    </a>
                                                </h6>
                                            </div>

                                            <div id="collapse<?= $empreendimento->idempreendimento ?>" class="collapse" aria-labelledby="heading<?= $empreendimento->idempreendimento ?>" data-parent="#accordion">
                                                <div class="card-body">

                                                    <a href="quadra/<?php echo $empreendimento->idempreendimento ?>/<?php echo Util::removerAcentos($empreendimento->nome) ?>" class="bt_empreendimento"><i class="icon-mapa"></i> + VER QUADRA NO MAPA</a>

                                                    <?

                                                    foreach ($imoveis as $imovel) {
                                                        $link_fav = 'add-favorito?id=' . $imovel->idimovel;
                                                        if ($imovel->favorito($model_sessao->getPrimaryKey())) {
                                                            $link_fav = 'remove-favorito?id=' . $imovel->idimovel;
                                                        }
                                                    ?>
                                                        <div class="imoveis_lista">
                                                            <? include('imovel_mostra.php'); ?>
                                                        </div>
                                                    <?
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    <?
                                    }
                                    ?>
                                </div>
                            <?php
                            }

                            $pagination = $data_provider->pagination;
                            $pagina = $pagination->currentPage + 1;
                            if ($pagination->pageCount > 1) {
                                include('paginacao.php');
                            }
                            ?>


                        </div>

                    </div>
                    <!-- End row -->

                </div>
                <!-- end container-fluid -->

            </div>
            <!-- end content -->



            <!-- Footer Start -->
            <?php include('rodape.php') ?>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->


    <?php include('scripts.php') ?>

</body>

</html>