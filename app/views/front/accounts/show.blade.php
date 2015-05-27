@extends('layou.plantille')

@section('titleContent')
    <h1>Datos Del Usuario</h1>
@stop

@section('content')

    <a class="icon-reply back" href="{{route('administrator')}}"></a>

    @if(count($users)>0)
        @if(Auth::user()->role_id==1)
            <div class="wrapperContent">
            <section class="tableContent">
                <table>
                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Role</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ HTML::image('user/'.$user->photo,'',array('id'=>'')) }}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->phone}}</td>
                            @if($user->role_id==0)
                                <td>sin cargo</td>
                            @endif
                            @if($user->role_id==1)
                                <td>Super Administrador</td>
                            @endif
                            @if($user->role_id==2)
                                <td>Administrador</td>
                            @endif
                            @if($user->role_id==3)
                                <td>Vendedor</td>
                            @endif

                            @if(isset($total[7]))
                                @if($total[7]==1)
                                    <td><a href="{{route('showUser',$user->id)}}" class="icon-folder-open "></a>
                                        @endif
                                        @endif
                                        @if(isset($total[6]))
                                            @if($total[6]==1)
                                                <a href="{{route('updateUser',$user->id)}}" class="icon-ccw "></a>
                                            @endif
                                        @endif
                                        @if(isset($total[5]))
                                            @if($total[5]==1)
                                                <a href="{{route('deleteUser',$user->id)}}" class="icon-trash "></a></td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
            </div>
        @endif
    @endif
            @if($user->role_id==3 AND count($business)>0)
            <div class="wrapperContent">
            <div class="tableContent ">
                <h2>Clientes</h2>
                <table class=" show-business">
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
                        @if($businessClient->type==1)

                            <tr>
                                <td>{{ HTML::image('business/'.$businessClient->photo,'',array('style'=>'width: 100px;')) }}</td>
                                <td>{{$businessClient->name}}</td>
                                <td>{{$businessClient->state}}</td>
                                <td>{{$businessClient->address}}</td>
                                <td>{{$businessClient->email}}</td>
                                <td>{{$businessClient->mobile_phone}}</td>
                                <td>{{$user->user_name}}</td>

                                <td><a class="icon-folder-open" href="{{route('seeBusiness',$businessClient->id)}}"></a> <a href="{{route('updateBusiness',$businessClient->id)}}" class="icon-ccw "></a><a class="icon-plus-circled" href="{{route('createProducts',$businessClient->id)}}"></a></td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>

                </div>
                </div>
            <div class="wrapperContent">

                <div class="tableContent">
                    <h2>Prospectos</h2>
                    <table class="show-business ">
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
                        @if($businessClient->type==2)

                            <tr>
                                <td>{{ HTML::image('business/'.$businessClient->photo,'',array('style'=>'width: 100px;')) }}</td>
                                <td>{{$businessClient->name}}</td>
                                <td>{{$businessClient->state}}</td>
                                <td>{{$businessClient->address}}</td>
                                <td>{{$businessClient->email}}</td>
                                <td>{{$businessClient->mobile_phone}}</td>
                                <td>{{$user->user_name}}</td>
                                <td><a class="icon-folder-open" href="{{route('seeBusiness',$businessClient->id)}}"></a> <a href="{{route('updateBusiness',$businessClient->id)}}" class="icon-ccw "></a><a class="icon-plus-circled" href="{{route('createProducts',$businessClient->id)}}"></a></td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>

        </div>

    </div>
    @endif

                @if(count($logs)>0)
                    <div class="formContent">
                        <div>
                    <h2 class="showMove">Movimientos</h2>
                    <section class="profileLogs hidden">
                        @foreach($logs as $log)
                            <p>
                                {{$log->responsible}}
                                 {{$log->action}}
                                @if($log->affected_entity)
                                    de {{$log->affected_entity}}
                                @endif
                                el {{$log->created_at}}
                            </p>
                        @endforeach
                    </section>
                        </div>
                    </div>
                @else
                    <p>No tiene movimientos dentro de la plataforma</p>
                @endif


@stop

@section('javascript')
    {{ HTML::script('js/user.js'); }}
@stop
