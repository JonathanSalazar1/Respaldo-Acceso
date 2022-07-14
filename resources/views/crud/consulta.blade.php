@include ('templates.header')
@include ('templates.menu')




<?php
date_default_timezone_set('America/Monterrey');
$fecha_actual=date("Y-m-d");
?>

<div class="consulta">
    <h1 class="text-center">Consulta de Asistencia</h1>
    <div class="row g-3">
        <div class="col">
            <form action="{{url('consulta')}}" method="get">
                {{-- <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" name="texto" placeholder="N&uacute;mero de Empleado"required>
                    </div>
                    <div class="col">
                        <input type="submit" class="btn btn-primary btn-lg" value="Buscar">
                        <input type="submit" class="btn btn-success btn-lg" value="Mostrar todo"  href="consulta">
                    </div>
    
                </div> --}}
            </form>
        </div>
        <div class="col">
            <input type="text" id="myInput" onkeyup="myFunction1()" placeholder="Buscar por NumEmp..">
         </div>
        <div class="card1">
        <div style="background-color:#c58845" class="alert alert-primary d-flex" role="alert">
                    <div>
                        <h2></h2>
                    </div>
                </div>
    
    
    <div class="container">
        <div class="table table-wrapper-scroll-x my-custom-scrollbar">
            <table id="exportable" class="table table table-striped table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Número de empleado</th>
                        <th>Fecha de entrada</th>
                        <th>Hora de entrada</th>
                        <th>Fecha de salida</th>
                        <th>Hora de salida</th>
                    </tr>
                </thead>
                <tbody>
            @foreach($consultas as $consulta)
                <tr>
                    <td>{{ $consulta->NoEmp}}</td>
                    <td>{{ $consulta->f_entrada}}</td>
                    <td>{{ $consulta->h_entrada}}</td>
                    <td>{{ $consulta->f_salida}}</td>
                    <td>{{ $consulta->h_salida}}</td>
                </tr>
            @endforeach
                </tbody>
            </table>
        </div>
    </div>

<script>




</script>


<script>
    function myFunction1() {

      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("exportable");
      tr = table.getElementsByTagName("tr");


      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>


  <!----------------------------CSS--------------------->
<style>
  .consulta{
    margin: 0 auto;
    width: 900px;
    border: 5px #c58845 solid;
    border-radius: 5px;
    padding: 15px;

  }

  .card1{
    margin: 0 auto;
    width: 900px;
    text-align:center;
    padding: 15px;
  }
</style>
