<div class="container container-1200">
  <div class="colunas col-4"> <a href="terrenos" class="logo">
    <?php
    if ( $cliente_sessao ) {
      ?>
    <img src="extranet/uploads/Cliente/<?=$cliente_sessao->logomarca;?>"  alt="<?=$cliente_sessao->titulo?>" width="100%"/>
    <?php
    } else {
      ?>
    <img src="img/logo_sistema.png" alt="Loteamento Digital"/>
    <?php
    }
    ?>
    </a> </div>
  <div class="colunas col-3">
    <?php
    if ( $cliente_sessao ) {
      echo $cliente_sessao->titulo;
    }
    ?>
    <br>
    <a href="cliente" >ALTERNAR</a> </div>
  <div class="colunas col-16">
    <?php include ("menu.php");?>
  </div>
  <div class="clear"></div>
</div>
