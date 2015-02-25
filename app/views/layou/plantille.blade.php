<!DOCTYPE HTML>
<html>
<head>
    <title>@section('title') Cerverus  @show</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="author" content="Drawde"/>
    <meta name="description" content="CRM Mi-Martinez"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1"/>

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('css/normalize.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>

    <!-- Style <script src="{{asset('js/prefixfree.min.js')}}"></script>-->
    <script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
    @yield('javascript')
</head>
<body>

    <header>
        {{HTML::link(URL::to('permiso1'),'crear cuentas')}}
        {{HTML::link(URL::to('permiso2'),'permisos')}}
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
        {{ HTML::link(URL::to('logout'), 'Cerrar Session',array('id'=>'e')) }}
    </header>
    <h1>fda</h1>
    @yield('content')
</body>
</html>