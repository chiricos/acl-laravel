@extends('layou.plantille')


@section('content')
    <h1>users</h1>
    <a href="{{route('administrator')}}">volver</a>
    <div>
        {{ Form::open(array('name'=>'form-create-user','rotute' => 'uploadUser', 'method' => 'POST')) }}

        {{ Form::text('id',$user->id,['id'=>'hidden']) }}

        <div>
            {{ Form::label('user_name', 'Username') }}
            {{ Form::text('user_name',$user->user_name) }}
            {{$errors->first('user_name')}}
        </div>

        <div>
            {{ Form::label('name', 'Nombre') }}
            {{ Form::text('name',$user->name) }}
            {{$errors->first('name')}}
        </div>

        <div>
            {{ Form::label('last_name', 'apellido') }}
            {{ Form::text('last_name',$user->last_name) }}
            {{$errors->first('last_name')}}
        </div>

        <div>
            {{ Form::label('email', 'E-mail') }}
            {{ Form::text('email',$user->email) }}
            {{$errors->first('email')}}
        </div>

        <div>
            {{ Form::label( 'phone','Telefono') }}
            {{ Form::text('phone',$user->phone) }}
            {{$errors->first('phone')}}
        </div>

        <div>
            {{ Form::label('address', 'Direccion') }}
            {{ Form::text('address',$user->address) }}
            {{$errors->first('address')}}
        </div>

        <div>
            {{ Form::label('role_id', 'Role') }}
            {{ Form::select('role_id', $charges, $user->role_id, array('id' => 'role_id')) }}
            {{$errors->first('role_id')}}
        </div>

        <div class="create-manager">
            {{Form::label('manager','Encargado','',array('class'=>'manager'))}}
            {{ Form::select('manager', $managers, $user->manager, array('id' => 'manager')) }}
            {{ Session::get('manager','',array('class'=>'manager')) }}
            {{$errors->first('manager')}}
        </div>

        {{ Form::submit('Actualizar usuario') }}

        {{ Form::close() }}

    </div>
    </div>

@stop

@section('javascript')
    {{ HTML::script('js/user.js'); }}
@stop