@extends('layou.plantille')

@section('titleContent')
    <h1>Perfil</h1>
@stop

@section('content')

        <div>
            <div class="formContent">
                <section class="datesProfile">
                    <figure>
                        {{ HTML::image('user/'.$user->photo,'',array('id'=>'')) }}
                        <a class="icon-camera"></a>
                    </figure>
                    <p>Username: {{$user->user_name}}</p>
                    <p>Nombre: {{$user->name}}</p>
                    <p>Apellido: {{$user->last_name}}</p>
                    <p>E-mail:  {{$user->email}}</p>
                    <p>Telefono: {{$user->phone}}</p>
                    <p>Dirección: {{$user->address}}</p>
                    <p>
                        @if($user->role_id==3)
                            A cargo de :{{$manager->user_name}}
                        @endif
                    </p>
                </section>
                <a class="buttonMaps" onclick="showForm();">Actualizar Datos</a>
                <a class="changePassword buttonMaps" class="" >Cambiar Contraseña</a>
        </div>
        <section class="profileUpdate hidden{{ Session::get('upload') }}">
            <div class="formContent">
            {{ Form::open(array('name'=>'form-create-user','route' => 'updateProfile', 'method' => 'POST')) }}
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


            {{ Form::submit('Actualizar usuario') }}

            {{ Form::close() }}
                </div>
        </section>
    </div>

    <div>

        <section class="profilePassword hidden{{ Session::get('password') }}">
            <div class="formContent">
            {{ Form::open(array('route' => 'changePassword','class'=>'')) }}
            <div class="material-input">
                {{Form::label('password','Password')}}
                {{Form::password('password','',['id' => 'password'])}}
                {{$errors->first('password')}}
            </div>

            <div class="material-input">
                {{Form::label('confirmar_password','Confirmar Password')}}
                {{Form::password('confirmar_password','',['id' => 'confirmar_password'])}}
                {{$errors->first('confirmar_password')}}
            </div>


            <div>
                {{Form::submit('Cambiar Contraseña')}}
            </div>


            {{ Form::close() }}
                </div >
        </section>
    </div>
    <div class="formContent">
        <div>
            @if(count($logs)>0)
                <h2 class="showMove">Movimientos</h2>
                <section class="profileLogs hidden">
                    @foreach($logs as $log)
                        <p>
                            has {{$log->action}}
                            @if($log->affected_entity)
                                de {{$log->affected_entity}}
                            @endif
                            el {{$log->created_at}}
                        </p>
                    @endforeach
                </section>

            @endif
        </div>
    </div>

@stop

@section('javascript')
    {{ HTML::script('js/user.js'); }}
@stop