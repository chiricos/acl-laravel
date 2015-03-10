@extends('layou.plantille')


@section('content')

            <section class="show-business">
                <h2>Clientes</h2>
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
                <h2>Prospectos</h2>
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
            </section>

        </div>

    </div>

@stop
