<header>
  <div class="row-fluid">
    <nav class="nav-icons">
      <div class="logo_cliente"><a href="<?php echo Yii::app()->request->baseUrl; ?>/site"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_menu.png" alt=""/></a></div>
      <div class="menu_pop">
        <?
          if ( Yii::app()->user->obj->group->temPermissaoAction( 'interesse', 'index' ) ) {
        ?>
          <a href="<?=$this->createUrl('interesse/index');?>"><i class="fa fa-lg fa-caret-right"></i><span>Interesse</span></a>
        <?
          } if ( Yii::app()->user->obj->group->temPermissaoAction( 'newsletter', 'index' ) ) {
        ?>
          <a href="<?=$this->createUrl('newsletter/index');?>"><i class="fa fa-lg fa-caret-right"></i><span>Newsletter</span></a>
        <?
          } if ( Yii::app()->user->obj->group->temPermissaoAction( 'contato', 'index' ) ) {
        ?>
          <a href="<?=$this->createUrl('contato/index');?>"><i class="fa fa-lg fa-caret-right"></i><span>Contato</span></a>
        <?
          }
        ?>
      </div>
      <div class="menu_suporte"> D&uacute;vidas ou suporte <a href="mailto:atendimento@alavanca.digital">atendimento@alavanca.digital</a> <a href="http://www.alavanca.digital" target="_blank">www.alavanca.digital</a> </div>
    </nav>
  </div>
</header>
