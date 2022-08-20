<?
  $linkMenu = str_replace(explode("/",""),"",current(explode("?",$_SERVER['REQUEST_URI'])));
?>
<div id="menu">
  <div class="menuButton">Menu</div>
  <div class="menuLinks">
    <a href="destaques" <?=(strpos($linkMenu,"destaques")!==false?"class='ativado'":"")?>>DESTAQUES</a>
    <a href="terrenos" <?=(strpos($linkMenu,"terrenos")!==false?"class='ativado'":"")?>>TERRENOS</a>
    <a href="perfil" <?=(strpos($linkMenu,"perfil")!==false?"class='ativado'":"")?>>MEU PERFIL</a>
    <a href="reservados" <?=(strpos($linkMenu,"reservados")!==false?"class='ativado'":"")?>>MINHAS RESERVAS</a>
    <a href="downloads" <?=(strpos($linkMenu,"downloads")!==false?"class='ativado'":"")?>>DOWNLOADS</a>
    <a href="favoritos" <?=(strpos($linkMenu,"favoritos")!==false?"class='ativado'":"")?>>FAVORITOS</a>
    <a href="sair">SAIR</a>
  </div>
</div>
