<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>permisos</title>
</head>
<body>
    <h1>Permisos</h1>
    @foreach($users as $user)
        <p>{{$user->nombre}}</p>
    @endforeach
</body>
</html>