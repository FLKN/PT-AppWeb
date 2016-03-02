@extends('master')

@section('styles')
  <style>
      
  </style>

@endsection
@section('content')
      <div id="modal-eliminar" class="modal modal-warning fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Atención</h4>
            </div>
            <div class="modal-body">
              <p>¿Seguro desea eliminar este empleado?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
              <button type="button" class="btn btn-outline">Si</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    
      
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
                @foreach($empleados as $emp)
                  <tr id="{{$emp->id}}">
                    <td>{{ $emp->nombre }} {{ $emp->ap_pat }} {{ $emp->ap_mat }}</td>
                    <td>Edad</td>
                    <td>{{ $emp->telefono }}</td>
                    <td>{{ $emp->direccion }}</td>
                    <td>{{ $emp->hora_init }}</td>
                    <td>{{ $emp->hora_fin }}</td>
                    <td>
                      <a href="/dash/empleados/editar/{{ $emp->id }}" title="Editar" alt="Editar" class="btn btn-sm btn-info" style="margin: 5%;"><i class="fa fa-pencil"></i></a>
                      <a href="javascript:eliminarEmpleado({{ $emp->id_usuario }},{{ $emp->id }});" title="Eliminar" alt="Eliminar" class="btn btn-sm btn-danger" style="margin: 5%;"><i class="fa fa-times"></i></a>
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

  function eliminarEmpleado(id_usuario,id) {
    
    bootbox.confirm('Está seguro que desea eliminar el empleado <b>'+ id +'</b>', function(result) {
      if(result){
        var url = "/dash/empleados/eliminate/"+id_usuario; 
        $.ajax({
          type: 'GET',
          url: url,
          dataType: 'JSON',
          success: function (data){
            console.log(data);
            $('#'+id).slideUp(400);
          }
        });
       }
    });
    
  }

</script>

<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Bootstrap 3.3.5 -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/plugins/fastclick/fastclick.min.js"></script>

@endsection
