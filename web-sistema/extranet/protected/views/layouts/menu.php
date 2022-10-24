<div class="left-side-menu">
	<div class="slimscroll-menu">
		<!--- Sidemenu -->
		<div id="sidebar-menu">
			<ul class="metismenu" id="side-menu">
				<li class="menu-title">Navigation</li>
				<?php /* ?>
          <li>
            <a href="javascript: void(0);" class="waves-effect">
              <i class="ion-md-speedometer"></i>
              <span> Dashboard </span>
              <span class="badge badge-info badge-pill float-right"> 3 </span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
              <li><a href="index.html">Dashboard 1</a></li>
              <li><a href="dashboard-2.html">Dashboard 2</a></li>
              <li><a href="dashboard-3.html">Dashboard 3</a></li>
            </ul>
          </li>
          <?php */ ?>

				<?php /* ?>
          <li>
            <a href="javascript: void(0);" class="waves-effect">
              <i class="ion-md-basket"></i>
              <span> UI Elements </span>
              <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
  
              <li><a href="ui-typography.html">Typography</a></li>
              <li><a href="ui-buttons.html">Buttons</a></li>
            </ul>
          </li>
          <?php */ ?>

				<?php
				if (Yii::app()->user->obj->group->temPermissaoAction('plano', 'index')) {
				?>
					<li>
						<a href="<?= $this->createUrl('plano/index'); ?>">
							<i class="ion ion-logo-usd"></i>
							<span> Planos</span>
						</a>
					</li>
				<?
				}
				?>

				<?php
				if (Yii::app()->user->obj->group->temPermissaoAction('cliente', 'index')) {
				?>
					<li>
						<a href="<?= $this->createUrl('cliente/index'); ?>">
							<i class=" ion ion-ios-person"></i>
							<span> Clientes </span>
						</a>
					</li>
				<?
				}
				?>

				<li>
					<a href="javascript: void(0);" class="waves-effect">
						<i class=" ion ion-md-map"></i>
						<span> Quadras </span>
						<span class="menu-arrow"></span>
					</a>
					<ul class="nav-second-level" aria-expanded="false">
						<?php
						if (Yii::app()->user->obj->group->temPermissaoAction('empreendimento', 'index')) {
						?>
							<li><a href="<?= $this->createUrl('empreendimento/index'); ?>">Quadras</a></li>
						<?
						}
						if (Yii::app()->user->obj->group->temPermissaoAction('imovel', 'index')) {
						?>

							<li><a href="<?= $this->createUrl('imovel/index'); ?>">Lotes</a></li>
						<?
						}
						if (Yii::app()->user->obj->group->temPermissaoAction('imovel', 'negociacao')) {
						?>

							<li><a href="<?= $this->createUrl('imovel/negociacao'); ?>">Lotes em negociação</a></li>
						<?
						}
						if (Yii::app()->user->obj->group->temPermissaoAction('imovel', 'reservas')) {
						?>

							<li><a href="<?= $this->createUrl('imovel/reservas'); ?>">Segunda Reserva</a></li>
						<?
						}
						?>
					</ul>
				</li>

				<?php
				if (Yii::app()->user->obj->group->temPermissaoAction('corretor', 'index')) {
				?>
					<li>
						<a href="<?= $this->createUrl('corretor/index'); ?>">
							<i class=" ion ion-ios-person"></i>
							<span> Corretores </span>
						</a>
					</li>
				<?
				}


				if (Yii::app()->user->obj->group->temPermissaoAction('aviso', 'index')) {
				?>
					<li>
						<a href="<?= $this->createUrl('aviso/index'); ?>">
							<i class=" ion ion-md-alert"></i>
							<span> Avisos </span>
						</a>
					</li>
				<?
				}
				if (Yii::app()->user->obj->group->temPermissaoAction('destaque', 'index')) {
				?>
					<li>
						<a href="<?= $this->createUrl('destaque/index'); ?>">
							<i class=" ion ion-md-star"></i>
							<span> Destaques </span>
						</a>
					</li>
				<?
				}
				if (Yii::app()->user->obj->group->temPermissaoAction('arquivo', 'index')) {
				?>
					<li>
						<a href="javascript: void(0);" class="waves-effect">
							<i class="ion ion-md-folder-open"></i>
							<span> Arquivos </span>
							<span class="menu-arrow"></span>
						</a>
						<ul class="nav-second-level" aria-expanded="false">
							<?
							if (Yii::app()->user->obj->group->temPermissaoAction('arquivoCategoria', 'index')) {
							?>
								<li><a href="<?= $this->createUrl('arquivoCategoria/index'); ?>">Categorias</a></li>
							<?
							}
							if (Yii::app()->user->obj->group->temPermissaoAction('arquivo', 'index')) {
							?>
								<li><a href="<?= $this->createUrl('arquivo/index'); ?>">Arquivos</a></li>
							<?
							}
							?>
						</ul>
					</li>
				<?
				}
				if (Yii::app()->user->obj->group->temPermissaoAction('contato', 'index')) {
				?>
					<li>
						<a href="<?= $this->createUrl('contato/index'); ?>">
							<i class=" ion ion-md-mail"></i>
							<span> Contato </span>
						</a>
					</li>
				<?
				}
				?>

			</ul>

		</div>
		<!-- End Sidebar -->

		<div class="clearfix"></div>

	</div>
	<!-- Sidebar -left -->

</div>