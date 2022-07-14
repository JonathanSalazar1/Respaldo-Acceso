@extends('layouts.app')

@include ('templates.header')
@include ('templates.menu')

<script src="https://kit.fontawesome.com/4f90b872f3.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>


<?php
date_default_timezone_set('America/Monterrey');
$fecha_actual=date("Y-m-d");
date_default_timezone_set('America/Monterrey');
$hora_actual=date("H:i:s");
?>


@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ $message }}</p>
</div>
@endif
<!----------------FORMULARIO--------------->
<form action="{{url('proveedores')}}" method="post" enctype="multipart/form-data">
@csrf
<h1 class="text-center">Registro de Proveedores</h1>

<div class="row g-3">
<div class="col">
<label for="Fecha">Fecha</label>
<input type="date" class="form-control" name="fecha" value="<?= $fecha_actual?>"required>
</div>

<div class="col">
<label for="NoEmp">Número de empleado</label>
<input type="number" class="form-control" name="NoEmp"required>
</div> </div>

<div class="form-group">
<label for="Empresa">Nombre Comercial</label>
<input type="text" class="form-control" name="Empresa"required>
</div>

<div class="form-group">
<label for="NombreProveedor">Nombre de empleado del proveedor</label>
<input type="text" class="form-control" name="NombreProveedor"required>
</div>

<div class="form-group">
<label for="Asunto">Asunto</label>
<input type="text" class="form-control" name="Asunto"required>
</div>

<div class="row g-3">
<div class="col">
<label for="h_entrada">Hora de entrada</label>
<input type="time" class="form-control" name="h_entrada" value="<?= $hora_actual?>"required>
</div>

<div class="col">
<label for="h_salida">Hora de salida</label>
<input type="time" class="form-control" name="h_salida"required>
</div></div>


<div class="col-auto p-5 text-center">
<input class ="btn btn-success  btn-lg" type="submit" center value="Guardar">
<a class ="btn btn-primary  btn-lg" href="/acceso"> Volver </a>
</div>
</form>


<br><br>

<!---------------TABLA DEL LISTADO DE PROVEEDORES EN EL SISTEMA-------->
<div class="card">
    <h5 class="card-header"></h5>
    <div class="card-body">
      <h1 class="text-center">Listado de proveedores en el sistema</h1>
      <p class="card-text">
        @if ($message = Session::get('success'))
<div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ $message }}</p>
</div>
@endif

<div class="row g-3">
<div class="col">
Fecha inicio
  <input type="date"  id="inicio" onchange="myFunction()">
  </div>
  <div class="col">
  Fecha fin
  <input type="date"  id="fin" onchange="myFunction()">
  </div>
  <div class="col">
  <input type="text" id="myInput" onkeyup="myFunction1()" placeholder="Buscar por nombres..">
  </div>
      <a onclick="ExportToExcel('xlsx')"  class="btn btn-success btn-sm">Exportar</a>
<script>
        function ExportToExcel(type, fn, dl) {
    var elt = document.getElementById('cd');
    var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1",dateNF:'dd/mm/yyyy;@',timeNF:'HH:mm;@',cellDates:true,raw:true });
    return dl ?
      XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
      XLSX.writeFile(wb, fn || ('Proveedores.' + (type || 'xlsx')));
}
</script>
</div></div>

<div style="background-color:#c58845" class="alert alert-primary d-flex" role="alert">
                <div>
                    <h2></h2>
                </div>
            </div>
        <div class="table table-wrapper-scroll-x my-custom-scrollbar">
            <table class="table table-striped table-hover table-bordered" id="cd">
                <thead>
                    <th>Número de empleado</th>
                    <th>Fecha</th>
                    <th>Nombre Comercial</th>
                    <th>Nombre de empleado del proveedor</th>
                    <th>Asunto</th>
                    <th>Hora de entrada</th>
                    <th>Hora de salida</th>
                    <th></th>

                </thead>
                <tbody>
                @foreach ($datosProveedores as $item)
                    <tr>
                        <td>{{$item->NoEmp}} </td>
                        <td>{{$item->Fecha}} </td>
                        <td>{{$item->Empresa}} </td>
                        <td>{{$item->NombreProveedor}} </td>
                        <td>{{$item->Asunto}} </td>
                        <td>{{$item->h_entrada}} </td>
                        <td>{{$item->h_salida}} </td>
                        <td>


                            <a class="btn btn-warning btn-sm" href="{{route ('proveedores.edit',$item->id)}}"><span class="fa-solid fa-user-pen"></span></a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

            <script>
              function myFunction1() {

                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("cd");
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
            <script>
                function verify(){
                    if(document.getElementById("inicio").value=='' || document.getElementById("fin").value==''){
                        return false;
                    }
                    return true;
                }

                function myFunction() {
                    if(!verify())return;

                  var inicio, fin, filter, table, tr, td, i, txtValue;
                  inicio = document.getElementById("inicio");
                  fin = document.getElementById("fin");
                  inicio = inicio.value.toUpperCase();
                  fin = fin.value.toUpperCase();
                  table = document.getElementById("cd");
                  tr = table.getElementsByTagName("tr");



                  for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                      txtValue = td.textContent || td.innerText;

                      if (txtValue.slice(1,4) >= inicio.slice(1,4) && txtValue.slice(1,4) <= fin.slice(1,4)) {
                        if(txtValue.slice(5,7) >= inicio.slice(5,7) && txtValue.slice(5,7) <= fin.slice(5,7)){
                            if(txtValue.slice(8,10) >= inicio.slice(8,10) && txtValue.slice(8,10) <= fin.slice(8,10)){
                                tr[i].style.display = "";
                            } else {
                        tr[i].style.display = "none";
                      }
                        } else {
                        tr[i].style.display = "none";
                      }
                      } else {
                        tr[i].style.display = "none";
                      }
                    }
                  }
                }
              </script>
        </div>
      </p>
    </div>
  </div>


<!----------------------------CSS--------------------->
<style>
  form{
    margin: 0 auto;
    width: 900px;
    border: 5px #c58845 solid;
    border-radius: 5px;
    padding: 15px;

  }

  .card{
    margin: 0 auto;
    width: 900px;
    text-align:center;
    border: 5px #c58845 solid;
    border-radius: 5px;
    padding: 15px;
  }


</style>




