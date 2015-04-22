<!DOCTYPE HTML>
<html>
<head>
    <title>@section('title') Cerverus  @show</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="author" content="Drawde"/>
    <meta name="description" content="CRM Mi-Martinez"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1"/>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('css/normalize.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>

    <!-- Style <script src="{{asset('js/prefixfree.min.js')}}"></script>-->
    <script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    @yield('javascript')
</head>
<body>


    <header>
        {{ HTML::image('img/logo.png','',array('id'=>'logo')) }}
        <a href="{{route('profile')}}">
        <section class="headerProfile">
            <figure>
                {{ HTML::image('user/'.Auth::user()->photo,'',array('id'=>'')) }}
                <div>
                    <p>{{Auth::user()->name }} {{Auth::user()->last_name}}</p>
                    @if(Auth::user()->role_id==1)
                        <span>Super Administrador</span>
                    @endif
                    @if(Auth::user()->role_id==2)
                        <span>Administrador</span>
                    @endif
                    @if(Auth::user()->role_id==3)
                        <span>Vendedor</span>
                    @endif

                </div>
            </figure>
        </section>
        </a>
        <nav>
            <a href="{{route('home')}}">Inicio</a>
            @if(isset($total[1]) )
                @if($total[1]==1)
                    <a href="{{route('business')}}">Clientes</a>
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
            @if(isset($total[12]))
                @if($total[12]==1)
                    <a href="{{route('charts')}}">Reportes</a>
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
                    <a  href="{{route('contactAs')}}">Contactenos</a>
                @endif
            @endif

            {{ HTML::link(URL::to('logout'), 'Cerrar Sessión',array('class'=>'')) }}
        </nav>

    </header>


    <div class="wrapper">
        @yield('titleContent')

        <section class="wrapperBody">

        </section>
        <section class="wrapperBody1">

        <section class="working">


            <section class="row">
                <div class="rowContent">
                    @if( Session::get('message'))
                        <div class="message">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    @if( Session::get('message_error'))
                        <div class="messageError">
                            {{ Session::get('message_error') }}
                        </div>
                    @endif

                </div>
            </section>
           @yield('content')

        </section>
        </section>



    </div>


</body>
</html>