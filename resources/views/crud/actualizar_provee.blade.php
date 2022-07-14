@include ('templates.header')


<?php
date_default_timezone_set('America/Monterrey');
$fecha_actual=date("Y-m-d");
date_default_timezone_set('America/Monterrey');
$hora_actual=date("H:i:s");
?>

<form action="{{route ('proveedores.update', $datosProveedores->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method("PUT")
<h1 class="text-center">Actualizar Proveedor</h1>


<div class="row g-3">
<div class="col">
<label for="Fecha">Fecha</label>
<input type="date" class="form-control" name="fecha" value="{{$datosProveedores->Fecha}}"required>
</div>

<div class="col">
<label for="Empresa">Nombre Comercial</label>
<input type="text" class="form-control" name="Empresa" value="{{$datosProveedores->Empresa}}"required>
</div></div>

<div class="form-group">
<label for="NombreProveedor">Nombre de empleado del proveedor</label>
<input type="text" class="form-control" name="NombreProveedor" value="{{$datosProveedores->NombreProveedor}}"required>
</div>

<div class="form-group">
<label for="Asunto">Asunto</label>
<input type="text" class="form-control" name="Asunto" value="{{$datosProveedores->Asunto}}"required>
</div>

<div class="row g-3">
<div class="col">
<label for="h_entrada">Hora de entrada</label>
<input type="time" class="form-control" name="h_entrada" value="{{$datosProveedores->h_entrada}}"required>
</div>

<div class="col">
<label for="h_salida">Hora de salida</label>
<input type="time" class="form-control" name="h_salida" value="{{$datosProveedores->h_salida}}"required>
</div></div>



<div class="col-auto p-5 text-center">
<input class ="btn btn-success btn-lg" type="submit" center value="Actualizar">
<a class ="btn btn-primary btn-lg" href="/proveedores"> Volver <a/>
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
  </style>
