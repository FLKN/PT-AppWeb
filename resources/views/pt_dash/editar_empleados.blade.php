@extends('master')


@section('content')


      <!-- Main row -->
      <div class="row">
        {{ $editable->id }}<br>

        {{ $editable->fecha_nac }}<br>
        {{ $editable->sexo }}<br>
        {{ $editable->foto }}<br>
        <img src="<?php //echo 'data:image/jpeg;base64,'.base64_encode( $editable->foto )?>" class="user-image" alt="User Image">
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
                    <input type="text" name="nombre" class="form-control" placeholder="{{ $editable->nombre }}">
                  </div>

                  <br>

                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="ap_pat" class="form-control" placeholder="{{ $editable->ap_pat }}">
                  </div>

                  <br>

                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="ap_mat" class="form-control" placeholder="{{ $editable->ap_mat }}">
                  </div>

                </div><!-- /.box-body -->


                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

              </div><!-- /.box -->



            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">


            </div><!--/.col (right) -->


        </form>

      </div>
      <!-- /.row (main row) -->
@endsection

@section('script')


<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
@endsection
