
<!DOCTYPE HTML>
<html>
<head>
    <title>restaurar contraseña</title>
    <meta charset="utf-8" />
</head>
<body>
<div style="  width: 50%; margin: auto; text-align: center; padding: 30px">
    {{ HTML::image('img/logo.png','',array('id'=>'logo')) }}
    <div style="border: 1px solid rgba(0, 0, 0, 0.4); margin-top: 25px">
        <h1 style=" border-bottom: 1px solid rgba(0, 0, 0, 0.4); box-shadow: 0px 6px 24px rgba(0, 0, 0, 0.45);margin: 0px 0px 10px;  padding: 10px;">Restaurar Contraseña</h1>
        <p> Para poder restaurar su contraseña dale click {{ HTML::link(URL::to($link), 'Aqui ') }}, pero si ud no realizo la restauracion de la contraseña haga caso omiso a este email.</p>
    </div>
</div>

</body>
</html>