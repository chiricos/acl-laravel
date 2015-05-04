@extends('layou/plantille')

@section('titleContent')
    <h1>
        @if($id==1)
            Super Administrador
        @endif
        @if($id==2)
            Administrador
        @endif
        @if($id==3)
            Vendedor
        @endif
    </h1>
@stop

@section('content')
<div class="formContent">
    <div class="wrapperContent">
        <div class="tableContent">
            <table>
                <thead>
                <tr>
                    <th>Permisos</th>
                    @if($id>1)
                    <th>Acciones</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                {{ Form::open(array('name'=>'form-update-permission','url' => 'admin/actualizarPermisos/'.$id, 'method' => 'POST')) }}
                    @foreach($permissions as $permission)
                    <tr>
                        <td>{{$permission->name}}</td>
                        @if($id>1)
                            @if($permission->permissionRole)
                                <td>{{ Form::checkbox(''.$permission->id.'',$permission->id,$permission->id) }}</td>
                            @else
                                <td>{{ Form::checkbox(''.$permission->id.'',$permission->id) }}</td>
                            @endif
                        @endif

                    </tr>
                    @endforeach

                </tbody>
            </table>


        </div>

    </div>
    @if($id>1)
        <div>
            {{ Form::submit('Actualizar Permisos') }}
        </div>


    {{ Form::close() }}
    @endif
</div>
@stop
