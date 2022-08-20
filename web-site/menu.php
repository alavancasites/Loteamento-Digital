<? $linkMenu = str_replace(explode("/", ""), "", current(explode("?", $_SERVER['REQUEST_URI']))); ?>
<div id="icon-lateral"><i class="icon-menu"></i><i class="icon-close"></i></div>
<nav class="menuLinks" id="menu_principal">
  <a href="inicial" <?= (strpos($linkMenu, "inicial") !== false ? "class='ativado'" : "") ?>>Inicial</a>
  <a href="funcionalidades" <?= (strpos($linkMenu, "funcionalidades") !== false ? "class='ativado'" : "") ?>>Funcionalidades</a>
  <a href="planos" <?= (strpos($linkMenu, "planos") !== false ? "class='ativado'" : "") ?>>Planos</a>
  <?php /*?><a href="servicos" <?= (strpos($linkMenu, "servicos") !== false ? "class='ativado'" : "") ?>>Servi&ccedil;os</a> 
  <a href="parceiros" <?= (strpos($linkMenu, "parceiros") !== false ? "class='ativado'" : "") ?>>Parceiros</a> <?php */?>
  <a href="contato" <?= (strpos($linkMenu, "contato") !== false ? "class='ativado'" : "") ?>>Contato</a>
  <section class="botoes-menu">
    <a href="contato" class="btn">Solicite uma apresenta&ccedil;&atilde;o</a>
    <?php /*?><a href="login" class="btn btn-branco">Login</a><?php */?>
  </section>
</nav>