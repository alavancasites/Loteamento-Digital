<?
$model = new Contato();
if ( is_array( $_POST[ 'Contato' ] ) ) {
  $model->attributes = $_POST[ 'Contato' ];
  $model->data = date( 'd/m/Y H:i:s' );
  $model->ip = $_SERVER[ 'REMOTE_ADDR' ];

  if ( $model->save() ) {
    $model = new Contato();
    $sucesso = 1;
    header( "Location: planos?sucesso=1" );
  }
}
$erro = CHtml::errorSummary( $model );
$form = new CActiveForm();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Loteamento Digital | Planos</title>
<?php include("header.php"); ?>
<style type="text/css"><?php echo file_get_contents('css/formularios.css');?></style>
</head>
<body>
<div id="wrapper" class="planos">
  <div id="topo">
    <?php include("topo.php"); ?>
    <div class="header-planos">
      <div class="container">
        <section class="colunas col-20 texto-header">
          <h3>Ficou interessado?</h3>
          <h2>Escolha o plano<br />
            <strong>certo para voc&ecirc;</strong> </h2>
          <p> Comece hoje mesmo a profissionalizar a gest&atilde;o do seu loteamento.
            Nossa plataforma foi pensada para agilizar e facilitar o seu dia. </p>
          <p>Inicial &raquo; Planos</p>
        </section>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <div id="conteudo">
    <div class="container">
      <section class="itens-planos">
        <div class="item-pacote colunas col-5">
          <h3>Gr&aacute;tis</h3>
          <p>Indicado para pequenos loteamentos.</p>
          <span id="dont-show">N&atilde; aparece</span>
          <h3><strong>R$0</strong></h3>
          <p>at&eacute; 10 lotes*</p>
          <p>at&eacute; 10 corretores*</p>
          <a href="contato" class="btn">Contratar</a>
          <div class="clear"></div>
        </div>
        <div class="item-pacote colunas col-5">
          <h3>Iniciante</h3>
          <p>Indicado para loteamentos pequenos.</p>
          <h3><strong>R$149,90</strong></h3>
          <p>at&eacute; 80 lotes*</p>
          <p>at&eacute; 50 corretores*</p>
          <a href="contato" class="btn">Contratar</a>
          <div class="clear"></div>
        </div>
        <div class="item-pacote destaque colunas col-5">
          <h3>B&aacute;sico</h3>
          <p>Indicado para loteamentos m&eacute;dios.</p>
          <h3><strong>R$249,90</strong></h3>
          <p>at&eacute; 200 lotes*</p>
          <p>at&eacute; 90 corretores*</p>
          <a href="contato" class="btn btn-destaque">Contratar</a>
          <div class="clear"></div>
        </div>
        <div class="item-pacote colunas col-5">
          <h3>Avan&ccedil;ado</h3>
          <p>Indicado para grandes loteamentos.</p>
          <span id="dont-show">N&atilde;o aparece</span>
          <h3><strong>R$399,90</strong></h3>
          <p>at&eacute; 700 lotes*</p>
          <p>at&eacute; 200 corretores*</p>
          <a href="contato" class="btn">Contratar</a>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="colunas col-20 aviso">* casa os limites sejam ultrapassados, o sistema automaticamente ir&aacute; migrar para o pr&oacute;ximo plano.</div>
      </section>
      <section class="tabela-planos">
        <div class="container">
          <div class="colunas col-20">
            <h3>Funcionalidades</h3>
            <h2>Veja todos os m&oacute;dulos da nossa plataforma</h2>
            <div class="clear"></div>
          </div>
          <div class="colunas col-20 tabela">
            <table>
              <thead>
                <tr>
                  <th style="visibility: hidden" class="categoria">Categoria</th>
                  <th>Gr&aacute;tis</th>
                  <th>Iniciante</th>
                  <th class="destaque">B&aacute;sico
                    <p>Mais vendido</p>
                  </th>
                  <th>Avan&ccedil;ado</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-label="Categoria">Lotes</td>
                  <td data-label="Gr&aacute;tis">at&eacute; 10 lotes</td>
                  <td data-label="Iniciante">at&eacute; 80 lotes</td>
                  <td data-label="B&aacute;sico">at&eacute; 200 lotes</td>
                  <td data-label="Avan&ccedil;ado">at&eacute; 700 lotes</td>
                </tr>
                <tr>
                  <td data-label="Categoria">Corretores</td>
                  <td data-label="Gr&aacute;tis">at&eacute; 2 corretores</td>
                  <td data-label="Iniciante">at&eacute; 50 corretores</td>
                  <td data-label="B&aacute;sico">at&eacute; 90 corretores</td>
                  <td data-label="Avan&ccedil;ado">at&eacute; 200 corretores</td>
                </tr>
                <tr>
                  <td data-label="Categoria">Hospedagem</td>
                  <td data-label="Gr&aacute;tis">Nuvem</td>
                  <td data-label="Iniciante">Nuvem</td>
                  <td data-label="B&aacute;sico">Nuvem</td>
                  <td data-label="Avan&ccedil;ado">Nuvem</td>
                </tr>
                <tr>
                  <td data-label="Categoria">Treinamento</td>
                  <td data-label="Gr&aacute;tis">-</td>
                  <td data-label="Iniciante">Coletivo</td>
                  <td data-label="B&aacute;sico">Coletivo</td>
                  <td data-label="Avan&ccedil;ado">Coletivo e/ou Individual</td>
                </tr>
                <tr>
                  <td data-label="Categoria">Personaliza&ccedil;&atilde;o visual</td>
                  <td data-label="Gr&aacute;tis">-</td>
                  <td data-label="Iniciante">B&aacute;sica</td>
                  <td data-label="B&aacute;sico">B&aacute;sica</td>
                  <td data-label="Avan&ccedil;ado">Avan&ccedil;ada</td>
                </tr>
                <tr>
                  <td data-label="Categoria">Acesso ao sistema</td>
                  <td data-label="Gr&aacute;tis">Compartilhado</td>
                  <td data-label="Iniciante">Compartilhado</td>
                  <td data-label="B&aacute;sico">Compartilhado</td>
                  <td data-label="Avan&ccedil;ado">Compartilhado</td>
                </tr>
                <tr>
                  <td data-label="Categoria">Cadastro de clientes</td>
                  <td data-label="Gr&aacute;tis">Sim</td>
                  <td data-label="Iniciante">Sim</td>
                  <td data-label="B&aacute;sico">Sim</td>
                  <td data-label="Avan&ccedil;ado">Sim</td>
                </tr>
                <tr>
                  <td data-label="Categoria">Relat&oacute;rios</td>
                  <td data-label="Gr&aacute;tis">-</td>
                  <td data-label="Iniciante">-</td>
                  <td data-label="B&aacute;sico">-</td>
                  <td data-label="Avan&ccedil;ado">Sim</td>
                </tr>
                <tr>
                  <td data-label="Categoria">Desenv. de novos recursos</td>
                  <td data-label="Gr&aacute;tis">-</td>
                  <td data-label="Iniciante">-</td>
                  <td data-label="B&aacute;sico">-</td>
                  <td data-label="Avan&ccedil;ado">Sim</td>
                </tr>
                <tr>
                  <td data-label="Categoria">Visualiza&ccedil;&atilde;o do Google Maps</td>
                  <td data-label="Gr&aacute;tis">-</td>
                  <td data-label="Iniciante">-</td>
                  <td data-label="B&aacute;sico">-</td>
                  <td data-label="Avan&ccedil;ado">Sim</td>
                </tr>
                <tr>
                  <td data-label="Categoria">Avisos personalizados</td>
                  <td data-label="Gr&aacute;tis">-</td>
                  <td data-label="Iniciante">-</td>
                  <td data-label="B&aacute;sico">Sim</td>
                  <td data-label="Avan&ccedil;ado">Sim</td>
                </tr>
                <tr>
                  <td data-label="Categoria">Materiais para download</td>
                  <td data-label="Gr&aacute;tis">-</td>
                  <td data-label="Iniciante">-</td>
                  <td data-label="B&aacute;sico">Sim</td>
                  <td data-label="Avan&ccedil;ado">Sim</td>
                </tr>
                <tr>
                  <td data-label="Categoria">Suporte t&eacute;cnico</td>
                  <td data-label="Gr&aacute;tis">E-mail</td>
                  <td data-label="Iniciante">E-mail</td>
                  <td data-label="B&aacute;sico">E-mail + Whatsapp</td>
                  <td data-label="Avan&ccedil;ado">E-mail + Whatsapp + Telefone</td>
                </tr>
                <tr>
                  <td data-label="Categoria">Chat online</td>
                  <td data-label="Gr&aacute;tis">-</td>
                  <td data-label="Iniciante">-</td>
                  <td data-label="B&aacute;sico">-</td>
                  <td data-label="Avan&ccedil;ado">Em breve</td>
                </tr>
                <tr>
                  <td data-label="Categoria">Novas fun&ccedil;&otilde;es</td>
                  <td data-label="Gr&aacute;tis">-</td>
                  <td data-label="Iniciante">Sim</td>
                  <td data-label="B&aacute;sico">Sim</td>
                  <td data-label="Avan&ccedil;ado">Sim</td>
                </tr>
                <tr>
                  <td data-label="Categoria" id="mensalidade-td">Mensalidade</td>
                  <td data-label="Gr&aacute;tis" id="mensalidade"><h3><strong>R$0</strong></h3></td>
                  <td data-label="Iniciante" id="mensalidade"><h3><strong>R$149,90</strong></h3></td>
                  <td data-label="B&aacute;sico" id="mensalidade"><h3><strong>R$249,90</strong></h3></td>
                  <td data-label="Avan&ccedil;ado" id="mensalidade"><h3><strong>R$399,90</strong></h3></td>
                </tr>
                <tr>
                  <td data-label="Categoria" id="plano-anual-td">Plano anual</td>
                  <td colspan="4" id="plano-anual">Desconto de duas mensalidades em qualquer plano.</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="clear"></div>
      </section>
      <div class="clear"></div>
    </div>
  </div>
  <section class="chamada-planos">
    <div class="container">
      <div class="colunas col-10 chamada-laranja">
        <article>
          <h4>Acabe com os milhares de emails e conversas via whatsapp com propostas, informa&ccedil;&otilde;es e contratos de vendas.</h4>
          <p>Fique informado e gerencie todas as reservas, contratos e vendas do seu loteamento atrav&eacute;s de um painel f&aacute;cil, &aacute;gil e intuitivo.</p>
          <p>Visualize relat&oacute;rios com as principais informa&ccedil;&otilde;es do loteamento, como quem vendeu mais, valor em vendas geradas e muito mais.</p>
        </article>
      </div>
      <?php /*?>
<article class="colunas col-10 chamada-branca">
  <h4>Contrate agora</h4>
  <h3>Profissionalize as vendas e gest&atilde;o do seu loteamento</h3>
  <form id="form-apresentacao" action="" method="">
    <input type="text" name="nome-apresentacao" id="nome-apresentacao" placeholder="Nome" required>
    <input type="text" name="email-apresentacao" id="email-apresentacao" placeholder="E-mail" required>
    <input type="text" name="telefone-apresentacao" id="telefone-apresentacao" placeholder="Telefone">
    <input type="text" name="empresa-apresentacao" id="empresa-apresentacao" placeholder="Empresa">
    <input type="text" name="cargo-apresentacao" id="cargo-apresentacao" placeholder="Cargo">
    <button type="submit" class="bt-form" id="bt-apresentacao">Solicitar uma apresenta&ccedil;&atilde;o</button>
  </form>
</article>
      <?php */?>
      <div class="contato">
        <article class="colunas col-10 chamada-branca">
          <h4>Contrate agora</h4>
          <h3>Profissionalize as vendas e gest&atilde;o do seu loteamento</h3>
          <div class="form-contato">
            <?
            if ( !empty( $erro ) ) {
              ?>
            <div class="error margin20">
              <?=$erro;?>
            </div>
            <?
            }
            if ( $_GET[ 'sucesso' ] == 1 ) {
              ?>
            <div class="sucesso_msg">Contato enviado com sucesso. Obrigado!</div>
            <?
            }
            ?>
            <form id="form-contato" name="form1" method="post" action="planos">
              <input type="hidden"  name="grava" value="1" />
              <?php echo $form->textField($model,'nome',array('class'=>'','maxlength'=>100,'placeholder'=>$model->getAttributeLabel('nome'))); ?> <?php echo $form->textField($model,'email',array('class'=>'','maxlength'=>100,'placeholder'=>$model->getAttributeLabel('email'))); ?> <?php echo $form->textField($model,'telefone',array('class'=>'','maxlength'=>100,'placeholder'=>$model->getAttributeLabel('telefone'))); ?> <?php echo $form->textField($model,'empresa',array('class'=>'','maxlength'=>100,'placeholder'=>$model->getAttributeLabel('empresa'))); ?>
              <div class="clear"></div>
              <div class="footer-form-contato">
                <ul>
                  <div class="colunas-checkbox">
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
              </div>
              <div class="bt-form-contato">
                <button type="submit" class="bt-form" id="bt-contato">Enviar mensagem</button>
              </div>
            </form>
          </div>
        </article>
      </div>
      <div class="clear"></div>
    </div>
  </section>
  <section id="chamadas">
    <div class="chamada-cinza">
      <div class="container chamada-contato">
        <div class="colunas col-3"> <img src="img/func_demonstracao.png" alt="SMS Celular">
          <div class="clear"></div>
        </div>
        <div class="colunas col-11">
          <h3>Acabe com os milhares de e-mails e mensagens</h3>
          <h2>Entre em contato conosco e agende <strong>uma demonstra&ccedil;&atilde;o da plataforma.</strong></h2>
          <div class="clear"></div>
        </div>
        <div class="colunas col-6"> <a href="contato" class="btn btn-azul">Agende uma demonstra&ccedil;&atilde;o</a>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </section>
  <div id="rodape">
    <?php include("rodape.php"); ?>
  </div>
</div>
<?php include("scripts.php"); ?>
</body>
</html>