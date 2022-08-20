<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Lote atualizado</title>
<style type="text/css">body,td,th { font-family: Arial, Helvetica, sans-serif; color: #555; font-size: 12px; }body { margin: 0px; background: #f3f3f3; }td { padding: 15px; border-bottom: 1px dashed #000 }.fundo { background: #f7f7f7; }</style></head>
</head>
<body>
<div style="width:100%;">
  <div style="width:750px; margin-left:auto; margin-right:auto;">
    <div>
      <div style="margin-top:30px; text-align:center;"><a href="http://www.loteamento.digital" target="_blank"><img src="http://www.loteamento.digital/divulgacao/email_header.png" alt="Loteamento Digital"/></a></div>
      <div style="margin-top:30px">
        <h1 style="color: #555; font-size:16px; text-align:center; display:block;">Lote em negocia&ccedil;&atilde;o</h1>
        <div style="margin-top:20px; padding:20px;">
          <div style="padding:40px;">
          <h2>Um lote foi atualizado!</h2>

          <p style="margin-top:15px;"><strong><?=Util::formataTexto($imovel->empreendimento.'/'.$imovel->nome)?><strong></p>
          <h3><?=$historico->getTexto()?></h3>
          <?php
            if($historico->mostraDados()){
          ?>
            <p style="margin-top:15px;">Confira os dados:</p>
            <p style="margin-top:15px;"><strong>Corretor:</strong> <?=Util::formataTexto($reserva->corretor->nome)?></p>
            <p style="margin-top:15px;"><strong><?=Util::formataTexto($reserva->imovel->empreendimento->nome.' - '.$reserva->imovel->nome)?></strong></p>
            <p><strong>Nome:</strong> <?=Util::formataTexto($reserva->nome)?></p>
            <p><strong>Telefone:</strong> <?=Util::formataTexto($reserva->telefone)?></p>
            <p><strong>Email:</strong> <?=Util::formataTexto($reserva->email)?></p>
            <p><strong>CPF/CNPJ:</strong> <?=Util::formataTexto($reserva->cpf_cnpj)?></p>
            <p><strong>Observções:</strong> <?=Util::formataTexto($reserva->observacoes)?></p>
          <?php
            }
          ?>          
        </div>
      </div>
      <br />
    </div>
    <div style="margin-top:20px;font-size: 12px; color: #333; line-height: 20px; text-align:center"> <a href="http://www.loteamento.digital" target="_blank" class="logo_popup"><img src="http://www.loteamento.digital/divulgacao/email_footer.png" alt="loteamento Sites e Sistemas"/></a>
      <div style="margin-top:10px;font-size: 12px; line-height: 20px;"><strong>D&uacute;vidas ou suporte</strong></div>
      <div style="margin-top:10px;font-size: 12px; line-height: 20px;"><a href="mailto:atendimento@loteamento.digital" style="color: #555;">atendimento@loteamento.digital</a></div>
      <div style="margin-top:10px;font-size: 12px; line-height: 20px;"><a href="http://www.loteamento.digital" target="_blank" style="color: #555;">www.loteamento.digital</a></div>
    </div>
  </div>
</div>
</body>
</html>
