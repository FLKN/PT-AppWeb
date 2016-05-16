<?php 
  function getEdad($date) {
    list($Y,$m,$d) = explode("-",$date);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
  }
?>
@extends('master')

@section('content')
      
      
      <!-- Main row -->
      <div class="row">
        <!-- Small boxes (Stat box) -->

        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de platillos</h3>
              <a href="/dash/platillos/agregar" title="Agregar" alt="Agregar" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> Agregar Platillos</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Precio</th>
                  <th>Imagen</th>
                  <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($platillo as $pla)
                  <tr id="{{$pla->id}}">
                    <td>{{ $pla->nombre }}</td>
                    <td>{{ $pla->descripcion }}</td>
                    <td>{{ $pla->precio }}</td>
                    <td><img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $pla->imagen )?>" style="height: 70px; width: 70px; border-radius: 50%; margin: 0 auto;"> </td>
                    <td>
                      <a href="/dash/platillos/editar/{{ $pla->id }}" title="Editar" alt="Editar" class="btn btn-sm btn-info" style="margin: 5%;"><i class="fa fa-pencil"></i></a>
                      <a href="javascript:eliminarPlatillo({{ $pla->id_usuario }} {{ $pla->id }});" title="Eliminar" alt="Eliminar" class="btn btn-sm btn-danger" style="margin: 5%;"><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
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

  function eliminarPlatillo(id_usuario,id) {
    
    bootbox.confirm('Está seguro que desea eliminar el platillo <b>'+ id +'</b>', function(result) {
      if(result){
        var url = "/dash/platillos/eliminate/"+id_usuario; 
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
