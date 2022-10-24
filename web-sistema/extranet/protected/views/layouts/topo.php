<div class="navbar-custom">
	<ul class="list-unstyled topnav-menu float-right mb-0">
		<?php
		if (Yii::app()->user->obj->group->temPermissaoAction('user', 'index') || Yii::app()->user->obj->group->temPermissaoAction('userGroup', 'index')) {
		?>
			<li class="dropdown notification-list">
				<a class="nav-link dropdown-toggle mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="true">
					<i class="mdi mdi-settings-outline noti-icon"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right profile-dropdown ">


					<!-- item-->
					<?php
					if (Yii::app()->user->obj->group->temPermissaoAction('userGroup', 'index')) {
					?>
						<a href="<?= $this->createUrl('userGroup/index'); ?>" class="dropdown-item notify-item">
							<i class="mdi mdi-account-outline"></i> <span>Perfis</span>
						</a>
					<?php
					}
					if (Yii::app()->user->obj->group->temPermissaoAction('user', 'index')) {
					?>
						<!-- item-->
						<a href="<?= $this->createUrl('user/index'); ?>" class="dropdown-item notify-item">
							<i class="mdi mdi-account-outline"></i> <span>Usuários</span>
						</a>
					<?php
					}
					?>
				</div>
			</li>
		<?php
		}
		?>

		<li class="dropdown notification-list">
			<a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
				<i class="mdi mdi-email-outline noti-icon"></i>
				<span class="badge badge-purple rounded-circle noti-icon-badge">3</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right dropdown-lg">

				<!-- item-->
				<div class="dropdown-item noti-title">
					<h5 class="font-16 m-0">
						<span class="float-right">
							<a href="" class="text-dark">
								<small>Clear All</small>
							</a>
						</span>Chat
					</h5>
				</div>

				<div class="slimscroll noti-scroll">

					<div class="inbox-widget">
						<a href="#">
							<div class="inbox-item">
								<div class="inbox-item-img"><img src="template/images/users/avatar-1.jpg" class="rounded-circle" alt=""></div>
								<p class="inbox-item-author">Cristina Pride</p>
								<p class="inbox-item-text text-truncate">Hi, How are you? What about our next meeting</p>
							</div>
						</a>

					</div> <!-- end inbox-widget -->

				</div>
				<!-- All-->
				<a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
					View all
					<i class="fi-arrow-right"></i>
				</a>

			</div>
		</li>

		<li class="dropdown notification-list">
			<a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
				<i class="mdi mdi-bell-outline noti-icon"></i>
				<span class="badge badge-pink rounded-circle noti-icon-badge">4</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right dropdown-lg">

				<!-- item-->
				<div class="dropdown-item noti-title">
					<h5 class="font-16 m-0">
						<span class="float-right">
							<a href="" class="text-dark">
								<small>Clear All</small>
							</a>
						</span>Notification
					</h5>
				</div>

				<div class="slimscroll noti-scroll">

					<!-- item-->
					<a href="javascript:void(0);" class="dropdown-item notify-item">
						<div class="notify-icon">
							<i class="mdi mdi-comment-account-outline text-info"></i>
						</div>
						<p class="notify-details">Caleb Flakelar commented on Admin
							<small class="noti-time">1 min ago</small>
						</p>
					</a>


				</div>

				<!-- All-->
				<a href="javascript:void(0);" class="dropdown-item text-center notify-item notify-all">
					See all notifications
				</a>

			</div>
		</li>

		<li class="dropdown notification-list">
			<a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
				<img src="template/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
				<span class="pro-user-name ml-1">
					<?= Yii::app()->user->obj->name ?> <i class="mdi mdi-chevron-down"></i>
				</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
				<!-- item-->
				<div class="dropdown-header noti-title">
					<h6 class="text-overflow m-0">Bem vindo!</h6>
				</div>

				<!-- item-->
				<?php 
				if(Yii::app()->user->obj->group->temPermissaoAction('user','me')){
					?>
					  <a href="<?=$this->createUrl('user/me');?>" class="dropdown-item notify-item">
					<i class="mdi mdi-account-outline"></i>
					<span>Meus dados</span>
				</a>
					<?
					  }?>
				

				<?php /* ?>
					<!-- item-->
					<a href="javascript:void(0);" class="dropdown-item notify-item">
						<i class="mdi mdi-settings-outline"></i>
						<span>Settings</span>
					</a>
	
					<!-- item-->
					<a href="javascript:void(0);" class="dropdown-item notify-item">
						<i class="mdi mdi-lock-outline"></i>
						<span>Lock Screen</span>
					</a>
					<?php */ ?>

				<div class="dropdown-divider"></div>

				<!-- item-->
				<a href="<?= Yii::app()->baseUrl . '/logout'; ?>" class="dropdown-item notify-item">
					<i class="mdi mdi-logout-variant"></i>
					<span>Sair</span>
				</a>

			</div>
		</li>




	</ul>

	<!-- LOGO -->
	<div class="logo-box">


		<a href="<?php echo Yii::app()->request->baseUrl; ?>/site" class="logo text-center logo-light">
			<span class="logo-lg">
				<img src="img/topo_sistema.png" class="img-fluid" alt="">
				<!-- <span class="logo-lg-text-dark">Velonic</span> -->
			</span>
			<span class="logo-sm">
				<!-- <span class="logo-lg-text-dark">V</span> -->
				<img src="img/topo_logo.png" alt="" height="22">
			</span>
		</a>
	</div>

	<!-- LOGO -->


	<ul class="list-unstyled topnav-menu topnav-menu-left m-0">
		<li>
			<button class="button-menu-mobile waves-effect">
				<i class="mdi mdi-menu"></i>
			</button>
		</li>

		<li class="d-none d-lg-block">
			<form class="app-search">
				<div class="app-search-box">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search...">
						<div class="input-group-append">
							<button class="btn btn-outline-primary" type="submit">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</div>
			</form>
		</li>
	</ul>
</div>
<!-- end Topbar -->