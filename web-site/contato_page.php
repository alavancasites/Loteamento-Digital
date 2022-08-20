<?
$model = new Contato();
if(is_array($_POST['Contato'])){
	$model->attributes = $_POST['Contato'];
	$model->data = date('d/m/Y H:i:s');
	$model->ip = $_SERVER['REMOTE_ADDR'];
	
	if($model->save()){
		$model = new Contato();
		$sucesso = 1;
		header("Location: contato?sucesso=1");
	}
	
}
$erro = CHtml::errorSummary($model);
$form = new CActiveForm();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Loteamento Digital | Fale conosco</title>
<?php include("header.php"); ?>
<style type="text/css"><?php echo file_get_contents('css/formularios.css');?></style>
</head>
<body>
<div id="wrapper" class="contato">
  <div id="topo">
    <?php include("topo.php"); ?>
    <div class="header-contato">
      <div class="container">
        <section class="colunas col-20 texto-header">
          <h3>D&uacute;vidas, cr&iacute;ticas, sugest&otilde;es?</h3>
          <h2>Fale<br /><strong>conosco</strong> </h2>
          <p> Deixe o seu contato e vamos conversar sobre o seu loteamento. </p>
          <p>Inicial &raquo; Contato</p>
        </section>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <div id="conteudo">
    <div class="container">
      <div class="colunas col-6 fale-conosco">
        <h3>Fale conosco</h3>
        <h2>Nossos contatos</h2>
        <ul>
          <li><a href="mailto:atendimento@loteamento.digital" rel="noopener" target="_blank"><i class="icon-email"></i>atendimento@loteamento.digital</a></li>
          <li><a href="https://instagram.com/loteamento.digital" target="_blank"><i class="icon-instagram"></i>loteamento.digital</a></li>
          <li><a href="https://api.whatsapp.com/send?phone=5549984241392" rel="noopener" target="_blank"><i class="icon-whatsapp"></i>(49) 98424-1392</a></li>
        </ul>
        <div class="clear"></div>
      </div>
      <div class="colunas col-14 form-contato">
        <h3>D&uacute;vidas, cr&iacute;ticas, sugest&otilde;es</h3>
        <h2>Entre em contato</h2>
        <?
          if(!empty($erro)){
        ?>
          <div class="error margin20"><?=$erro;?></div>
        <?
          }if($_GET['sucesso'] == 1){
        ?>
          <div class="sucesso_msg">Contato enviado com sucesso. Obrigado!</div>
        <?
          }
        ?>
        <form id="form-contato" name="form1" method="post" action="contato">
          <input type="hidden"  name="grava" value="1" />
          <?php echo $form->textField($model,'nome',array('class'=>'colunas col-7 alpha','maxlength'=>100,'placeholder'=>$model->getAttributeLabel('nome'))); ?>
          <?php echo $form->textField($model,'email',array('class'=>'colunas col-7 omega','maxlength'=>100,'placeholder'=>$model->getAttributeLabel('email'))); ?>
          <?php echo $form->textField($model,'telefone',array('class'=>'colunas col-7 alpha','maxlength'=>100,'placeholder'=>$model->getAttributeLabel('telefone'))); ?>
          <?php echo $form->textField($model,'empresa',array('class'=>'colunas col-7 omega','maxlength'=>100,'placeholder'=>$model->getAttributeLabel('empresa'))); ?>
          <?php echo $form->textArea($model,'mensagem',array('rows'=>'6','cols'=>'40','placeholder'=>$model->getAttributeLabel('mensagem'),'class'=>'colunas col-14 alpha omega')); ?>
          <div class="clear"></div>
          <div class="footer-form-contato">
            <ul>
              <div class="colunas-checkbox colunas col-9 alpha">
                <li>
                  <div>
                    <input type="checkbox" value="1" name="Contato[aceito_email]" id="aceito_email">
                  </div>
                  <label for="aceito_email">Quero receber novidades sobre o Loteamento Digital via e-mail.</label>
                </li>
                <li>
                  <div>
                    <input type="checkbox" value="1" name="Contato[aceito_whatsapp]" id="aceito_whatsapp">
                  </div>
                  <label for="aceito_whatsapp">Quero receber novidades sobre o Loteamento Digital via whatsapp.</label>
                </li>
              </div>
              <div class="clear"></div>
            </ul>
            <div class="colunas col-5 omega bt-form-contato">
              <button type="submit" class="bt-form" id="bt-contato">Enviar mensagem</button>
            </div>
            <div class="clear"></div>
          </div>
        </form>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <div id="rodape"><?php include("rodape.php"); ?> </div>
  <div class="clear"></div>
</div>
<?php include("scripts.php"); ?>
</body>
</html>