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
  <div class="login esqueci_senha">
    <div class="mt40"><a href="inicial"><img src="img/logo.png" width="173" height="59" alt=""/></a></div>
    <h1>ESQUECI MINHA SENHA</h1>
    <?php
    if($_GET['sucesso']=='senha'){
        ?>
        <div class="aviso text-center">
            <div class="sucesso">
                <h2>Solicita&ccedil;&atilde;o de recupera&ccedil;&atilde;o de senha realizada!</h2>
              <h3>Um e-mail com o link para cadastro da nova senha foi enviado para o endereço '<?php echo $_GET['mail'] ?>'</h3>
            </div>
        </div>
        <?php
    }else{
        if($erro!=''){
            ?>
            <div class="errorSummary mt20">
                <?php echo $erro ?>
            </div>
            <?php
        }
        ?>
        <form id="form1" name="form1" method="post" action="esqueci-senha" class="mt30">
          <input name="cpf_cnpj" type="text" id="cpf_cnpj" placeholder="CPF" class="u-full-width cpf" />
    	  <button name="enviar" type="submit" value="acessar">RECUPERAR SENHA</button>
          <div class="bt_esqueci_senha"><a href="login">&laquo; Voltar para o login</a></div>
    	  <div class="clear"></div>
        </form>
        <?php
    }
    ?>
  </div>
</div>
</body>
</html>
