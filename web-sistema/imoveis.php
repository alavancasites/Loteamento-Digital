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
                        <div class="col-lg-12">
                            <?
                            if (count($empreendimentos)) {
                            ?>
                                <div id="accordion" class="mb-3">
                                    <?php
                                    foreach ($empreendimentos as $empreendimento) {
                                        $criteria_imoveis = new CDbCriteria();
                                        if (is_numeric($_GET['metragem_min'])) {
                                            $val = Util::formataMoedaFloat($_GET['metragem_min']);
                                            $criteria_imoveis->addCondition("metragem >= '" . $val . "'");
                                        }
                                        if (is_numeric($_GET['metragem_max'])) {
                                            $val = Util::formataMoedaFloat($_GET['metragem_max']);
                                            $criteria_imoveis->addCondition("metragem <= '" . $val . "'");
                                        }
                                        if (is_numeric($_GET['valor_min'])) {
                                            $val = Util::formataMoedaFloat($_GET['valor_min']);
                                            $criteria_imoveis->addCondition("valor >= '" . $val . "'");
                                        }
                                        if (is_numeric($_GET['valor_max'])) {
                                            $val = Util::formataMoedaFloat($_GET['valor_max']);
                                            $criteria_imoveis->addCondition("valor <= '" . $val . "'");
                                        }
                                        $criteria_imoveis->addCondition("status <> 'vendido'");
                                        $criteria_imoveis->addCondition("ativo = '1'");
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

                                                    foreach ($empreendimento->imovels($criteria_imoveis) as $imovel) {
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