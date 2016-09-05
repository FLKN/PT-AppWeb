  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $empleado->foto )?>" class="img-circle" alt="User Image" style="width: 50px; height: 50px;">
        </div>
        <div class="pull-left info">
          <p>{{ $empleado->nombre }} {{ $empleado->ap_pat }} {{ $empleado->ap_mat }}</p>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bed"></i> <span>Habitaciones</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="/dash/habitaciones"><i class="fa fa-circle-o"></i> Ver Habitaciones</a></li>
            <li><a href="  "><i class="fa fa-circle-o"></i> Hacer Registro</a></li>
          </ul>
        </li>

        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Control de empleados</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="/dash/empleados"><i class="fa fa-circle-o"></i> Ver Empleados</a></li>
            <li><a href="/dash/empleados/agregar"><i class="fa fa-circle-o"></i> Añadir Empleado</a></li>
          </ul>
        </li>

        <li>
          <a href="/dash/estadisticas">
            <i class="fa fa-bar-chart"></i> <span>Estadisticas</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Eventos</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="/dash/eventos"><i class="fa fa-circle-o"></i> Ver Eventos Disponibles</a></li>
            <li><a href="/dash/eventos/agregar"><i class="fa fa-circle-o"></i> Añadir Evento</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cutlery"></i> <span>Platillos</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="/dash/platillos"><i class="fa fa-circle-o"></i> Ver Platillos Disponibles</a></li>
            <li><a href="/dash/platillos/agregar"><i class="fa fa-circle-o"></i> Añadir Platillo</a></li>
          </ul>
        </li>
        
        
        

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
