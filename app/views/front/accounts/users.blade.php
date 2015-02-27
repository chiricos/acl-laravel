@extends('layou.plantille')


@section('content')
    <h1>users</h1>
    @if(isset($total[4])==1)
    <a href="{{route('createUser')}}">crear usuario</a>
    @endif
    @if(Auth::user()->role_id==1)
        <table class=" ">
            <thead>
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Role</th>
                <th>Encargado</th>
                <th>ver</th>
                @if($total[6]==1)
                    <th>actualizar</th>
                @endif
                @if($total[5]==1)
                    <th>eliminar</th>
                @endif

            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                @if($user->role_id>1)
                <tr>
                    <td>{{ HTML::image('img/'.$user->photo,'',array('id'=>'')) }}</td>
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
                    <p class="i hidden">{{$i=0}}</p>
                    @foreach($users as $user1)
                        @if($user1->id==$user->manager)
                            <p class="i hidden">{{$i=1}}</p>
                            <td>{{$user1->user_name}}</td>
                        @endif
                    @endforeach
                    @if($i==0)
                        <td>sin encargado</td>
                    @endif
                    <td><a href="{{route('home',$user->id)}}" class="icon-folder-open ">ver</a></td>
                    @if(isset($total[6])==1)
                        <td><a href="{{route('updateUser',$user->id)}}" class="icon-folder-open ">actualizar</a></td>
                    @endif
                    @if(isset($total[5)==1)
                        <td><a href="{{route('deleteUser',$user->id)}}" class="icon-folder-open ">eliminar</a></td>
                    @endif
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    @else
        <table class=" ">
            <thead>
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Role</th>
                <th>Encargado</th>
                <th>ver</th>
                @if($total[6]==1)
                <th>actualizar</th>
                @endif
                @if($total[5]==1)
                <th>eliminar</th>
                @endif

            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                @if(Auth::user()->id==$user->manager)
                <tr>
                    <td>{{ HTML::image('img/'.$user->photo,'',array('id'=>'')) }}</td>
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
                    <p class="i hidden">{{$i=0}}</p>
                    @foreach($users as $user1)
                        @if($user1->id==$user->manager)
                            <p class="i hidden">{{$i=1}}</p>
                            <td>{{$user1->user_name}}</td>
                        @endif
                    @endforeach

                    @if($i==0)
                        <td>sin encargado</td>
                    @endif
                    <td><a href="{{route('home',$user->id)}}" class="icon-folder-open ">ver</a></td>
                    @if(isset($total[6])==1)
                        <td><a href="{{route('updateUser',$user->id)}}" class="icon-folder-open ">actualizar</a></td>
                    @endif
                    @if(isset($total[7])==1)
                    <td><a href="{{route('deleteUser',$user->id)}}" class="icon-folder-open ">eliminar</a></td>
                    @endif
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    @endif

@stop