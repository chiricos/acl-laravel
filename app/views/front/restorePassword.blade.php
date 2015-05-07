<!DOCTYPE HTML>
<html>
<head>

</head>
<body>
<div style="  width: 80%; margin: auto; text-align: center; padding: 30px">
    {{ HTML::image('img/logo.png','',array('id'=>'logo')) }}
    <section style="border: 1px solid rgba(0, 0, 0, 0.4); margin-top: 25px">
        <h1 style=" border-bottom: 1px solid rgba(0, 0, 0, 0.4); box-shadow: 0px 6px 24px rgba(0, 0, 0, 0.45);margin: 0px 0px 10px ;  padding: 10px;">Restaurar Contraseña</h1>
        {{ Form::open(array('url' => 'restaurarContraseña/'.$user['id'],'class'=>'Credito-form')) }}
        <div class="material-input" style="margin: 10px">
            {{Form::password('password','',['id' => 'password'])}}
            {{Form::label('password','Password')}}
            {{$errors->first('password')}}
        </div>

        <div class="material-input" style="margin: 10px">
            {{Form::password('confirmar_password','',['id' => 'confirmar_password'])}}
            {{Form::label('confirmar_password','Confirmar Password')}}
            {{$errors->first('confirmar_password')}}
        </div>

        <button class="u-button" style="margin: 10px">
            Restaurar contraseña
        </button>

        {{ Form::close() }}


    </section>
</div>
