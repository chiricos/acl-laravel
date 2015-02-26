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
{{ Session::get('message') }}
    <header>
        <a href="{{route('business')}}">Empresas</a>
        <a href="{{route('contacts')}}">contactos</a>
        <a href="{{route('administrator')}}">Administrar</a>
        <a href="{{route('profile')}}">Perfil</a>

    </header>

    @yield('content')
    {{ HTML::link(URL::to('logout'), 'Cerrar Session',array('id'=>'e')) }}
</body>
</html>