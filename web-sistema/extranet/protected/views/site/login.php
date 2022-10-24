<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Login page | Velonic - Responsive Bootstrap 4 Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Responsive bootstrap 4 admin template" name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="template/images/favicon.ico">

  <!-- App css -->
  <link href="template/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
  <link href="template/css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="template/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

</head>

<body class="authentication-page">

  <div class="account-pages my-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
          <div class="card mt-4">
            <div class="card-header p-4 bg-primary text-center">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_cliente.png" class="img-fluid" alt="Logo" />
              <h4 class="text-white text-center mb-0 mt-0">Administrador</h4>
            </div>
            <div class="card-body">
              <?php
              $form = $this->beginWidget('CActiveForm', array(
                'id' => 'login-form',
                'enableAjaxValidation' => true,
              ));
              ?>
              <?php
              if ($model->getErrors()) {
                ?>
                <div class="alert alert-danger">
                  <?php echo $form->error($model, 'email'); ?>
                  <?php echo $form->error($model, 'senha'); ?>
                </div>
                <?php
              }
              ?>
              <div class="form-group mb-3">
                <label for="emailaddress">E-mail:</label>
                <?php echo $form->textField($model, 'email', array('placeholder' => 'E-mail', 'class' => 'form-control login_email')); ?>
              </div>

              <div class="form-group mb-3">
                <label for="password">Senha:</label>
                <?php echo $form->passwordField($model, 'senha', array('placeholder' => 'Senha', 'class' => 'form-control login_senha')); ?>
              </div>

              <div class="form-group mb-4">
                <div class="checkbox checkbox-success">
                  <input id="remember" type="checkbox" checked="">
                  <label for="remember">
                    Remember me
                  </label>
                  <a href="pages-recoverpw.html" class="text-muted float-right">Forgot your password?</a>
                </div>
              </div>

              <div class="form-group row text-center mt-4 mb-4">
                <div class="col-12">
                  <button class="btn btn-primaryd btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                </div>
              </div>

             
              <?php $this->endWidget(); ?>

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
  <script src="template/js/vendor.min.js"></script>

  <!-- App js -->
  <script src="template/js/app.min.js"></script>
  <?php
  Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/login/login.js', CClientScript::POS_END);
  Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/login.css');
  ?>
</body>

</html>