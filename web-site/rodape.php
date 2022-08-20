<footer class="container">
	<div class="footer-form">
		<div class="colunas col-5">
			<h3>Fique informado</h3>
			<h2>Receba nossas novidades</h2>
		</div>
		<div class="colunas col-15">
      <div id="newsletter_envia">
        <form id="newsletter_form" name="form-rodape" method="post" action="newsletter_envia.php">
          <input name="nome" type="text" id="nome" placeholder="Nome" class="colunas col-5"/>
          <input name="email" type="text" id="email" placeholder="E-mail" class="colunas col-5"/>
          <button type="submit" id="bt-rodape" class="bt-form">Receber novidades</button>
        </form>
      </div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="footer-menu">
		<div class="colunas col-6">
			<h2><a href="inicial">Loteamento Digital</a></h2>
		</div>
		<div class="clear"></div>
		<div class="colunas col-14">
			<ul>
				<li><a href="funcionalidades">Funcionalidades</a></li>
				<li><a href="planos">Planos</a></li>
				<?php /*?><li><a href="servicos">Servi&ccedil;os</a></li><?php */?> 
				<li><a href="contato">Contato</a></li>
				<li><a href="politica-de-privacidade">Pol&iacute;tica de Privacidade</a></li>
				<li><a href="termos-de-uso">Termos de uso</a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	<div class="footer-creditos"><h4>Loteamento<strong>.Digital </strong><?php auto_copyright(); ?></h4></div>
</footer>
<?php
function auto_copyright($startYear = null)
{
	$thisYear = date('Y');
	if (!is_numeric($startYear)) {
		$year = $thisYear;
	} else {
		$year = intval($startYear);
	}
	if ($year == $thisYear || $year > $thisYear) {
		echo "&copy; $thisYear - Todos os direitos reservados.";
	} else {
		echo "&copy; $year&ndash;$thisYear - Todos os direitos reservados.";
	}
}
?>