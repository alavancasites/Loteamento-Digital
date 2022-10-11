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

                            <h2 class="text-center tit">Selecione o loteamento que deseja acessar</h2>
                            <hr>
                            <?php
                            if ($model_sessao->clientes) {
                            ?>
                                <div class="row">

                                    <?php
                                    foreach ($model_sessao->clientes as $cliente_rel) {
                                        // echo 'idcorretor_cliente='.$cliente_rel->idcorretor_cliente.'<br>';
                                        // echo 'idcorretor='.$cliente_rel->idcorretor.'<br>';
                                        // echo 'idcliente='.$cliente_rel->idcliente.'<br>';

                                        $cliente = $cliente_rel->cliente;

                                    ?>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-4 mt-3">

                                                            <img style="margin-top:10px;" class="img-fluid" src="extranet/uploads/Cliente/<?= $cliente->logomarca; ?>" width="100%" />
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <h3><?= $cliente->titulo ?></h3>
                                                            <a class="btn btn-outline-dark waves-effect width-md waves-light" href="cliente?cliente=<?= md5($cliente->idcliente) ?>" title="Acessar"> Acessar </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php

                            } else {
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