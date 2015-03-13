@extends('layou/plantille')

@section('content')
    <h2>Roles</h2>
    <div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Ver permisos</th>
                </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td><a href="{{route('showPermissions',$role->id)}}" class="icon-folder-open ">+</a></td>
            </tr>
            @endforeach
            </tbody>

        </table>
    </div>
@stop