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
              <h3 class="box-title">Habitaciones</h3>
              <a href="javascript:agregarHabitacion();" title="Agregar" alt="Agregar" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> Agregar Habitación</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 
                  <th>Habitacion</th>
                  <th>Estado</th>
                  <th>Precio</th>
                  <th>Acción</th>
                </tr>
                </thead>
                <tbody>
               
               @foreach($habitacion as $hab)
                  <tr id="{{$hab->id}}">
                    
                    <td>{{ $hab->id }}</td>
                    @if( $hab->estado  == 0 )
                      <td>Libre</td>
                    @else
                      <td><span id="stateText_{{ $hab->id }}">Ocupada</span></td>
                    @endif
                    <td><span id="priceText_{{ $hab->id }}">${{ $hab->precio }} MXN</span></td>
                    <td>
                      <a href="javascript:editarHabitacion({{ $hab->id }});" id="add_{{ $hab->id }}" title="Agregar" alt="Agregar" class="btn btn-sm btn-info" style="margin: 0 0 0 5%;"><i class="fa fa-pencil"></i></a>
                      @if( $hab->estado  == 0 )
                        <a href="/dash/habitaciones/ocupar/{{ $hab->id }}" id="action_{{ $hab->id }}" title="Check-In" alt="Check-In" class="btn btn-sm btn-success" style="margin: 0 0 0 5%;"><i class="fa fa-check"></i></a>
                      @else
                        <a href="javascript:desocuparHabitacion({{ $hab->id }});" id="action_{{ $hab->id }}" title="Check-Out" alt="Check-Out" class="btn btn-sm btn-danger" style="margin: 0 0 0 5%;"><i class="fa fa-times"></i></a>
                      @endif
                    </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                  
                  <th>Habitacion</th>
                  <th>Estado</th>
                  <th>Precio</th>
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

  function desocuparHabitacion(id) {    
    bootbox.confirm('Está seguro que desea desocupar la habitación <b>'+ id +'</b>', function(result) {
      if(result){
        var url = "/dash/habitaciones/desocupate"; 
        $datos = {
          'id' : id,
          '_token' : '{{{ csrf_token() }}}'
        };
        $.ajax({
          type: 'POST',
          url: url,
          dataType: 'JSON',
          data: $datos,
          success: function (data){
            console.log(data);
            $('#action_'+id).fadeOut(300, function() { $(this).remove(); });
            
            $('#add_'+id).after('<a href="/dash/habitaciones/ocupar" id="action_'+id+'" title="Check-In" alt="Check-In" class="btn btn-sm btn-success" style="margin: 0 0 0 5%;"><i class="fa fa-check"></i></a>').hide().fadeIn(300);  
            $('#stateText_'+id).html('Libre');
          } 
        });
       }
    });
  }

  function agregarHabitacion() {
    bootbox.prompt("Indica el precio de la nueva habitación", function(result) {
      if (result === "") {
        
      } else {
        var url = "/dash/habitaciones/agregate";
        $datos = {
          'precio': result, 
          '_token' : '{{{ csrf_token() }}}'
        };
        $.ajax({
          type: 'POST',
          url: url,
          dataType: 'JSON',
          data: $datos,
          success: function (data){
            setTimeout(function(){
              location.reload();
            }, 2000);
          }
        });
      }
    });
  }

  function editarHabitacion(id) {
    bootbox.prompt("Indica el nuevo precio de la habitación " + id, function(result) {
      if (result === "") {
        
      } else {
        var url = "/dash/habitaciones/editate";
        $datos = {
          'habitacion_id': id,
          'precio': result, 
          '_token' : '{{{ csrf_token() }}}'
        };
        $.ajax({
          type: 'POST',
          url: url,
          dataType: 'JSON',
          data: $datos,
          success: function (data){
            $('#priceText_'+id).html("$"+result+" MXN");
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
