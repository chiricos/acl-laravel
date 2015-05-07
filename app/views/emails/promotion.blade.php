<!DOCTYPE HTML>
<html>
<head>
    <title>Correo de Contactenos</title>
</head>
<body style="color: black">
<div style="  width: 50%; margin: auto; text-align: center; padding: 30px">
    {{ HTML::image('img/mm.png','',array('id'=>'logo')) }}
    <div style="border: 1px solid rgba(0, 0, 0, 0.4); margin-top: 25px">
        <h1 style=" border-bottom: 1px solid rgba(0, 0, 0, 0.4); box-shadow: 0px 6px 24px rgba(0, 0, 0, 0.45);margin: 0px 0px 10px;  padding: 10px;">Mi-Martinez.com </h1>
        <p>Asunto: {{$about}} </p>
        <p>{{$text}}</p>
    </div>
</div>

</body>
</html>
