@extends('layouts.app')

@include ('templates.header')
@include ('templates.menu')

<?php
date_default_timezone_set('America/Monterrey');
$fecha_actual=date("Y-m-d");
date_default_timezone_set('America/Monterrey');
$hora_actual=date("H:i:s");
?>

<form action="{{url('externo')}}" method="post" enctype="multipart/form-data">
@csrf
<h1 class="text-center">Registro de Personal externo</h1>

<div class="form-group">
<label for="Fecha de entrada">Nombre</label>
<input type="text" class="form-control" name="nombre required">
</div>

<div class="form-group">
<label for="Fecha de entrada">Empresa</label>
<input type="text" class="form-control" name="empresa" required>
</div>

<div class="form-group">
<label for="Fecha de entrada">Placas</label>
<input type="text" class="form-control" name="placas" required>
</div>

<div class="form-group">
<label for="Fecha de entrada">Fecha</label>
<input type="date" class="form-control" name="fecha" value="<?= $fecha_actual?>">
</div>

<div class="form-group">
<label for="Hora de salida" class=>Hora de entrada</label>
<input type="time" class="form-control" name="hora" value="<?= $hora_actual?>">
</div>

<div class="form-group">
<label for="Fecha de entrada">Observaciones</label>
<input type="text" class="form-control" name="observaciones">
</div>

<div class="text-center">
<select class="form-select" name="motivo">
  <option selected>Motivo</option>
  <option value="Entrada">Entrada</option>
  <option value="Salida">Salida</option>
</select>
</div>

<div class="col-auto p-5 text-center">
<input class ="btn btn-success" type="submit" center value="Guardar">
<a class ="btn btn-primary" href="acceso"> Volver <a/>
</div>

</form