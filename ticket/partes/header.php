<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"></i> <span>TIket</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo PUBLIC_PATH ?>/<?php echo $_SESSION['usuario']['foto'] ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['usuario']['usuario'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-edit"></i> Datos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo PUBLIC_PATH ?>/categoria">Categora</a></li>
                      <li><a href="<?php echo PUBLIC_PATH ?>/estado">Estados</a></li>
                      <li><a href="<?php echo PUBLIC_PATH ?>/prioridad">Prioridades</a></li>
                      <li><a href="<?php echo PUBLIC_PATH ?>/proyecto">Proyectos</a></li>
                      <li><a href="<?php echo PUBLIC_PATH ?>/usuario">usuario</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Reportes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo PUBLIC_PATH ?>/reporte">Reporte 1</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo PUBLIC_PATH ?>/tiket"><i class="fa fa-laptop"></i> Tiket <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>

            </div>
          
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo PUBLIC_PATH ?>/<?php echo $_SESSION['usuario']['foto'] ?>" alt=""><?php echo $_SESSION['usuario']['usuario'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo PUBLIC_PATH ?>/usuario/perfil.php"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="<?php echo PUBLIC_PATH ?>/usuario/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

         
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <div class="right_col" role="main">
          <div class="">