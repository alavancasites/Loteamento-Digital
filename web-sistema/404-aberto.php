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
    <div class="mt40"><a href="login"><img src="img/logo.png" width="173" height="59" alt=""/></a></div>
    <h1>404</h1>
    <p>Página não encontrada!</p>
    <?php
	if($erro!=''){
		?>
        <div class="errorSummary mt20"><?php echo $erro; ?></div>
        <?php
	}
	?>
      <div class="clear"></div>
      <div class="mt20"><a href="login"><strong>Faça login para acessar o sistema</strong></a></div>

  </div>
</div>
</body>
</html>
