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
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    @yield('javascript')
</head>
<body>

{{ Session::get('message') }}
{{ Session::get('message_error') }}
    <header>
                <a href="{{route('home')}}">Inicio</a>
        @if(isset($total[1]) )
            @if($total[1]==1)
                <a href="{{route('business')}}">Empresas</a>
            @endif
        @endif
        @if(isset($total[10]))
            @if($total[10]==1)
                <a href="{{route('product')}}">Productos</a>
            @endif
        @endif
        @if(isset($total[2]))
            @if($total[2]==1)
                <a href="{{route('contacts')}}">contactos</a>
            @endif
        @endif
        @if(isset($total[3]))
            @if($total[3]==1)
                <a href="{{route('administrator')}}">Administrar</a>
            @endif
        @endif
        @if(isset($total[8]))
            @if($total[8]==1)
                <a href="{{route('roles')}}">Roles</a>
            @endif
        @endif
        @if(isset($total[11]))
            @if($total[11]==1)
                <a href="{{route('promotion')}}">Promociones</a>
            @endif
        @endif
        @if(isset($total[9]))
            @if($total[9]==1)
                <a href="{{route('contactAs')}}">Contactenos</a>
            @endif
        @endif

        <a href="{{route('profile')}}">Perfil</a>
    </header>

    @yield('content')
    {{ HTML::link(URL::to('logout'), 'Cerrar Session',array('id'=>'e')) }}
</body>
</html>