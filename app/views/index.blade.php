<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
	</head>
<body>
    <header>
        {{HTML::link(URL::to('permiso1'),'1')}}
        {{HTML::link(URL::to('permiso2'),'2')}}
        {{HTML::link(URL::to('permiso3'),'3')}}
        {{HTML::link(URL::to('permiso4'),'4')}}
        {{HTML::link(URL::to('permiso5'),'5')}}
        {{HTML::link(URL::to('permiso6'),'6')}}
        {{HTML::link(URL::to('permiso7'),'7')}}
        {{HTML::link(URL::to('permiso8'),'8')}}
        {{HTML::link(URL::to('permiso9'),'9')}}
        {{HTML::link(URL::to('permiso10'),'10')}}
        {{HTML::link(URL::to('permiso11'),'11')}}
        {{HTML::link(URL::to('permiso12'),'12')}}
    </header>
	<h1>hola como estas {{Auth::user()->nombre}}</h1>


    <div id="cerrar-session">
        {{ HTML::link(URL::to('logout'), 'Cerrar Session',array('id'=>'e')) }}
    </div>
</body>
</html>