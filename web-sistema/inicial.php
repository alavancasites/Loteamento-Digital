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
  <div class="login">
    <div class="mt40"><a href="inicial"><img src="img/logo.png" alt="<?php echo Yii::app()->sistema_nome; ?>"/></a></div>
    <h1>GERENCIAMENTO DE IM&Oacute;VEIS</h1>
    <form id="form1" name="form1" method="post" action="login" class="mt30">
      <input name="email" type="text" id="email" placeholder="E-MAIL" />
      <input name="senha" type="password" id="senha" placeholder="SENHA" />
      <div class="botao"><button name="enviar" type="submit" value="acessar">ACESSAR</button></div>
      <div class="esqueci_senha"><a href="esqueci-senha">Esqueci minha senha</a></div>
      <div class="clear"></div>
      <div class="mt20">
          <a href="cadastro"><strong>SOU CORRETOR, QUERO ME CADASTRAR</strong></a>
      </div>
	  <div class="clear"></div>
    </form>
  </div>
</div>
</body>
</html>
