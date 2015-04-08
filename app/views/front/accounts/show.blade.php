@extends('layou.plantille')


@section('content')
    <h1>Datos del Usuario</h1>
            @if($user->role_id==3)
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

                                <td><a href="{{route('seeBusiness',$businessClient->id)}}">+</a><a href=" {{route('business')}}">E</a> <a href="{{route('updateBusiness',$businessClient->id)}}">a</a></td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>

                </div>

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
                                <td><a href="{{route('seeBusiness',$businessClient->id)}}">+</a><a href=" {{route('business')}}">E</a> <a href="{{route('updateBusiness',$businessClient->id)}}">a</a></td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>

        </div>

    </div>
    @endif
            <div>
                @if(count($logs)>0)
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

                @endif
            </div>

@stop

@section('javascript')
    {{ HTML::script('js/user.js'); }}
@stop
