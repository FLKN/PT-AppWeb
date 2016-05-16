@extends('master')

@section('styles')
<style type="text/css">
  
  .col-centered{
      float: none;
      margin: 0 auto;
  }

</style>

<link rel="stylesheet" href="/plugins/timepicker/bootstrap-timepicker.min.css">

@endsection

@section('content')


      <!-- Main row -->
      
      <a href="/dash/estadisticas" title="Editar" alt="Editar" class="btn btn-sm btn-primary pull-right" style="margin-bottom: 10px; margin-right: 10px; text-align: right;"><i class="fa fa-reply"></i> Regresar</a>

      <div class="row">
      
        <form action="/dash/estadisticas/editate" autocomplete="off" validate method="POST" enctype="multipart/form-data">

            <!-- left column -->      
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Sensor</h3>
                </div>

                <div class="box-body">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-bookmark"></i></span>
                      <input type="text" name="nombre" class="form-mcontrol" value="{{ $editable->Sensor }}" required>
                    </div>
                  </div>

                  <br>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                      <input type="text" name="descripcion" class="form-control" value="{{ $editable->Tiempo_vida }}" required>
                    </div>
                  </div>
                  
                  <br>
                  
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    <input type="text" name="precio" class="form-control" value="{{ $editable->Tiempo_uso }}" required>
                  </div>
                  
                  <br>

                  <br>
                  
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    <input type="text" name="precio" class="form-control" value="{{ $editable->Energia_consumida }}" required>
                  </div>
                  
                  <br>
                  <br><br>

                  

                <div class="box-footer">
                  <input type="hidden" value="{{{ $editable->id }}}" name="sensor_id"/>
                  <input type="hidden" value="{{{ csrf_token() }}}" name="_token"/>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
            


        </form>

      </div>
      <!-- /.row (main row) -->
@endsection

@section('script')


<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    
<script >
  $(function() {
    $(".textarea").wysihtml5();
  });

  function cambia_img(){
    var Archivos, Lector;
    Archivos = $('#foto')[0].files;
    if(Archivos.length>0){
        Lector = new FileReader();
        Lector.onloadend = function(e){
            var origen = e.target; //objeto FileReader
            $('#preview').attr('src', origen.result);
        }
        Lector.readAsDataURL(Archivos[0]);
    }
  }
</script>

@endsection
