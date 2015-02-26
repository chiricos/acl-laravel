<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <title>Login</title>
    {{ HTML::style('css/Login.css'); }}
    <link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="danger">{{ Session::get('mensaje_error') }}</div>
<div id ="ima">
    <img src="img/logo.png" />
</div>
<section class="container">
    <div class="panel">
        <div class="panel-body">
            {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
            @if(Session::has('mensaje_error'))

            @endif
            {{ Form::open(array('url' => 'restaurar')) }}
            <div class="form-group">
                {{ Form::email('email', Input::old('email'), array('class' => 'form-control','placeholder'=>'Correo','required')); }}
            </div>
            <div class="margen">
                <div class="enviar">
                    {{ Form::submit('Enviar correo', array('class' => 'login-button')) }}
                    {{ Form::close() }}
                </div>
            </div>
            <a href="{{route('login')}}" class=" ">Iniciar Session</a>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery.js"></script>
</body>
</html>