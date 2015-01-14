<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Registro de usuarios</title>
</head>
<body>
<h1>Registrese</h1>
{{Form::open(array('url'=>'registrarse','method'=>'POST'))}}

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
{{Form::text('id_role',3,array('style'=>'display:none;'))}}
{{ Form::submit('Registrarse')}}
{{Form::close()}}
</body>
</html>