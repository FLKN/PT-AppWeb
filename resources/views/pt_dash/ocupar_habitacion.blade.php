@extends('master')

@section('styles')

<link rel="stylesheet" href="/plugins/timepicker/bootstrap-timepicker.min.css">

@endsection

@section('content')


      <!-- Main row -->
      
      <a href="/dash/habitaciones" title="Editar" alt="Editar" class="btn btn-sm btn-primary pull-right" style="margin-bottom: 10px; margin-right: 10px; text-align: right;"><i class="fa fa-reply"></i> Regresar</a>

      <div class="row">
      
        <form action="/dash/habitaciones/ocupate" autocomplete="off" validate method="POST" enctype="multipart/form-data">

            <div class="col-md-12" id="usersdiv">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Indica el número de usuarios</h3>
                </div>

                <div class="box-body">

                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="number" name="numero_huespedes" class="form-control" placeholder="Numero de huespedes" required>
                  </div>
                  <br>
                  <button type="button" id="num_huespedes" class="btn btn-primary">Añadir huespedes</button>
                </div>
              </div>
            </div>

          
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-body">
                  <div class="box-footer">
                    <input type="hidden" value="{{{ csrf_token() }}}" name="_token"/>
                    <input type="hidden" name="id_habitacion" value="{{ $habitacionid }}"/>
                    <input type="hidden" name="num_huespedes" value=""/>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                </div>
              </div>
            </div>
            
        </form>

      </div>
      <!-- /.row (main row) -->
@endsection

@section('script')


<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script src="/plugins/iCheck/icheck.min.js"></script>

<script src="/plugins/input-mask/jquery.inputmask.js"></script>
<script src="/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script src="/plugins/timepicker/bootstrap-timepicker.min.js"></script>  
    
<script >
  $(function() {
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-blue').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    $("[data-mask]").inputmask();

    $(".timepicker1").timepicker({
      showInputs: false
    });

    $(".timepicker2").timepicker({
      showInputs: false
    });

    $('#num_huespedes').click(function(){
      $('#users-form-container').remove();
      var cont = $('input[name="numero_huespedes"]').val();
      $("input[name='num_huespedes']").val(cont);
      $html = '<div id="users-form-container">';
      for (var i=1; i <= cont; i++ ){
        $html += ''+
        '<div class="col-md-6">'+
          '<div class="box box-primary">'+
            '<div class="box-header with-border">'+
              '<h3 class="box-title">Usuario '+ i +'</h3>'+
            '</div>'+

            '<div class="box-body">'+
              '<div class="input-group">'+
                '<span class="input-group-addon"><i class="fa fa-user"></i></span>'+
                '<input type="text" name="nombre'+i+'" class="form-control" placeholder="Nombre (requerido)" required>'+
              '</div>'+

              '<br>'+

              '<div class="input-group">'+
                '<span class="input-group-addon"><i class="fa fa-user"></i></span>'+
                '<input type="text" name="ap_pat'+i+'" class="form-control" placeholder="Apellido Paterno (requerido)" required>'+
              '</div>'+

              '<br>'+

              '<div class="input-group">'+
                '<span class="input-group-addon"><i class="fa fa-user"></i></span>'+
                '<input type="text" name="ap_mat'+i+'" class="form-control" placeholder="Apellido Materno">'+
              '</div>'+

              '<br>'+

              '<div class="input-group">'+
                '<span class="input-group-addon"><i class="fa fa-key"></i></span>'+
                '<input type="password" name="password'+i+'" class="form-control" placeholder="Contraseña de Habitación (requerido)" required>'+
              '</div>'+

              '<br>'+

              '<div class="form-group">'+
                '<label>Nivel de huesped</label>'+
                '<select class="form-control" name="nivel_usuario'+i+'">'+
                  '<option value="3" selected>Huesped Maestro</option>'+
                  '<option value="4">Huesped Simple</option>'+
                '</select>'+
              '</div>'+
            
              '<br>'+

              '<div class="form-group">'+
                '<label>Teléfono (Móvil)</label>'+
                '<div class="input-group">'+
                  '<div class="input-group-addon">'+
                    '<i class="fa fa-phone"></i>'+
                  '</div>'+
                  '<input type="text" name="telefono'+i+'" placeholder="(requerido)" class="form-control" data-mask required>'+
                '</div>'+
              '</div>'+

              '<div class="form-group">'+
                '<label>Fecha de Nacimiento</label>'+
                '<div class="input-group">'+
                  '<div class="input-group-addon">'+
                    '<i class="fa fa-calendar"></i> (requerido)'+
                  '</div>'+
                  '<input type="date" name="fecha_nac'+i+'" class="form-control" required>'+
                '</div>'+
              '</div>'+

              '<div class="form-group">'+
                '<label> Sexo </label><br>'+
                '<label>'+
                  '<input type="radio" name="sexo'+i+'" value="1" class="flat-blue">'+
                  'Masculino'+
                '</label><br>'+
                '<label>'+
                  '<input type="radio" name="sexo'+i+'" value="2" class="flat-blue">'+
                  'Femenino'+
                '</label>'+
              '</div>'+
              
              '<div class="form-group" >'+
                '<label for="exampleInputFile">Foto</label><br>'+
                '<img id="preview" src="/images/usericon.jpg" alt="Foto" style="height: 100px; width: 100px; border-radius: 50%; margin: 0 auto;"> '+
                '<br><br>'+
                '<input type="file" accept="image" name="foto'+i+'" id="foto" onchange="javascript:cambia_img();">'+
                
                '<p class="help-block">Tamaño máximo de archivo: 16Mb</p>'+
              '</div>'+

              '<div class="input-group">'+
                '<span class="input-group-addon"><i class="fa fa-home"></i></span>'+
                '<input type="text" name="direccion'+i+'" class="form-control" placeholder="Dirección (requerido)" required>'+
              '</div>'+

            '</div>'+
          '</div>'+
        '</div>';
      }
      $html += '</div>';
      $('#usersdiv').after( $html ).hide().fadeIn(300);
    });
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
