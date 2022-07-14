@extends('layouts.app')

@include ('templates.header')
@include ('templates.menu')

<?php
date_default_timezone_set('America/Monterrey');
$fecha_actual=date("Y-m-d");
date_default_timezone_set('America/Monterrey');
$hora_actual=date("H:i:s");
?>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible justify-content-center">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>{{ $message }}</p>
</div>
@endif


<form action="{{url('observaciones')}}" method="post" enctype="multipart/form-data">
@csrf
<h1 class="text-center">Registro de Observaciones</h1>

<div class="row g-3">
<div class="col">
<label for="Fecha de entrada">Fecha</label>
<input type="date" class="form-control" name="Fecha" value="<?= $fecha_actual?>">
</div>

<div class="col">
<label for="Fecha de entrada">Número de empleado</label>
<input type="text" class="form-control" name="numempleado" required>
</div>
</div>

<div class="form-group">
<label for="Fecha de entrada">Hora</label>
<input type="time" class="form-control" name="hora" value="<?= $hora_actual?>">
</div>

<div class="form-group">
<label for="Fecha de entrada">Observaciones</label>
<input type="text" class="form-control" name="comentarios" required>
</div>


<div class="col-auto p-5 text-center">
<input class ="btn btn-success btn-lg" type="submit" center value="Guardar">
<a class ="btn btn-primary btn-lg" href="acceso"> Volver <a/>
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
