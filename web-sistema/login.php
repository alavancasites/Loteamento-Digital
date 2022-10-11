<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title><?php echo Yii::app()->sistema_nome; ?> - Gerenciamento de terrenos</title>
    <?php include ("header_login.php");?>
        

    </head>

    <body class="authentication-page">

        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-header p-4 bg-primary">
                                <h4 class="text-white text-center mb-0 mt-0">CORRETOR</h4>
                                <img src="img/logo.png" class="img-fluid" alt="<?php echo Yii::app()->sistema_nome; ?>"/>
                            </div>
                            <div class="card-body">
                            <?php
	if($erro!=''){
    ?>
        <div class="alert alert-danger"><?php echo $erro; ?></div>
        <?php
	}
	?>    
                            <form action="login" method="POST" class="p-2">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">E-mail :</label>
                                        <input class="form-control" type="email" id="emailaddress" name="Login[email]" required="" placeholder="john@deo.com">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Senha :</label>
                                        <input class="form-control" type="password" required="" name="Login[senha]" id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="checkbox checkbox-success">
                                            <input id="remember" type="checkbox" checked="">
                                            <label for="remember">
                                                Remember me
                                            </label>
                                            <a href="esqueci-senha" class="text-muted float-right">Esqueci minha senha</a>
                                        </div>
                                    </div>

                                    <div class="form-group row text-center mt-4 mb-4">
                                        <div class="col-12">
                                            <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">ACESSAR</button>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-sm-12 text-center">
                                            <p class="text-muted mb-0"> <a href="cadastro" class="text-dark m-l-5"><b>SOU CORRETOR, QUERO ME CADASTRAR</b></a></p>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <!-- end row -->

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
        </div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>

</html>
