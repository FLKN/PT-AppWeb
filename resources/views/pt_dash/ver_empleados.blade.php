@extends('master')


@section('content')


      <!-- Main row -->
      <div class="row">
        <!-- Small boxes (Stat box) -->

        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de empleados</h3>
              <a href="/dash/empleados/agregar" title="Agregar" alt="Agregar" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> Agregar Empleado</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Edad</th>
                  <th>Telefono</th>
                  <th>Direccion</th>
                  <th>Hora de inicio</th>
                  <th>Hora de fin</th>
                  <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($empleados as $empleado)
                  <tr>
                    <td>{{ $empleado->nombre }} {{ $empleado->ap_pat }} {{ $empleado->ap_mat }}</td>
                    <td>Edad</td>
                    <td>{{ $empleado->telefono }}</td>
                    <td>{{ $empleado->direccion }}</td>
                    <td>{{ $empleado->hora_init }}</td>
                    <td>{{ $empleado->hora_fin }}</td>
                    <td>
                      <a href="/dash/empleados/editar/{{ $empleado->id }}" title="Editar" alt="Editar" class="btn btn-sm btn-info" style="margin: 5%;"><i class="fa fa-reply"></i></a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Hora de inicio</th>
                    <th>Hora de fin</th>
                    <th>Acción</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      </div>
      <!-- /.row (main row) -->
@endsection

@section('script')
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>

<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
@endsection
