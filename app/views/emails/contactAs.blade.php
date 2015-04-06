<!DOCTYPE HTML>
<html>
<head>
    <title>Correo de Contactenos</title>
</head>
<body>
<h1>Correo de {{$user_name}}</h1>
<section>
    <p>Nombre: {{$name}}</p>
    <p>Username: {{$user_name}}</p>
    <p>de: {{$email}}</p>
    <p>Asunto: {{$about}} </p>
    <p>mensaje: {{$text}}</p>
    <a href="{{route('showUser',$link)}}">ir</a>
</section>
</body>
</html>
