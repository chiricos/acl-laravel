<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8" />
    <title>creacion de cuentas</title>
</head>
<body>
    <h1>Creación de cuentas</h1>
    {{Form::open(array('url'=>'permiso1','method'=>'POST'))}}

    {{Form::text('username',null,array('placeholder'=>'username'))}}
    {{$errors->first('username')}}
    {{Form::text('nombre',null,array('placeholder'=>'nombre'))}}
    {{$errors->first('nombre')}}
    {{Form::text('apellido',null,array('placeholder'=>'apellido'))}}
    {{$errors->first('apellido')}}
    {{Form::email('correo',null,array('placeholder'=>'correo'))}}
    {{$errors->first('correo')}}
    {{Form::password('password',array('placeholder'=>'password'))}}
    {{$errors->first('password')}}
    {{Form::password('confirmar_password',array('placeholder'=>'confirmar password'))}}
    {{$errors->first('confirmar_password')}}
    {{ Form::select('id_role', $roles, null, array('class' => 'selectrole')) }}
    {{$errors->first('id_role')}}
    {{ Form::submit('Crear Cuenta')}}
    {{Form::close()}}
</body>
</html>