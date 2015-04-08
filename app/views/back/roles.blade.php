@extends('layou/plantille')

@section('content')
    <h1>Roles</h1>
    <div class="wrapperContent">
        <div class="tableContent">
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
                        <td><a href="{{route('showPermissions',$role->id)}}" class="icon-folder-open "></a></td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

@stop