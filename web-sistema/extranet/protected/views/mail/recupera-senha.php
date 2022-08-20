<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Recuperação de senha</title>
<style type="text/css">body,td,th { font-family: Arial, Helvetica, sans-serif; color: #555; font-size: 12px; }body { margin: 0px; background: #f3f3f3; }td { padding: 15px; border-bottom: 1px dashed #000 }.fundo { background: #f7f7f7; }</style></head>
</head>
<body>
<div style="width:100%;">
  <div style="width:750px; margin-left:auto; margin-right:auto;">
    <div>
      <div style="margin-top:30px; text-align:center;"><a href="http://www.loteamento.digital" target="_blank"><img src="http://www.loteamento.digital/divulgacao/email_header.png" alt="Loteamento Digital"/></a></div>
      <div style="margin-top:30px">
        <h1 style="color: #555; font-size:16px; text-align:center; display:block;">Recuperação de senha</h1>
        <div style="padding:40px;">
          <h2>Recuperação de senha!</h2>
          <p>Olá <strong><?=Util::formataTexto($usuario->nome)?></strong>, recebemos sua solicitação para recuperação de senha.</p>
          <p style="margin-top:40px;">Acesse o link abaixo e informe uma nova senha. <br> <br>
          <a href="<?= $this->createAbsoluteUrl('/') . "/recupera-senha?token=".$usuario_recupera_senha->token; ?>" style="background:#ff6d38; font-weight: 800; padding: 10px 20px; border-radius: 5px;color:#fff; text-decoration: none; ">Alterar senha</a>
          </p>
          <p style="margin-top:20px;">
          <i>Este link para a altera&ccedil;&atilde;o da senha estar&aacute; dispon&iacute;vel at&eacute; <?=$usuario_recupera_senha->data_validade;?></i>
          </p>
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
