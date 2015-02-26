@extends('layou.plantille')


@section('content')
    <h1>users</h1>
    <a href="{{route('administrator')}}">volver</a>
    <div>
        {{ Form::open(array('name'=>'form-create-user','rotute' => 'createUser', 'method' => 'POST')) }}
        <div>
            {{ Form::label('user_name', 'Username') }}
            {{ Form::text('user_name') }}
            {{$errors->first('user_name')}}
        </div>

        <div>
            {{ Form::label('name', 'Nombre') }}
            {{ Form::text('name') }}
            {{$errors->first('name')}}
        </div>

        <div>
            {{ Form::label('last_name', 'apellido') }}
            {{ Form::text('last_name') }}
            {{$errors->first('last_name')}}
        </div>

        <div>
            {{ Form::label('email', 'E-mail') }}
            {{ Form::text('email') }}
            {{$errors->first('email')}}
        </div>

        <div>
            {{ Form::label('password') }}
            {{ Form::password('password') }}
            {{$errors->first('password')}}
        </div>

        <div>
            {{ Form::label('confirmation_password','confirmar password') }}
            {{ Form::password('confirmation_password') }}
            {{$errors->first('confirmation_password')}}
        </div>

        <div>
            {{ Form::label( 'phone','Telefono') }}
            {{ Form::text('phone') }}
            {{$errors->first('phone')}}
        </div>

        <div>
            {{ Form::label('address', 'Direccion') }}
            {{ Form::text('address') }}
            {{$errors->first('address')}}
        </div>

        <div>
            {{ Form::label('role_id', 'Role') }}
            {{ Form::select('role_id', $charges, null, array('class' => '')) }}
            {{$errors->first('role_id')}}
        </div>

        <div>
            {{Form::label('manager','Encargado')}}
            {{ Form::select('manager', $managers, null, array('class' => '')) }}
            {{ Session::get('manager') }}
        </div>

        {{ Form::submit('Crear usuario') }}

        {{ Form::close() }}

    </div>
    </div>

@stop