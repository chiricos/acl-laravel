<!DOCTYPE HTML>
<html>
<head>

</head>
<body>



    <section class="Slider u-shadow-5">
        <h1>Restaurar Contraseña</h1>
        {{ Form::open(array('url' => 'restaurarContraseña/'.$user['id'],'class'=>'Credito-form')) }}
        <div class="material-input">
            {{Form::password('password','',['id' => 'password'])}}
            {{Form::label('password','Password')}}
            {{$errors->first('password')}}
        </div>

        <div class="material-input">
            {{Form::password('confirmar_password','',['id' => 'confirmar_password'])}}
            {{Form::label('confirmar_password','Confirmar Password')}}
            {{$errors->first('confirmar_password')}}
        </div>

        <button class="u-button">
            Restaurar contraseña
        </button>

        {{ Form::close() }}



    </section>
</body>
</html>