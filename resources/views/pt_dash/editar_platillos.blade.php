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
      
      <a href="/dash/platillos" title="Editar" alt="Editar" class="btn btn-sm btn-primary pull-right" style="margin-bottom: 10px; margin-right: 10px; text-align: right;"><i class="fa fa-reply"></i> Regresar</a>

      <div class="row">
      
        <form action="/dash/platillos/editate" autocomplete="off" validate method="POST" enctype="multipart/form-data">

            <!-- left column -->      
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Platillos</h3>
                </div>

                <div class="box-body">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-bookmark"></i></span>
                      <input type="text" name="nombre" class="form-control" value="{{ $editable->nombre }}" required>
                    </div>
                  </div>

                  <br>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                      <input type="text" name="descripcion" class="form-control" value="{{ $editable->descripcion }}" required>
                    </div>
                  </div>
                  
                  <br>
                  
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    <input type="text" name="precio" class="form-control" value="{{ $editable->precio }}" required>
                  </div>
                  
                  <br>
                  <br><br>

                  <div class="form-group" >
                    <label for="exampleInputFile">Imagen</label><br>
                    <div class="col-centered">
                      <img id="preview" src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $editable->imagen )?>" alt="Foto" style="height: 200px; width: 200px; border-radius: 25%;"> 
                    </div>
                    <br><br>
                    <input type="file" accept="image/*" name="imagen" id="foto" onchange="javascript:cambia_img();">
                    <p class="help-block">Tamaño máximo de archivo: 16Mb</p>
                  </div>
                </div>

                <div class="box-footer">
                  <input type="hidden" value="{{{ $editable->id }}}" name="platillo_id"/>
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
