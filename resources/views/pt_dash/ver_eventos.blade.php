@extends('master')

@section('content')
      

      <!-- Main row -->
      <div class="row">
        <!-- Small boxes (Stat box) -->

        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Eventos</h3>
              <a href="/dash/eventos/agregar" title="Agregar" alt="Agregar" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> Agregar Evento</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Duración</th>
                  <th>Imagen</th>
                  <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($eventos as $evnt)
                  <tr id="{{$evnt->id}}">
                    <td>{{ $evnt->nombre }}</td>
                    <td>{{ $evnt->duracion }}</td>
                    <td><img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $evnt->imagen )?>" style="height: 70px; width: 70px; border-radius: 50%; margin: 0 auto;"> </td>
                    <td>
                      <a href="/dash/eventos/editar/{{ $evnt->id }}" title="Editar" alt="Editar" class="btn btn-sm btn-info" style="margin: 5%;"><i class="fa fa-pencil"></i></a>
                      <a href="javascript:eliminarEvento({{ $evnt->id }});" title="Eliminar" alt="Eliminar" class="btn btn-sm btn-danger" style="margin: 5%;"><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Duración</th>
                    <th>Imagen</th>
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

  function eliminarEvento(  id) {
    
    bootbox.confirm('Está seguro que desea eliminar el evento <b>'+ id +'</b>', function(result) {
      if(result){
        var url = "/dash/eventos/eliminate/"+id; 
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
