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
<?php include ("header.php");?>
</head>
<body>
<div id="topo"><?php include ("topo.php");?></div>
<div id="wrapper" class="internas">
  <div class="caminho"><div class="container container-1200"><a href="terrenos">Inicial</a><i class="icon-right"></i>Meu perfil</div></div>
  <div class="container container-1200">
    <?php include ("avisos_lista.php");?>
    <div class="mt40 imovel_formulario">
  	  <h2 class="text-center tit">PERFIL</h2>
        <div class="colunas col-12 off-4 mt20">
            <?php
            if($erro!=''){
                echo $erro;
            }else if($_GET['sucesso']=='atualizar'){
                ?>
                <div class="aviso text-center">
                    <div class="sucesso">
                        <h2>Dados atualizados com sucesso!</h2>
                    </div>
                </div>
                <?php
            }
            ?>
          <form id="form1" name="form1" method="post" action="perfil">
              <?php echo $form->textField($model, 'nome', array('placeholder' => 'NOME','class' => 'u-full-width')); ?>

             <?php echo $form->textField($model, 'email', array('placeholder' => 'E-MAIL','class' => 'u-full-width')); ?>

             <?php echo $form->textField($model, 'cpf_cnpj', array('placeholder' => 'CPF','class' => 'u-full-width cpf')); ?>

             <?php echo $form->textField($model, 'registro', array('placeholder' => 'REGISTRO','class' => 'u-full-width')); ?>

             <?php echo $form->textField($model, 'telefone', array('placeholder' => 'TELEFONE','class' => 'u-full-width telefone')); ?>

             <?php echo $form->passwordField($model, 'senha', array('placeholder' => 'SENHA','value' => '','class' => 'u-full-width')); ?>

             <?php echo $form->passwordField($model, 'senha_confirma', array('placeholder' => 'CONFIRME A SENHA','value' => '','class' => 'u-full-width')); ?>
            <div class="mt20 text-center"><button name="enviar" type="submit" value="ENVIAR">ATUALIZAR DADOS</button></div>
          </form>
        </div>
        <div class="clear mt20"></div>
      </div>
   </div>
  <div><?php include ("rodape.php");?></div>
</div>
<?php include ("scripts.php");?>
</body>
</html>
