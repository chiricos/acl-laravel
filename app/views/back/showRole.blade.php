@extends('layou/plantille')

@section('content')
    <h2>
        @if($id==1)
            Super Administrador
        @endif
        @if($id==2)
            Administrador
        @endif
        @if($id==3)
            Vendedor
        @endif
    </h2>
    <div>
        <table>
            <thead>
            <tr>
                <th>Permisos</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            {{ Form::open(array('name'=>'form-update-permission','url' => 'admin/actualizarPermisos/'.$id, 'method' => 'POST')) }}
                @foreach($permissions as $permission)
                <tr>
                    <td>{{$permission->name}}</td>
                    @if($permission->permissionRole)
                        <td>{{ Form::checkbox(''.$permission->id.'',$permission->id,$permission->id) }}</td>
                    @else
                        <td>{{ Form::checkbox(''.$permission->id.'',$permission->id) }}</td>
                    @endif

                </tr>
                @endforeach

            </tbody>
        </table>

        {{ Form::submit('Actualizar usuario') }}

        {{ Form::close() }}
    </div>
@stop
