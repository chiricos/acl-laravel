<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="author" content="Drawde"/>
    <meta name="description" content="CRM Mi-Martinez"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1"/>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('css/normalize.min.css')}}"/>
    {{ HTML::style('css/Login.css'); }}
    <link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="danger">{{ Session::get('mensaje_error') }}</div>
<div class="message">{{ Session::get('mensaje') }}</div>
<div id ="ima">
    <img src="img/logo.png" />
</div>
<section class="container">
    <div class="panel">
        <div class="panel-body">
            {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
            @if(Session::has('mensaje_error'))

            @endif
            {{ Form::open(array('route' => 'login')) }}
            <div class="form-group">
                {{ Form::email('email', Input::old('email'), array('class' => 'form-control','placeholder'=>'E-mail'),'required') }}
            </div>
            <div class="form-group">
                {{ Form::password('password', array('class' => 'form-control','placeholder'=>'Contraseña')); }}
            </div>
            <div class="margen">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('rememberme', true) }}
                        Recordar contraseña
                    </label>
                </div>
                <div class="enviar">
                    {{ Form::submit('Ingresar', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}
                </div>
            </div>
            <a href="{{route('restore')}}" class=" ">Olvidaste la contraseña</a>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery.js"></script>
</body>
</html>