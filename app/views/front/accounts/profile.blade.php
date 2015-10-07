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
                        <a class="icon-camera" ></a>
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
        <section class="popUp hidden">
            <div class="popUpContent">
                <div class="icon-cancel-circled close-popUp">
                </div>
                <section class="formContent">
                    {{ Form::open(array('name'=>'form-create-user','url' => 'saveImage/'.$user->id, 'method' => 'POST','files'=>true)) }}
                    <div class="profileFile">
                        <p class="profileP">Sube tu foto</p>
                        {{Form::file('photo',['class'=>'profilePhoto']+['id'=>'photo'])}}
                    </div>
                    @if($errors->first('photo'))
                        <div class="formErrors">
                            *{{$errors->first('photo')}}
                        </div>
                    @endif
                    <div id="request-image" > </div>
                    {{Form::submit('Actualizar Imagen')}}
                    {{Form::close()}}
                </section>
            </div>
        </section>
        <section class="profileUpdate hidden{{ Session::get('upload') }}">
            <div class="formContent">
            {{ Form::open(array('name'=>'form-create-user','route' => 'updateProfile', 'method' => 'POST')) }}
            {{ Form::text('id',$user->id,['id'=>'hidden']) }}

            <div>
                {{ Form::label('user_name', 'Username') }}
                {{ Form::text('user_name',$user->user_name) }}
            </div>

            @if($errors->first('user_name'))
                <div class="formErrors">
                    *{{$errors->first('user_name')}}
                </div>
            @endif

            <div>
                {{ Form::label('name', 'Nombre') }}
                {{ Form::text('name',$user->name) }}
            </div>

            @if($errors->first('name'))
                <div class="formErrors">
                    *{{$errors->first('name')}}
                </div>
            @endif

            <div>
                {{ Form::label('last_name', 'apellido') }}
                {{ Form::text('last_name',$user->last_name) }}
            </div>

            @if($errors->first('last_name'))
                <div class="formErrors">
                    *{{$errors->first('last_name')}}
                </div>
            @endif

            <div>
                {{ Form::label('email', 'E-mail') }}
                {{ Form::text('email',$user->email) }}
            </div>

            @if($errors->first('email'))
                <div class="formErrors">
                    *{{$errors->first('email')}}
                </div>
            @endif

            <div>
                {{ Form::label( 'phone','Telefono') }}
                {{ Form::text('phone',$user->phone) }}
            </div>

            @if($errors->first('phone'))
                <div class="formErrors">
                    *{{$errors->first('phone')}}
                </div>
            @endif

            <div>
                {{ Form::label('address', 'Direccion') }}
                {{ Form::text('address',$user->address) }}
            </div>

            @if($errors->first('address'))
                <div class="formErrors">
                    *{{$errors->first('address')}}
                </div>
            @endif

            <div>
                {{ Form::submit('Actualizar usuario') }}
            </div>


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
            </div>

            @if($errors->first('password'))
                <div class="formErrors">
                    *{{$errors->first('password')}}
                </div>
            @endif

            <div class="material-input">
                {{Form::label('confirmar_password','Confirmar Password')}}
                {{Form::password('confirmar_password','',['id' => 'confirmar_password'])}}
            </div>

            @if($errors->first('confirmar_password'))
                <div class="formErrors">
                    *{{$errors->first('confirmar_password')}}
                </div>
            @endif

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
                <section class="profileLogs ">
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