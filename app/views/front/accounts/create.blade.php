@extends('layou.plantille')

@section('titleContent')
    <h1>Usuarios</h1>
@stop

@section('content')
    <a class="icon-reply back" href="{{route('administrator')}}"></a>
    <div class="formContent">
        {{ Form::open(array('name'=>'form-create-user','route' => 'createUser', 'method' => 'POST')) }}
        <div>
            {{ Form::label('user_name', 'Username') }}
            {{ Form::text('user_name') }}
        </div>

        @if($errors->first('user_name'))
            <div class="formErrors">
                *{{$errors->first('user_name')}}
            </div>
        @endif

        <div>
            {{ Form::label('name', 'Nombre') }}
            {{ Form::text('name') }}
        </div>

        @if($errors->first('name'))
            <div class="formErrors">
                *{{$errors->first('name')}}
            </div>
        @endif

        <div>
            {{ Form::label('last_name', 'apellido') }}
            {{ Form::text('last_name') }}
        </div>

        @if($errors->first('last_name'))
            <div class="formErrors">
                *{{$errors->first('last_name')}}
            </div>
        @endif

        <div>
            {{ Form::label('email', 'E-mail') }}
            {{ Form::text('email') }}
        </div>

        @if($errors->first('email'))
            <div class="formErrors">
                *{{$errors->first('email')}}
            </div>
        @endif

        <div>
            {{ Form::label('password') }}
            {{ Form::password('password') }}
        </div>

        @if($errors->first('password'))
            <div class="formErrors">
                *{{$errors->first('password')}}
            </div>
        @endif

        <div>
            {{ Form::label('confirmation_password','confirmar password') }}
            {{ Form::password('confirmation_password') }}
        </div>

        @if($errors->first('confirmation_password'))
            <div class="formErrors">
                *{{$errors->first('confirmation_password')}}
            </div>
        @endif

        <div>
            {{ Form::label( 'phone','Telefono') }}
            {{ Form::text('phone') }}
        </div>

        @if($errors->first('phone'))
            <div class="formErrors">
                *{{$errors->first('phone')}}
            </div>
        @endif

        <div>
            {{ Form::label('address', 'Direccion') }}
            {{ Form::text('address') }}
        </div>

        @if($errors->first('address'))
            <div class="formErrors">
                *{{$errors->first('address')}}
            </div>
        @endif

        @if(Auth::user()->role_id>1)
            <div class="hidden">
                {{ Form::label('role_id', 'Role') }}
                {{ Form::select('role_id', $charges, null, array('id' => 'role_id')) }}
            </div>

            <div class="create-manager hidden">
                {{Form::label('manager','Encargado','',array('id'=>'manager'))}}
                {{ Form::select('manager', $managers, null, array('id' => 'manager')) }}
            </div>

        @else
            <div >
                {{ Form::label('role_id', 'Role') }}
                {{ Form::select('role_id', $charges, null, array('id' => 'role_id')) }}
            </div>

            @if($errors->first('role_id'))
                <div class="formErrors">
                    *{{$errors->first('role_id')}}
                </div>
            @endif

            <div class="create-manager ">
                {{Form::label('manager','Encargado','',array('id'=>'manager'))}}
                {{ Form::select('manager', $managers, null, array('id' => 'manager')) }}
            </div>

            @if(Session::get('manager','',array('id'=>'manager')))
                <div class="formErrors">
                    *{{Session::get('manager','',array('id'=>'manager'))}}
                </div>
            @endif
        @endif


        {{ Form::submit('Crear usuario') }}

        {{ Form::close() }}

    </div>

@stop

@section('javascript')
    {{ HTML::script('js/user.js'); }}
@stop