
@extends('layou.plantille')

@section('titleContent')
    <h1>CLIENTES</h1>
@stop

@section('content')
    <a href="{{route('createBusiness')}} " class="buttonA">crear</a>
    <div class="">
        {{ Form::open(array('name'=>'form','route' => 'Business', 'method' => 'POST','class'=>'formSearch')) }}
        <div class="buttonSearch">
            <div>
                {{Form::text('search')}}
            </div>

            <button>{{ HTML::image('img/search.png','',array('id'=>'')) }}</button>
            {{Form::close()}}
        </div>
    </div>
        <div class="wrapperContent">
            <section class="tableContent">
                <h2>Lista de Clientes</h2>
                        <table class=" ">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th>Direccion</th>
                                    <th>E-mail</th>
                                    <th>Celular</th>
                                    <th>Encargado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($business as $businessClient)
                                @if(Auth::user()->role_id==3)
                                    @if($businessClient->manager==Auth::user()->id)
                                        @if($businessClient->type==1)
                                            <tr>
                                                <td>{{ HTML::image('business/'.$businessClient->photo,'',array('style'=>'width: 100px;')) }}</td>
                                                <td>{{$businessClient->name}}</td>
                                                <td>{{$businessClient->state}}</td>
                                                <td>{{$businessClient->address}}</td>
                                                <td>{{$businessClient->email}}</td>
                                                <td>{{$businessClient->mobile_phone}}</td>
                                                @foreach($users as $user)
                                                    @if($user->id==$businessClient->manager)
                                                        <td>{{$user->user_name}}</td>
                                                    @endif
                                                @endforeach

                                                <td>
                                                    <a class="icon-folder-open" href="{{route('seeBusiness',$businessClient->id)}}">Ver</a>
                                                    @if(Auth::user()->role_id>1)
                                                    <a href="{{route('updateBusiness',$businessClient->id)}}" class="icon-ccw ">Editar</a>
                                                    <a class="icon-plus-circled" href="{{route('createProducts',$businessClient->id)}}">Agregar producto</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                @else
                                    @if($businessClient->type==1)
                                        <tr>
                                            <td>{{ HTML::image('business/'.$businessClient->photo,'',array('style'=>'width: 100px;')) }}</td>
                                            <td>{{$businessClient->name}}</td>
                                            <td>{{$businessClient->state}}</td>
                                            <td>{{$businessClient->address}}</td>
                                            <td>{{$businessClient->email}}</td>
                                            <td>{{$businessClient->mobile_phone}}</td>
                                            @foreach($users as $user)
                                                @if($user->id==$businessClient->manager)
                                                    <td>{{$user->user_name}}</td>
                                                @endif
                                            @endforeach
                                            <td>
                                                <a class="icon-folder-open" href="{{route('seeBusiness',$businessClient->id)}}">Ver</a>
                                                @if(Auth::user()->role_id>1)
                                                <a href="{{route('updateBusiness',$businessClient->id)}}" class="icon-ccw ">Editar</a>
                                                <a class="icon-plus-circled" href="{{route('createProducts',$businessClient->id)}}">Agregar producto</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endif

                            @endforeach
                            </tbody>
                        </table>
            </section>
            </div>
            <div class="wrapperContent">
                <section class="tableContent">
                <h2>Lista de Prospectos-Cotizacion</h2>
                <table class=" ">
                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Direccion</th>
                        <th>E-mail</th>
                        <th>Celular</th>
                        <th>Encargado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($business as $businessClient)
                        @if(Auth::user()->role_id==3)
                            @if($businessClient->manager==Auth::user()->id)
                                @if($businessClient->type==2)

                                    <tr>
                                        <td>{{ HTML::image('business/'.$businessClient->photo,'',array('style'=>'width: 100px;')) }}</td>
                                        <td>{{$businessClient->name}}</td>
                                        <td>{{$businessClient->state}}</td>
                                        <td>{{$businessClient->address}}</td>
                                        <td>{{$businessClient->email}}</td>
                                        <td>{{$businessClient->mobile_phone}}</td>
                                        @foreach($users as $user)
                                            @if($user->id==$businessClient->manager)
                                                <td>{{$user->user_name}}</td>
                                            @endif
                                        @endforeach
                                        <td>
                                            <a class="icon-folder-open" href="{{route('seeBusiness',$businessClient->id)}}">Ver</a>
                                            @if(Auth::user()->role_id>1)
                                            <a href="{{route('updateBusiness',$businessClient->id)}}" class="icon-ccw ">Editar</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @else
                            @if($businessClient->type==2)

                                <tr>
                                    <td>{{ HTML::image('business/'.$businessClient->photo,'',array('style'=>'width: 100px;')) }}</td>
                                    <td>{{$businessClient->name}}</td>
                                    <td>{{$businessClient->state}}</td>
                                    <td>{{$businessClient->address}}</td>
                                    <td>{{$businessClient->email}}</td>
                                    <td>{{$businessClient->mobile_phone}}</td>
                                    @foreach($users as $user)
                                        @if($user->id==$businessClient->manager)
                                            <td>{{$user->user_name}}</td>
                                        @endif
                                    @endforeach
                                    <td><a class="icon-folder-open" href="{{route('seeBusiness',$businessClient->id)}}">Ver</a>
                                        @if(Auth::user()->role_id>1)
                                        <a href="{{route('updateBusiness',$businessClient->id)}}" class="icon-ccw ">Editar</a></td>
                                        @endif
                                </tr>
                            @endif
                        @endif

                    @endforeach
                    </tbody>
                </table>

            </section>
        </div>


@stop

@section('javascript')
    {{ HTML::script('js/business.js'); }}
    {{ HTML::script('js/maps.js'); }}
@stop