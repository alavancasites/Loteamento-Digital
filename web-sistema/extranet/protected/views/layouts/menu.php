<header>
  <div class="row-fluid">
    <nav class="nav-icons">
      <div class="logo_cliente"><a href="<?php echo Yii::app()->request->baseUrl; ?>/site"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_menu.png" alt=""/></a></div>
      <div class="menu_pop">
        <?php
        if ( Yii::app()->user->obj->group->temPermissaoAction( 'plano', 'index' ) ) {
          ?>
        <a href="<?=$this->createUrl('plano/index');?>"><i class="fa fa-lg fa-suitcase"></i><span>Planos</span></a>
        <?
        }
        if ( Yii::app()->user->obj->group->temPermissaoAction( 'cliente', 'index' ) ) {
          ?>
        <a href="<?=$this->createUrl('cliente/index');?>"><i class="fa fa-lg fa-user"></i><span>Clientes</span></a>
        <?
        }
        ?>
        <div class="submenu accordion-group">
          <div class="accordion-heading"> <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1"><i class="fa fa-lg"></i><span>Quadras</span></a> </div>
          <div id="collapseOne1" class="accordion-body collapse" style="height: 0px;">
            <?

            if ( Yii::app()->user->obj->group->temPermissaoAction( 'empreendimento', 'index' ) ) {
              ?>
            <a class="fa fa-lg fa-filter" href="<?=$this->createUrl('empreendimento/index');?>"><span>Quadras</span></a>
            <?
            }
            if ( Yii::app()->user->obj->group->temPermissaoAction( 'imovel', 'index' ) ) {
              ?>
            <a class="fa fa-lg fa-user" href="<?=$this->createUrl('imovel/index');?>"><span>Lotes</span></a>
            <?
            }
            if ( Yii::app()->user->obj->group->temPermissaoAction( 'imovel', 'negociacao' ) ) {
              ?>
            <a class="fa fa-lg fa-user" href="<?=$this->createUrl('imovel/negociacao');?>"><span>Lotes em negociação</span></a>
            <?
            }
            if ( Yii::app()->user->obj->group->temPermissaoAction( 'imovel', 'reservas' ) ) {
              ?>
            <a class="fa fa-lg fa-user" href="<?=$this->createUrl('imovel/reservas');?>"><span>Segunda Reserva</span></a>
            <?
            }
            ?>
          </div>
        </div>
        <?
        if ( Yii::app()->user->obj->group->temPermissaoAction( 'corretor', 'index' ) ) {
          ?>
        <a href="<?=$this->createUrl('corretor/index');?>"><i class="fa fa-lg fa-user"></i><span>Corretores</span></a>
        <?
        }

        if ( Yii::app()->user->obj->group->temPermissaoAction( 'aviso', 'index' ) ) {
          ?>
        <a href="<?=$this->createUrl('aviso/index');?>"><i class="fa fa-lg fa-bullhorn"></i><span>Avisos</span></a>
        <?
        }
        if ( Yii::app()->user->obj->group->temPermissaoAction( 'destaque', 'index' ) ) {
          ?>
        <a href="<?=$this->createUrl('destaque/index');?>"><i class="fa fa-lg fa-star"></i><span>Destaques</span></a>
        <?
        }
        if ( Yii::app()->user->obj->group->temPermissaoAction( 'arquivo', 'index' ) ) {
          ?>
        <div class="submenu accordion-group">
          <div class="accordion-heading"> <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#collapseOne2" href="#collapseOne2"><i class="fa fa-lg fa-files-o"></i><span>Arquivos</span></a> </div>
          <div id="collapseOne2" class="accordion-body collapse" style="height: 0px;">
            <?
            if ( Yii::app()->user->obj->group->temPermissaoAction( 'arquivoCategoria', 'index' ) ) {
              ?>
            <a class="fa fa-lg fa-filter" href="<?=$this->createUrl('arquivoCategoria/index');?>"><span>Categorias</span></a>
            <?
            }
            if ( Yii::app()->user->obj->group->temPermissaoAction( 'arquivo', 'index' ) ) {
              ?>
            <a class="fa fa-lg fa-files-o" href="<?=$this->createUrl('arquivo/index');?>"><span>Arquivos</span></a>
            <?
            }
            ?>
          </div>
        </div>
        <?
        }
        if ( Yii::app()->user->obj->group->temPermissaoAction( 'contato', 'index' ) ) {
          ?>
        <a href="<?=$this->createUrl('contato/index');?>"><i class="fa fa-lg fa-envelope"></i><span>Contato</span></a>
        <?
        }

        ?>
      </div>
      <div class="menu_suporte"> D&uacute;vidas ou suporte <a href="mailto:atendimento@alavanca.digital">atendimento@alavanca.digital</a> <a href="http://www.alavanca.digital" target="_blank">www.alavanca.digital</a> </div>
    </nav>
  </div>
</header>
