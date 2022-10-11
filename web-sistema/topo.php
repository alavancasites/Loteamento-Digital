<?php /* ?>
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
  <?php */ ?>


<header id="topnav">
  <!-- Topbar Start -->
  <div class="navbar-custom">
    <div class="container-fluid">
      <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list">
          <!-- Mobile menu toggle-->
          <a class="navbar-toggle nav-link">
            <div class="lines">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </a>
          <!-- End mobile menu toggle-->
        </li>
        <li class="dropdown d-none d-lg-block">
          <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <img src="assets/images/flags/us.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">English <i class="mdi mdi-chevron-down"></i> </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <img src="assets/images/flags/germany.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">German</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <img src="assets/images/flags/italy.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Italian</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <img src="assets/images/flags/spain.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Spanish</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <img src="assets/images/flags/russia.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Russian</span>
            </a>
          </div>
        </li>

        <li class="dropdown notification-list">
          <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
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
                    <div class="inbox-item-img"><img src="assets/images/users/avatar-1.jpg" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author">Cristina Pride</p>
                    <p class="inbox-item-text text-truncate">Hi, How are you? What about our next meeting</p>
                  </div>
                </a>
                <a href="#">
                  <div class="inbox-item">
                    <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author">Sam Garret</p>
                    <p class="inbox-item-text text-truncate">Yeah everything is fine</p>
                  </div>
                </a>
                <a href="#">
                  <div class="inbox-item">
                    <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author">Karen Robinson</p>
                    <p class="inbox-item-text text-truncate">Wow that's great</p>
                  </div>
                </a>
                <a href="#">
                  <div class="inbox-item">
                    <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author">Sherry Marshall</p>
                    <p class="inbox-item-text text-truncate">Hi, How are you? What about our next meeting</p>
                  </div>
                </a>
                <a href="#">
                  <div class="inbox-item">
                    <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author">Shawn Millard</p>
                    <p class="inbox-item-text text-truncate">Yeah everything is fine</p>

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
          <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
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

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon text-success">
                  <i class="mdi mdi-account-plus text-primary"></i>
                </div>
                <p class="notify-details">New user registered.
                  <small class="noti-time">5 hours ago</small>
                </p>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon text-danger">
                  <i class="mdi mdi-heart text-danger"></i>
                </div>
                <p class="notify-details">Carlos Crouch liked
                  <small class="noti-time">3 days ago</small>
                </p>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon text-warning">
                  <i class="mdi mdi-comment-account-outline text-primary"></i>
                </div>
                <p class="notify-details">Caleb Flakelar commented on Admi
                  <small class="noti-time">4 days ago</small>
                </p>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon text-purple">
                  <i class="mdi mdi-account-plus text-danger"></i>
                </div>
                <p class="notify-details">New user registered.
                  <small class="noti-time">7 days ago</small>
                </p>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon text-danger">
                  <i class="mdi mdi-heart text-danger"></i>
                </div>
                <p class="notify-details">Carlos Crouch liked <b>Admin</b>.
                  <small class="noti-time">Carlos Crouch liked</small>
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
          <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
            <span class="pro-user-name ml-1">
              Thompson <i class="mdi mdi-chevron-down"></i>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
            <!-- item-->
            <div class="dropdown-header noti-title">
              <h6 class="text-overflow m-0">Bem vindo !</h6>
            </div>

            <!-- item-->
            <a href="perfil" class="dropdown-item notify-item">
              <i class="mdi mdi-account-outline"></i>
              <span>Meu perfil</span>
            </a>

            <!-- item-->
            <a href="cliente" class="dropdown-item notify-item">
              <i class="mdi mdi-settings-outline"></i>
              <span>Trocar de cliente</span>
            </a>

            

            <div class="dropdown-divider"></div>

            <!-- item-->
            <a href="sair" class="dropdown-item notify-item">
              <i class="mdi mdi-logout-variant"></i>
              <span>Logout</span>
            </a>

          </div>
        </li>



      </ul>

      <!-- LOGO -->
      <div class="logo-box">
       

        <a href="cliente" class="logo text-center logo-light">
        <i class="ion ion-md-swap fa-2x text-white"></i>
        </a>

      </div>
      <div class="logo-box">

       
          <img src="img/logo.png" alt="LOTE" class=" mt-2" height="50">
        
      </div>
      <!-- LOGO -->

      <ul class="list-unstyled topnav-menu topnav-menu-left m-0">

        <li class="d-none d-sm-block">
          <form class="app-search">
            <div class="app-search-box">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
  </div>
  <!-- end Topbar -->

  <div class="topbar-menu">
    <div class="container-fluid">
      <div id="navigation">
        <!-- Navigation Menu-->
        <ul class="navigation-menu">


          <li class="has-submenu">
            <a href="#"> <i class="ion-md-speedometer"></i> Terrenos </a>
            <ul class="submenu">
              <li><a href="terrenos">Todos</a></li>
              <li><a href="destaques">Destaques</a></li>
              <li><a href="favoritos">Favoritos</a></li>
            </ul>
          </li>

          <li class="has-submenu">
            <a href="#"> <i class="ion-md-basket"></i> Reservas </a>
            <ul class="submenu">
              <li><a href="reservados">Minhas reservas</a></li>
              <li><a href="#">Clientes</a></li>
            </ul>
          </li>

          <li class="has-submenu">
            <a href="#"> <i class="ion-ios-apps"></i> Materiais </a>
            <ul class="submenu">
              <li><a href="#">Landpages</a></li>
              <li><a href="#">Cartao de visita</a></li>
              <li><a href="downloads">Downloads</a></li>
            </ul>
          </li>

          <li class="has-submenu">
            <a href="#">
              <i class="ion ion-md-flask"></i> Other </a>
            <ul class="submenu">
              <li class="has-submenu">
                <a href="#"> Forms <div class="arrow-down"></div></a>
                <ul class="submenu">
                  <li><a href="forms-elements.html">General Elements</a></li>
                  <li><a href="forms-validation.html">Form Validation</a></li>
                  <li><a href="forms-advanced.html">Advanced Form</a></li>
                  <li><a href="forms-wizard.html">Form Wizard</a></li>
                  <li><a href="form-quilljs.html">Quilljs Editor</a></li>
                  <li><a href="forms-uploads.html">Multiple File Upload</a></li>
                  <li><a href="forms-image-crop.html">Image Crop</a></li>
                  <li><a href="forms-xeditable.html">X-Editable</a></li>
                </ul>
              </li>
              <li class="has-submenu">
                <a href="#"> Tables <div class="arrow-down"></div></a>
                <ul class="submenu">
                  <li><a href="tables-basic.html">Basic Tables</a></li>
                  <li><a href="tables-datatable.html">Data Table</a></li>
                  <li><a href="tables-editable.html">Editable Table</a></li>
                  <li><a href="tables-responsive.html">Responsive Table</a></li>
                </ul>
              </li>
              <li class="has-submenu">
                <a href="#"> Mail <div class="arrow-down"></div></a>
                <ul class="submenu">
                  <li><a href="email-inbox.html">Inbox</a></li>
                  <li><a href="email-compose.html">Compose Mail</a></li>
                  <li><a href="email-read.html">View Mail</a></li>
                  <li><a href="email-templates.html">Email Templates</a></li>
                </ul>
              </li>
              <li class="has-submenu">
                <a href="#"> Charts <div class="arrow-down"></div></a>
                <ul class="submenu">
                  <li><a href="charts-morris.html">Morris Chart</a></li>
                  <li><a href="charts-chartjs.html">Chartjs</a></li>
                  <li><a href="charts-flot.html">Flot Chart</a></li>
                  <li><a href="charts-rickshaw.html">Rickshaw Chart</a></li>
                  <li><a href="charts-peity.html">Peity Chart</a></li>
                  <li><a href="charts-c3.html">C3 Chart</a></li>
                  <li><a href="charts-other.html">Other Chart</a></li>
                </ul>
              </li>
              <li class="has-submenu">
                <a href="#"> Maps <div class="arrow-down"></div></a>
                <ul class="submenu">
                  <li><a href="maps-gmap.html"> Google Map</a></li>
                  <li><a href="maps-vector.html"> Vector Map</a></li>
                </ul>
              </li>

            </ul>
          </li>

          <!-- <li class="has-submenu">
            <a href="#">
              <i class="ion-md-copy"></i> Pages
            </a>
            <ul class="submenu megamenu">
              <li>
                <ul>
                  <li><a href="pages-profile.html">Profile</a></li>
                  <li><a href="pages-timeline.html">Timeline</a></li>
                  <li><a href="pages-invoice.html">Invoice</a></li>
                  <li><a href="pages-contact.html">Contact-list</a></li>
                  <li><a href="pages-login.html">Login</a></li>
                  <li><a href="pages-register.html">Register</a></li>

                </ul>
              </li>
              <li>
                <ul>
                  <li><a href="pages-recoverpw.html">Recover Password</a></li>
                  <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                  <li><a href="pages-blank.html">Blank Page</a></li>
                  <li><a href="pages-404.html">404 Error</a></li>
                  <li><a href="pages-404_alt.html">404 alt</a></li>
                  <li><a href="pages-500.html">500 Error</a></li>
                </ul>
              </li>
            </ul>
          </li>

          -->

        </ul>
        <!-- End navigation menu -->

        <div class="clearfix"></div>
      </div>
      <!-- end #navigation -->
    </div>
    <!-- end container -->
  </div>
  <!-- end navbar-custom -->
</header>