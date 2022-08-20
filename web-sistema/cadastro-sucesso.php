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
  <div class="login aviso">
    <div><a href="login"><img src="img/logo.png" width="208" height="64" alt=""/></a></div>
    <h1>GERENCIAMENTO DE IM&Oacute;VEIS</h1>
    <div class="sucesso">
      <h2>Para efetivar seu cadastro, efetue o download do arquivo abaixo:</h2>
      <div class="bt_download"><a href="https://loteamento.digital/acesso/arquivos/contrato_intermediacao.docx" download><img src="img/icone_download_doc.png" class="rollover" width="64" height="64" alt=""/></a></div>
      <h2 class="mt40">Ap&oacute;s preencher o arquivo,<br />
      assinar 2 vias e entregar <br />
      em nosso plant&atilde;o de vendas.<strong><a href="mailto:<?php echo Yii::app()->sistema_email; ?>" target="_blank"><?php echo Yii::app()->sistema_email; ?></a></strong></h2>
    </div>
  </div>
</div>
</body>
</html>
