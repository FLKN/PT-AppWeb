@extends('master')


@section('content')


      <!-- Main row -->
      <div class="row">
        {{ $editable->id }}<br>

        <br>
        
        {{ $editable->direccion }}<br>
        {{ $editable->telefono }}<br>
        {{ $editable->hora_init }}<br>
        {{ $editable->hora_fin }}<br>

        <!-- left column -->
        <form autocomplete="off">
            <div class="col-md-6">

              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Nombre</h3>
                </div><!-- /.box-header -->

                <div class="box-body">

                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="nombre" class="form-control" value="{{ $editable->nombre }}">
                  </div>

                  <br>

                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="ap_pat" class="form-control" value="{{ $editable->ap_pat }}">
                  </div>

                  <br>

                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="ap_mat" class="form-control" value="{{ $editable->ap_mat }}">
                  </div>

                </div><!-- /.box-body -->



              </div><!-- /.box -->



            </div><!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Información personal</h3>
                </div><!-- /.box-header -->

                <div class="box-body">

                  <div class="form-group">
                    <label>Fecha de Nacimiento</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" class="form-control" value="{{ $editable->fecha_nac }}">
                    </div>
                  </div>

                  <br>

                  <div class="form-group">
                    <label> Sexo </label><br>
                    
                    @if($editable->sexo == 1)
                      <label>
                        <input type="radio" name="sexo" class="flat-blue" checked>
                        Masculino
                      </label><br>
                      <label>
                        <input type="radio" name="sexo" class="flat-blue">
                        Femenino
                      </label>
                    @else
                      <label>
                        <input type="radio" name="sexo" class="flat-blue">
                        Masculino
                      </label><br>
                      <label>
                        <input type="radio" name="sexo" class="flat-blue" checked>
                        Femenino
                      </label>
                    @endif

                  </div>
                  
                  <br>

                  <div class="form-group" ><br>
                    <label for="exampleInputFile">Foto</label><br>
                    <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $editable->foto )?>" alt="Foto" style="height: 100px; width: 100px; border-radius: 50%; margin: 0 auto;"> 
                    <br><br>
                    <input type="file" id="exampleInputFile">
                    <p class="help-block">Example block-level help text here.</p>
                  </div>
                </div>


                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

              </div><!-- /.box -->

            </div><!--/.col (right) -->


        </form>

      </div>
      <!-- /.row (main row) -->
@endsection

@section('script')


<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- iCheck 1.0.1 -->
<script src="/plugins/iCheck/icheck.min.js"></script>

<script >
  $(function() {
    //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-blue').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
      });
  });
</script>

@endsection
