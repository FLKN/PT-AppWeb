@extends('master')


@section('content')


      <!-- Main row -->
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Bienvenido</h3>
            </div>
            <div class="box-body">
            </div>
            AQUI VA UNA IMAGEN GRANDE CON EL LOGO DE UPIITA
          </div>

        </div>

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>Habitaciones <br> disponibles</h4>
            </div>
            <div class="icon">
              <i class="fa fa-bed"></i>
            </div>
            <a href="/dash/habitaciones" class="small-box-footer">
              Ir <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4>Lista de <br> empleados</h4>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="/dash/empleados" class="small-box-footer">
              Ir <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4>Ver <br> estadisticas<h4>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/dash/estadisticas" class="small-box-footer">
              Ir <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h4>Ver <br> eventos</h4>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="/dash/eventos" class="small-box-footer">
              Ir <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h4>Ver <br> platillos</h4>
            </div>
            <div class="icon">
              <i class="fa fa-cutlery"></i>
            </div>
            <a href="/dash/platillos" class="small-box-footer">
              Ir <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- /.row (main row) -->
@endsection
