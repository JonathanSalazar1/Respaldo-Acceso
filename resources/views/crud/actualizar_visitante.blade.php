@include ('templates.header')


<?php
date_default_timezone_set('America/Monterrey');
$fecha_actual=date("Y-m-d");
date_default_timezone_set('America/Monterrey');
$hora_actual=date("H:i:s");
?>

<form action="{{route ('crud.update_visita', $datosVisitantes->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method("PUT")
<h1 class="text-center">Actualizar Visitante</h1>


<div class="row g-3">
<div class="col">
<label for="Empresa">Fecha</label>
<input type="date" class="form-control" name="Fecha" value="{{$datosVisitantes->Fecha}}"required>
</div>


<div class="col">
<label for="Empresa">Nombre del visitante</label>
<input type="text" class="form-control" name="Nombre" value="{{$datosVisitantes->Nombre}}"required>
</div>
</div>

<div class="row g-3">
<div class="col">
<label for="NombreProveedor">Apellido Paterno</label>
<input type="text" class="form-control" name="ApellidoPaterno" value="{{$datosVisitantes->ApellidoPaterno}}"required>
</div>

<div class="col">
<label for="Asunto">Apellido Materno</label>
<input type="text" class="form-control" name="ApellidoMaterno" value="{{$datosVisitantes->ApellidoMaterno}}"required>
</div>
</div>

<div class="form-group">
<label for="h_entrada">Asunto</label>
<input type="text" class="form-control" name="Asunto" value="{{$datosVisitantes->Asunto}}"required>
</div>

<div class="form-group">
<label for="h_salida">Identidicacion</label>
<input type="text" class="form-control" name="Identificacion" value="{{$datosVisitantes->Identificacion}}"required>
</div>

<div class="row g-3">
<div class="col">
    <label for="h_salida">Hora de entrada</label>
    <input type="time" class="form-control" name="h_entrada" value="{{$datosVisitantes->h_entrada}}"required>
    </div>

    <div class="col">
    <label for="h_salida">Hora de salida</label>
    <input type="time" class="form-control" name="h_salida" value="{{$datosVisitantes->h_salida}}"required>
    </div>
    </div>

<div class="col-auto p-5 text-center">
<input class ="btn btn-success btn-lg" type="submit" center value="Actualizar">
<a class ="btn btn-primary btn-lg" href="/visitantes"> Volver <a/>
</div>

  <!----------------------------CSS--------------------->
  <style>
  form{
    margin: 0 auto;
    width: 960px;
    border: 5px #c58845 solid;
    border-radius: 5px;
    padding: 15px;

  }
</style>
