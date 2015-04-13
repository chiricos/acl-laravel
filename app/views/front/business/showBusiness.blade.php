@extends('layou.plantille')

@section('titleContent')
    <h1>Empresas</h1>
@stop

@section('content')

    <div>
        <div>
            <p class="business-fixed buttonA">Crear Empresa</p>
            <p class="business buttonA">Crear Prospecto</p>
            <div class="formContent">


            <section class="business-one type{{Session::get('type')}}  hidden ">
                <h2>Crear Cliente</h2>

                <div class="formContent">

                    {{ Form::open(array('name'=>'form-show-business','route' => 'business','files'=>true, 'method' => 'POST')) }}
                    {{ Form::text('type','',['class'=>'hidden business1']) }}
                    <div>

                        {{Form::label('manager','Encargado','',array('id'=>'manager'))}}
                        {{ Form::select('manager', $managers, null, array('id' => 'manager')) }}
                        {{$errors->first('manager')}}
                    </div>

                    <div>
                        {{ Form::label('name', 'Nombre') }}
                        {{ Form::text('name') }}
                        {{$errors->first('name')}}
                    </div>

                    <div>
                        {{ Form::label('state', 'Estado') }}
                        {{ Form::select('state', $state, null) }}
                        {{$errors->first('state')}}
                    </div>

                    <div>
                        {{ Form::label('nit', 'Nit') }}
                        {{ Form::text('nit') }}
                        {{$errors->first('nit')}}
                    </div>

                    <div>
                        {{ Form::label('address', 'address') }}
                        {{ Form::text('address') }}
                        {{$errors->first('address')}}
                    </div>

                    <div>
                        {{ Form::label( 'phone','Telefono') }}
                        {{ Form::text('phone') }}
                        {{$errors->first('phone')}}
                    </div>

                    <div>
                        {{ Form::label('ext', 'Ext') }}
                        {{ Form::text('ext') }}
                        {{$errors->first('ext')}}
                    </div>

                    <div>
                        {{ Form::label('email', 'E-mail') }}
                        {{ Form::text('email') }}
                        {{$errors->first('email')}}
                    </div>

                    <div>
                        {{ Form::label('second_email', 'E-mail Opcional') }}
                        {{ Form::text('second_email') }}
                        {{$errors->first('second_email')}}
                    </div>

                    <div>
                        {{ Form::label('mobile_phone', 'Celular') }}
                        {{ Form::text('mobile_phone') }}
                        {{$errors->first('mobile_phone')}}
                    </div>

                    <div>
                        {{ Form::label('page_web', 'Pagina Web') }}
                        {{ Form::text('page_web') }}
                        {{$errors->first('page_web')}}
                    </div>

                    <div>
                        {{ Form::label('fax', 'Fax') }}
                        {{ Form::text('fax') }}
                        {{$errors->first('fax')}}
                    </div>

                    <div>
                        {{ Form::label('country', 'Pais') }}
                        {{ Form::text('country') }}
                        {{$errors->first('country')}}
                    </div>

                    <div>
                        {{ Form::label('city', 'Ciudad') }}
                        {{ Form::text('city') }}
                        {{$errors->first('city')}}
                    </div>

                    <div>
                        {{ Form::label('skype', 'Skype') }}
                        {{ Form::text('skype') }}
                        {{$errors->first('skype')}}
                    </div>

                    <div>
                        {{ Form::label('source', 'Fuente del Cliente') }}
                        {{ Form::text('source') }}
                        {{$errors->first('source')}}
                    </div>

                    <div>
                        {{ Form::label('payment_date', 'Fecha de pago') }}
                        {{Form::input('date','payment_date','')}}
                        {{$errors->first('payment_date')}}
                    </div>

                    <div>
                        {{ Form::label('expedition_date', 'Fecha de Expedicion') }}
                        {{Form::input('date','expedition_date','')}}
                        {{$errors->first('expedition_date')}}
                    </div>

                    <div style="display: none">
                        {{ Form::label('maps', 'ubicacion') }}
                        {{ Form::text('maps','',['class'=>'maps']) }}
                        {{$errors->first('maps')}}
                    </div>

                    <div>
                        {{ Form::label('photo', 'Logo') }}
                        {{Form::file('photo')}}
                        {{$errors->first('photo')}}
                    </div>

                    {{ Form::submit('Crear Cliente') }}

                    {{ Form::close() }}

                </div>

            </section>

            <section class="business-two type-tow{{Session::get('type')}} hidden">
                <h2>Crear Prospecto</h2>
                <div class="formContent">
                    {{ Form::open(array('name'=>'form-show-business-two','route' => 'business','files'=>true, 'method' => 'POST')) }}
                    {{ Form::text('type','',['class'=>'hidden business2']) }}
                    <div>
                        {{Form::label('manager','Encargado','',array('id'=>'manager'))}}
                        {{ Form::select('manager', $managers, null, array('id' => 'manager')) }}
                        {{$errors->first('manager')}}
                    </div>

                    <div>
                        {{ Form::label('name', 'Nombre') }}
                        {{ Form::text('name') }}
                        {{$errors->first('name')}}
                    </div>

                    <div>
                        {{ Form::label('state', 'Estado') }}
                        {{ Form::select('state', $states, null) }}
                        {{$errors->first('state')}}
                    </div>

                    <div>
                        {{ Form::label('nit', 'Nit') }}
                        {{ Form::text('nit') }}
                        {{$errors->first('nit')}}
                    </div>

                    <div>
                        {{ Form::label('address', 'address') }}
                        {{ Form::text('address') }}
                        {{$errors->first('address')}}
                    </div>

                    <div>
                        {{ Form::label( 'phone','Telefono') }}
                        {{ Form::text('phone') }}
                        {{$errors->first('phone')}}
                    </div>

                    <div>
                        {{ Form::label('ext', 'Ext') }}
                        {{ Form::text('ext') }}
                        {{$errors->first('ext')}}
                    </div>

                    <div>
                        {{ Form::label('email', 'E-mail') }}
                        {{ Form::text('email') }}
                        {{$errors->first('email')}}
                    </div>

                    <div>
                        {{ Form::label('second_email', 'E-mail Opcional') }}
                        {{ Form::text('second_email') }}
                        {{$errors->first('second_email')}}
                    </div>

                    <div>
                        {{ Form::label('mobile_phone', 'Celular') }}
                        {{ Form::text('mobile_phone') }}
                        {{$errors->first('mobile_phone')}}
                    </div>

                    <div>
                        {{ Form::label('page_web', 'Pagina Web') }}
                        {{ Form::text('page_web') }}
                        {{$errors->first('page_web')}}
                    </div>

                    <div>
                        {{ Form::label('fax', 'Fax') }}
                        {{ Form::text('fax') }}
                        {{$errors->first('fax')}}
                    </div>

                    <div>
                        {{ Form::label('country', 'Pais') }}
                        {{ Form::text('country') }}
                        {{$errors->first('country')}}
                    </div>

                    <div>
                        {{ Form::label('city', 'Ciudad') }}
                        {{ Form::text('city') }}
                        {{$errors->first('city')}}
                    </div>

                    <div>
                        {{ Form::label('skype', 'Skype') }}
                        {{ Form::text('skype') }}
                        {{$errors->first('skype')}}
                    </div>

                    <div>
                        {{ Form::label('source', 'Fuente del Cliente') }}
                        {{ Form::text('source') }}
                        {{$errors->first('source')}}
                    </div>

                    <div style="display: none">
                        {{ Form::label('maps', 'ubicacion') }}
                        {{ Form::text('maps','',['id'=>'map']) }}
                        {{$errors->first('maps')}}
                    </div>

                    <div>
                        {{ Form::label('photo', 'Logo') }}
                        {{Form::file('photo')}}
                        {{$errors->first('photo')}}
                    </div>


                    {{ Form::submit('Crear Prospecto') }}

                    {{ Form::close() }}

                </div>
            </section>
                <section class="">
                    @include('layou.map')
                </section>

            </div>



        <div class="wrapperContent">
            <section class="tableContent">
                <h2>Clientes</h2>
                        <table class=" ">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th>Direccion</th>
                                    <th>E-mail</th>
                                    <th>Celular</th>
                                    <th>Encargado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($business as $businessClient)
                                @if($businessClient->type==1)
                                <tr>
                                    <td>{{ HTML::image('business/'.$businessClient->photo,'',array('style'=>'width: 100px;')) }}</td>
                                    <td>{{$businessClient->name}}</td>
                                    <td>{{$businessClient->state}}</td>
                                    <td>{{$businessClient->address}}</td>
                                    <td>{{$businessClient->email}}</td>
                                    <td>{{$businessClient->mobile_phone}}</td>
                                @foreach($users as $user)
                                    @if($user->id==$businessClient->manager)
                                        <td>{{$user->user_name}}</td>
                                    @endif
                                @endforeach
                                    <td><a class="icon-folder-open" href="{{route('seeBusiness',$businessClient->id)}}"></a> <a href="{{route('updateBusiness',$businessClient->id)}}" class="icon-ccw "></a><a class="icon-plus-circled" href="{{route('createProducts',$businessClient->id)}}"></a></td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
            </section>
            </div>
            <div class="wrapperContent">
                <section class="tableContent">
                <h2>Prospectos</h2>
                <table class=" ">
                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Direccion</th>
                        <th>E-mail</th>
                        <th>Celular</th>
                        <th>Encargado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($business as $businessClient)
                        @if($businessClient->type==2)

                            <tr>
                                <td>{{ HTML::image('business/'.$businessClient->photo,'',array('style'=>'width: 100px;')) }}</td>
                                <td>{{$businessClient->name}}</td>
                                <td>{{$businessClient->state}}</td>
                                <td>{{$businessClient->address}}</td>
                                <td>{{$businessClient->email}}</td>
                                <td>{{$businessClient->mobile_phone}}</td>
                            @foreach($users as $user)
                                @if($user->id==$businessClient->manager)
                                    <td>{{$user->user_name}}</td>
                                @endif
                            @endforeach
                                <td><a class="icon-folder-open" href="{{route('seeBusiness',$businessClient->id)}}"></a> <a href="{{route('updateBusiness',$businessClient->id)}}" class="icon-ccw "></a></td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>

            </section>

        </div>
    </div>

    </div>

@stop

@section('javascript')
    {{ HTML::script('js/business.js'); }}
    {{ HTML::script('js/maps.js'); }}
@stop