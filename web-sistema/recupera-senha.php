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
  <div class="login ">
    <div class="mt40"><a href="inicial"><img src="img/logo.png" width="173" height="59" alt=""/></a></div>
    <h1>GERENCIAMENTO DE IM&Oacute;VEIS</h1>
    <h2>RECUPERA&Ccedil;&Atilde;O DE SENHA</h2>
    <?php
    if($sucesso!=''){
        ?>
        <div class="aviso text-center">
            <div class="sucesso">
                <h2><?php echo $sucesso ?></h2>
                <a href="login">Ir para o login</a>
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
        if(is_object($corretor_recupera_senha)){
            ?>
            <form id="form1" name="form1" method="post" action="recupera-senha?token=<?=$_GET['token']?>" class="mt30">
              <input name="RecuperarSenha[senha]" type="password" id="senha" placeholder="NOVA SENHA" class="u-full-width" />
              <input name="RecuperarSenha[senha_confirma]" type="password" id="senha_confirma" placeholder="CONFIRME A NOVA SENHA" class="u-full-width" />
        	  <button name="recupera" type="submit" value="acessar">RECUPERAR SENHA</button>
        	  <div class="clear"></div>
            </form>
            <?php
        }else{
            ?><a href="login">Ir para o login</a><?php
        }
    }
    ?>
  </div>
</div>
</body>
</html>
