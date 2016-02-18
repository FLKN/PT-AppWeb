@extends('master')


@section('content')


      <!-- Main row -->
      <div class="row">
        {{ $editable->id }}<br>
        {{ $editable->nombre }}<br>
        {{ $editable->ap_pat }}<br>
        {{ $editable->ap_mat }}<br>
        {{ $editable->fecha_nac }}<br>
        {{ $editable->sexo }}<br>
        {{ $editable->foto }}<br>
        <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $editable->foto )?>" class="user-image" alt="User Image">
        {{ $editable->direccion }}<br>
        {{ $editable->telefono }}<br>
        {{ $editable->hora_init }}<br>
        {{ $editable->hora_fin }}<br>

        <form >

        </form>  

      </div>
      <!-- /.row (main row) -->
@endsection

@section('script')


<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
@endsection
