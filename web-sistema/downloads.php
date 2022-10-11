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

                            <h2 class="text-center tit">DOWNLOADS</h2>
                            <hr>
                            <?php
                            if (count($categorias)) {

                                foreach ($categorias as $categoria) {
                                    $criteria_files = new CDbCriteria();
                                    $criteria_files->addCondition("t.ativo = '1'");
                                    $criteria_files->addCondition("t.idarquivo_categoria = '" . $categoria->idarquivo_categoria . "'");
                                    $arquivos = Arquivo::model()->findAll($criteria_files);

                                    if (count($arquivos)) {
                            ?>
                                        <h3><?= Util::formataTexto($categoria->nome) ?></h3>
                                        <div class="row">
                                            <?
                                            foreach ($arquivos as $arquivo) {
                                            ?>
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <a href="extranet/uploads/Arquivo/<?= $arquivo->arquivo ?>" target="_blank" class="bt_degrade coluna um-terco"><?= Util::formataTexto($arquivo->titulo) ?></a>

                                                        </div>
                                                    </div>

                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                <?php

                                }
                            } else {
                                ?>
                                <p>
                                    <em>Nenhum arquivo disponível</em>
                                </p>
                            <?php
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