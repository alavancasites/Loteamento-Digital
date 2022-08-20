<?
  Utf8::decode($_POST);
  $newsletter = new Newsletter();
  $newsletter->data = date('d/m/Y H:i:s');
  $newsletter->ip = $_SERVER['REMOTE_ADDR'];
  $newsletter->nome = $_POST['nome'];
  $newsletter->email = $_POST['email'];
  if($newsletter->save()){
?>
  <div class="sucesso_msg mt20">E-mail cadastrado com sucesso.<br/>Obrigado.</div>
<?
  }else{
	 CHtml::errorSummary($newsletter);
  }
?>