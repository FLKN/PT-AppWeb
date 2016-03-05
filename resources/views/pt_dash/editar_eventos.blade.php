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
      
      <a href="/dash/eventos" title="Editar" alt="Editar" class="btn btn-sm btn-primary pull-right" style="margin-bottom: 10px; margin-right: 10px; text-align: right;"><i class="fa fa-reply"></i> Regresar</a>

      <div class="row">
      
        <form action="/dash/eventos/editate" autocomplete="off" validate method="POST" enctype="multipart/form-data">

            <!-- left column -->      
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Información de eventos</h3>
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
                      <input type="text" name="ubicacion" class="form-control" value="{{ $editable->ubicacion }}" required>
                    </div>
                  </div>
                  
                  <br>
                  
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    <input type="text" name="duracion" class="form-control" value="{{ $editable->duracion }}" required>
                  </div>
                  
                  <br>

                  <div class="form-group">
                    <div class="input-group col-centered">
                      <textarea class="textarea" name="descripcion" maxlength="200" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $editable->descripcion }}</textarea>
                      <p class="help-block">Hasta 200 caracteres</p>
                    </div>
                  </div>

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
                  <input type="hidden" value="{{{ $editable->id }}}" name="evento_id"/>
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
