  <header class="main-header">
    <!-- Logo -->
    <a href="/dash" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>IPN</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>DOMHO</b>tel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $empleado->foto )?>" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ $empleado->nombre }} {{ $empleado->ap_pat }} {{ $empleado->ap_mat }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $empleado->foto )?> " class="img-circle" alt="User Image">

                <p>
                  {{ $empleado->nombre }} {{ $empleado->ap_pat }} {{ $empleado->ap_mat }}
                  <small>Tel. {{ $empleado->telefono }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="/dash/logout" class="btn btn-default btn-flat">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
