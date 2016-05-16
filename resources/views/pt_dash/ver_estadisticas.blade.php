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
              <h3 class="box-title">Estadisticas</h3>
              <a href="/dash/estadisticas/agregar" title="Agregar" alt="Agregar" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> Agregar Sensor</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sensor</th>
                  <th>Tiempor de vida</th>
                  <th>Tiempo de uso</th>
                  <th>Energia consumida</th>
                  <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($estadistica as $es)
                  <tr id="{{$es->id}}">
                    <td>{{ $es->Sensor }} </td> 
                    <td>{{ $es->Tiempo_vida }}</td>
                    <td>{{ $es->Tiempo_uso }}</td>
                    <td>{{ $es->Energia_consumida }}</td>
                    <td>
                      <a href="/dash/empleados/editar/{{ $es->id }}" title="Editar" alt="Editar" class="btn btn-sm btn-info" style="margin: 5%;"><i class="fa fa-pencil"></i></a>
                      <a href="javascript:eliminarEmpleado({{ $es->id_usuario }},{{ $es->id }});" title="Eliminar" alt="Eliminar" class="btn btn-sm btn-danger" style="margin: 5%;"><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <div><th>Sensor</th></div>
                    <th>Tiempor de vida</th>
                    <th>Tiempo de uso</th>
                    <th>Energia consumida</th>
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
  
  <table width="200" border="2" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr> <td> <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([

          ['Task', 'Hours per Day'],
          ['Tiempo de vida',     11],
          ['Tiempo de uso',      2]
        ]);

        var options = {
          title: 'Sensor de Luminosidad',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
      <div id="piechart_3d" style="width: 900px; height: 500px;"></div></td> <td> 

 <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Luminosidad',     11],
          ['Presencia',      2],
          ['Selenoide',  2],
          ['Foco', 2],
          ['Temperatura',    7]
        ]);

        var options = {
          title: 'Sensores Energia consumida'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>


      </td></tr> 
  <tr> <td><script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([

          ['Task', 'Hours per Day'],
          ['Tiempo de vida',     11],
          ['Tiempo de uso',      2]
        ]);

        var options = {
          title: 'Sensor de Luminosidad',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
      <div id="piechart_3d" style="width: 700px; height: 300px;"></div> </td> <td> </td></tr>
  <tr> <td> </td> <td> </td></tr>
  </table>  



  
  


     
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

  function eliminarEstadistica(id_usuario,id) {
    
    bootbox.confirm('Está seguro que desea eliminar el Sensor <b>'+ id +'</b>', function(result) {
      if(result){
        var url = "/dash/estadisticas/eliminate/"+id_usuario; 
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
