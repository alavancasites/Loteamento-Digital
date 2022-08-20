<?
/*********************************************************
*Controle de versao: 2.2
*********************************************************/
//include("gzip/gzipHTML.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo Yii::app()->sistema_nome; ?> - Gerenciamento de terrenos</title>
<?php include ("header_login.php");?>
</head>
<body>
<div id="wrapper">
  <div class="cadastro">
    <div class="bt_esqueci_senha"><a href="login">&laquo; Voltar para o login</a></div>
    <div class="mt20"><a href="inicial"><img src="img/logo.png" width="208" height="64" alt=""/></a></div>
    <h1>CADASTRO DE CORRETOR</h1>
    <?php
    if($erro!=''){
        echo $erro;
    }
    ?>
    <form id="form1" name="form1" method="post" action="cadastro" class="mt30">
      <?php echo $form->textField($model, 'nome', array('placeholder' => 'NOME','class' => 'u-full-width')); ?>
      <?php echo $form->textField($model, 'email', array('placeholder' => 'E-MAIL','class' => 'u-full-width')); ?>
      <?php echo $form->textField($model, 'cpf_cnpj', array('placeholder' => 'CPF/CNPJ','class' => 'u-full-width cpf-cnpj')); ?>
      <?php echo $form->textField($model, 'registro', array('placeholder' => 'CRECI','class' => 'u-full-width')); ?>
      <?php echo $form->textField($model, 'telefone', array('placeholder' => 'TELEFONE','class' => 'u-full-width telefone')); ?>
      <?php echo $form->passwordField($model, 'senha', array('placeholder' => 'SENHA','value' => '','class' => 'u-full-width')); ?>
      <?php echo $form->passwordField($model, 'senha_confirma', array('placeholder' => 'CONFIRME A SENHA','value' => '','class' => 'u-full-width')); ?>
      <button name="enviar" type="submit" value="acessar">CADASTRAR</button>
      <div class="clear"></div>
    </form>
  </div>
</div>
</body>
</html>
