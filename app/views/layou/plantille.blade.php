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
{{ Session::get('message_error') }}
    <header>
        @if(isset($total[1]) )
            @if($total[1]==1)
                <a href="{{route('business')}}">Empresas</a>
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

        <a href="{{route('profile')}}">Perfil</a>
    </header>

    @yield('content')
    {{ HTML::link(URL::to('logout'), 'Cerrar Session',array('id'=>'e')) }}
</body>
</html>