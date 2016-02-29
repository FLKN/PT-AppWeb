@extends('master')

@section('styles')

<link rel="stylesheet" href="/plugins/timepicker/bootstrap-timepicker.min.css">

@endsection

@section('content')


      <!-- Main row -->
      
      <a href="/dash/empleados" title="Editar" alt="Editar" class="btn btn-sm btn-primary pull-right" style="margin-bottom: 10px; margin-right: 10px; text-align: right;"><i class="fa fa-reply"></i> Regresar</a>

      <div class="row">
      
        <form action="/dash/empleados/agregate" autocomplete="off" validate method="POST" enctype="multipart/form-data">

            <!-- left column -->      
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Nombre</h3>
                </div>

                <div class="box-body">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                  </div>

                  <br>

                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="ap_pat" class="form-control" placeholder="Apellido Paterno" required>
                  </div>

                  <br>

                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="ap_mat" class="form-control" placeholder="Apellido Materno">
                  </div>

                  <br>

                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                  </div>
                </div>
              </div>

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Información Laboral</h3>
                </div>

                <div class="box-body">
                  <div class="form-group">
                    <label>Teléfono (Móvil)</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" name="telefono" class="form-control" data-inputmask="'mask': ['99-9999-9999', '99 9999-9999']" data-mask required>
                    </div>
                  </div>

                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Hora de inicio</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                        <input type="text" name="hora_init" class="form-control timepicker1" required>
                      </div>
                    </div>
                  </div>

                  <div class="bootstrap-timepicker">
                    <div class="form-group">    
                      <label>Hora de fin</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                        <input type="text" name="hora_fin" class="form-control timepicker2" required>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div><!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Información personal</h3>
                </div>

                <div class="box-body">

                  <div class="form-group">
                    <label>Fecha de Nacimiento</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" name="fecha_nac" class="form-control" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label> Sexo </label><br>
                    
                    <label>
                      <input type="radio" name="sexo" value="1" class="flat-blue">
                      Masculino
                    </label><br>
                    <label>
                      <input type="radio" name="sexo" value="2" class="flat-blue">
                      Femenino
                    </label>
                    
                  </div>
                  
                  <div class="form-group" >
                    <label for="exampleInputFile">Foto</label><br>
                    <img id="preview" src="/images/user-icon.jpg" alt="Foto" style="height: 100px; width: 100px; border-radius: 50%; margin: 0 auto;"> 
                    <br><br>
                    <input type="file" accept="image/*" name="foto" id="foto" onchange="javascript:cambia_img();">
                    
                    <p class="help-block">Example block-level help text here.</p>
                  </div>

                  <div class="form-group">
                    <label>Dirección</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-home"></i>
                      </div>
                      <input type="text" name="direccion" class="form-control" required>
                    </div>
                  </div>
                </div>


                <div class="box-footer">
                  <input type="hidden" value="{{{ csrf_token() }}}" name="_token"/>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

              </div>

            </div><!--/.col (right) -->


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
