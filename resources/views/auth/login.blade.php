@extends('layouts.app')

@section('content')
<link href="{{ asset('css/header.css') }}" rel="stylesheet">


        <div class="panel-heading div_title">
            <div class="row">
                <div class="col-2 col-sm-2 col-md-1 d-flex align-items-center">
                    <img src="{{asset('images/2.jpeg')}}" class="img_fc_logo" alt="fc_logo">
                        
                </div>
                <div class="col-8 col-sm-8 col-md-10 d-flex align-items-center">
                    <h4 class="luz" id="blink">INSTITUCION POLICIAL ESTATAL FUERZA CIVIL</h4>
                </div>
                <div class="col-2 col-sm-2 col-md-1 d-flex align-items-center">
                    <img src="{{asset('images/3.jpg')}}" class="img_fc_logo" alt="rino">
                </div>
            </div>
        </div>
    </div>
    
    <div class="card container text-center">
                <div class="card-body">

                <img src="{{asset('images/fc_logoo1.jpg')}}" class="img_fc_login" alt="login">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="card-header text-center">{{ __('Iniciar Sesión') }}</div><br><br>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Correo o contraseña incorrecta</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Contraseña incorrecta</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Turno') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" name="estatus">
                                <option selected>Turno</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                </select>
                            </div>
                        </div>


                        <div class="row mb-0 text-left">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success ">
                                    {{ __('Ingresar') }}
                                </button>

                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
