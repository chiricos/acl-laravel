@extends('layou.plantille')

@section('titleContent')
    <h1>CLIENTES</h1>
@stop

@section('content')


            <a href="{{route('business')}}" class=" icon-reply back"></a>
            <div class="formContent">
            <section class="business-one type hidden ">
                <h2>Actualizar Cliente</h2>
                <div class="formContent">
                    {{ Form::open(array('name'=>'form-show-business','url' => 'admin/actualizarEmpresa/'.$updateBusiness->id,'files'=>true, 'method' => 'POST')) }}
                    {{ Form::text('type',$updateBusiness->type,['class'=>'hidden  update-business']) }}
                    {{ Form::text('id',$updateBusiness->id,['class'=>'hidden ']) }}

                    @if(Auth::user()->role_id==3)
                        <div class="hidden">
                            {{Form::label('manager','Encargado','',array('id'=>'manager'))}}
                            {{ Form::select('manager', $managers, $updateBusiness->manager, array('id' => 'manager')) }}
                        </div>

                    @else
                        <div>
                            {{Form::label('manager','Encargado','',array('id'=>'manager'))}}
                            {{ Form::select('manager', $managers, $updateBusiness->manager, array('id' => 'manager')) }}
                        </div>

                        @if($errors->first('manager'))
                            <div class="formErrors">
                                *{{$errors->first('manager')}}
                            </div>
                        @endif
                    @endif

                    <div>
                        {{ Form::label('name', 'Nombre') }}
                        {{ Form::text('name',$updateBusiness->name) }}
                    </div>

                    @if($errors->first('name'))
                        <div class="formErrors">
                            *{{$errors->first('name')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('state', 'Estado') }}
                        {{ Form::select('state', $state, $updateBusiness->state) }}
                    </div>

                    @if($errors->first('state'))
                        <div class="formErrors">
                            *{{$errors->first('state')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('nit', 'Nit') }}
                        {{ Form::text('nit',$updateBusiness->nit) }}
                    </div>

                    @if($errors->first('nit'))
                        <div class="formErrors">
                            *{{$errors->first('nit')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('address', 'address') }}
                        {{ Form::text('address',$updateBusiness->address) }}
                    </div>

                    @if($errors->first('address'))
                        <div class="formErrors">
                            *{{$errors->first('address')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label( 'phone','Telefono') }}
                        {{ Form::text('phone',$updateBusiness->phone) }}
                    </div>

                    @if($errors->first('phone'))
                        <div class="formErrors">
                            *{{$errors->first('phone')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('ext', 'Ext') }}
                        {{ Form::text('ext',$updateBusiness->ext) }}
                    </div>

                    @if($errors->first('ext'))
                        <div class="formErrors">
                            *{{$errors->first('ext')}}
                        </div>
                    @endif

                    <div>
                        {{ Form::label('email', 'E-mail') }}
                        {{ Form::text('email',$updateBusiness->email) }}
                    </div>

                    @if($errors->first('email'))
                        <div class="formErrors">
                            *{{$errors->first('email')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('second_email', 'E-mail Opcional') }}
                        {{ Form::text('second_email',$updateBusiness->second_email) }}
                    </div>

                    @if($errors->first('second_email'))
                        <div class="formErrors">
                            *{{$errors->first('second_email')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('mobile_phone', 'Celular') }}
                        {{ Form::text('mobile_phone',$updateBusiness->mobile_phone) }}
                    </div>

                    @if($errors->first('mobile_phone'))
                        <div class="formErrors">
                            *{{$errors->first('mobile_phone')}}
                        </div>
                    @endif

                    <div>
                        {{ Form::label('page_web', 'Pagina Web') }}
                        {{ Form::text('page_web',$updateBusiness->page_web) }}
                    </div>

                    @if($errors->first('page_web'))
                        <div class="formErrors">
                            *{{$errors->first('page_web')}}
                        </div>
                    @endif

                    <div>
                        {{ Form::label('fax', 'Fax') }}
                        {{ Form::text('fax',$updateBusiness->fax) }}
                    </div>

                    @if($errors->first('fax'))
                        <div class="formErrors">
                            *{{$errors->first('fax')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('country', 'Pais') }}
                        {{ Form::text('country',$updateBusiness->country) }}
                    </div>

                    @if($errors->first('country'))
                        <div class="formErrors">
                            *{{$errors->first('country')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('city', 'Ciudad') }}
                        {{ Form::text('city',$updateBusiness->city) }}
                    </div>

                    @if($errors->first('city'))
                        <div class="formErrors">
                            *{{$errors->first('city')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('skype', 'Skype') }}
                        {{ Form::text('skype',$updateBusiness->skype) }}
                    </div>

                    @if($errors->first('skype'))
                        <div class="formErrors">
                            *{{$errors->first('skype')}}
                        </div>
                    @endif

                    <div>
                        {{ Form::label('source', 'Fuente del Cliente') }}
                        {{ Form::text('source',$updateBusiness->source) }}
                    </div>

                    @if($errors->first('source'))
                        <div class="formErrors">
                            *{{$errors->first('source')}}
                        </div>
                    @endif

                    <div>
                        {{ Form::label('payment_date', 'Fecha de pago') }}
                        {{Form::input('date','payment_date',$updateBusiness->payment_date)}}
                    </div>

                    @if($errors->first('payment_date'))
                        <div class="formErrors">
                            *{{$errors->first('payment_date')}}
                        </div>
                    @endif

                    <div>
                        {{ Form::label('expedition_date', 'Fecha de Expedicion') }}
                        {{Form::input('date','expedition_date',$updateBusiness->expedition_date)}}
                    </div>

                    @if($errors->first('expedition_date'))
                        <div class="formErrors">
                            *{{$errors->first('expedition_date')}}
                        </div>
                    @endif


                    <div style="display: none">
                        {{ Form::label('maps', 'ubicacion') }}
                        {{ Form::text('maps','',['id'=>'maps']) }}
                        {{$errors->first('maps')}}
                    </div>


                    <div>
                        {{ Form::label('photo', 'Logo') }}
                        {{Form::file('photo')}}
                    </div>

                    @if($errors->first('photo'))
                        <div class="formErrors">
                            *{{$errors->first('photo')}}
                        </div>
                    @endif

                    {{ Form::submit('Actualizar Cliente') }}

                    {{ Form::close() }}

                </div>
            </section>
            <section class="business-two  hidden">
                <h2>Actualizar Prospecto</h2>
                <div class="formContent">
                    {{ Form::open(array('name'=>'form-show-business-two','url' => 'admin/actualizarEmpresa/'.$updateBusiness->id,'files'=>true, 'method' => 'POST')) }}
                    {{ Form::text('type',$updateBusiness->type,['class'=>'hidden  update-business']) }}
                    {{ Form::text('id',$updateBusiness->id,['class'=>'hidden ']) }}

                    @if(Auth::user()->role_id==3)
                        <div class="hidden">
                            {{Form::label('manager','Encargado','',array('id'=>'manager'))}}
                            {{ Form::select('manager', $managers, $updateBusiness->manager, array('id' => 'manager')) }}
                        </div>

                    @else
                        <div>
                            {{Form::label('manager','Encargado','',array('id'=>'manager'))}}
                            {{ Form::select('manager', $managers, $updateBusiness->manager, array('id' => 'manager')) }}
                        </div>

                        @if($errors->first('manager'))
                            <div class="formErrors">
                                *{{$errors->first('manager')}}
                            </div>
                        @endif
                    @endif

                    <div>
                        {{ Form::label('name', 'Nombre') }}
                        {{ Form::text('name',$updateBusiness->name) }}
                    </div>

                    @if($errors->first('name'))
                        <div class="formErrors">
                            *{{$errors->first('name')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('state', 'Estado') }}
                        {{ Form::select('state', $states, $updateBusiness->state) }}
                    </div>

                    @if($errors->first('state'))
                        <div class="formErrors">
                            *{{$errors->first('state')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('nit', 'Nit') }}
                        {{ Form::text('nit',$updateBusiness->nit) }}
                    </div>

                    @if($errors->first('nit'))
                        <div class="formErrors">
                            *{{$errors->first('nit')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('address', 'address') }}
                        {{ Form::text('address',$updateBusiness->address) }}
                    </div>

                    @if($errors->first('address'))
                        <div class="formErrors">
                            *{{$errors->first('address')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label( 'phone','Telefono') }}
                        {{ Form::text('phone',$updateBusiness->phone) }}
                    </div>

                    @if($errors->first('phone'))
                        <div class="formErrors">
                            *{{$errors->first('phone')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('ext', 'Ext') }}
                        {{ Form::text('ext',$updateBusiness->ext) }}
                    </div>

                    @if($errors->first('ext'))
                        <div class="formErrors">
                            *{{$errors->first('ext')}}
                        </div>
                    @endif

                    <div>
                        {{ Form::label('email', 'E-mail') }}
                        {{ Form::text('email',$updateBusiness->email) }}
                    </div>

                    @if($errors->first('email'))
                        <div class="formErrors">
                            *{{$errors->first('email')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('second_email', 'E-mail Opcional') }}
                        {{ Form::text('second_email',$updateBusiness->second_email) }}
                    </div>

                    @if($errors->first('second_email'))
                        <div class="formErrors">
                            *{{$errors->first('second_email')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('mobile_phone', 'Celular') }}
                        {{ Form::text('mobile_phone',$updateBusiness->mobile_phone) }}
                    </div>

                    @if($errors->first('mobile_phone'))
                        <div class="formErrors">
                            *{{$errors->first('mobile_phone')}}
                        </div>
                    @endif

                    <div>
                        {{ Form::label('page_web', 'Pagina Web') }}
                        {{ Form::text('page_web',$updateBusiness->page_web) }}
                    </div>

                    @if($errors->first('page_web'))
                        <div class="formErrors">
                            *{{$errors->first('page_web')}}
                        </div>
                    @endif

                    <div>
                        {{ Form::label('fax', 'Fax') }}
                        {{ Form::text('fax',$updateBusiness->fax) }}
                    </div>

                    @if($errors->first('fax'))
                        <div class="formErrors">
                            *{{$errors->first('fax')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('country', 'Pais') }}
                        {{ Form::text('country',$updateBusiness->country) }}
                    </div>

                    @if($errors->first('country'))
                        <div class="formErrors">
                            *{{$errors->first('country')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('city', 'Ciudad') }}
                        {{ Form::text('city',$updateBusiness->city) }}
                    </div>

                    @if($errors->first('city'))
                        <div class="formErrors">
                            *{{$errors->first('city')}}
                        </div>
                    @endif


                    <div>
                        {{ Form::label('skype', 'Skype') }}
                        {{ Form::text('skype',$updateBusiness->skype) }}
                    </div>

                    @if($errors->first('skype'))
                        <div class="formErrors">
                            *{{$errors->first('skype')}}
                        </div>
                    @endif

                    <div>
                        {{ Form::label('source', 'Fuente del Cliente') }}
                        {{ Form::text('source',$updateBusiness->source) }}
                    </div>

                    @if($errors->first('source'))
                        <div class="formErrors">
                            *{{$errors->first('source')}}
                        </div>
                    @endif

                    <div style="display: none">
                        {{ Form::label('maps', 'ubicacion') }}
                        {{ Form::text('maps','',['id'=>'maps']) }}
                        {{$errors->first('maps')}}
                    </div>


                    <div>
                        {{ Form::label('photo', 'Logo') }}
                        {{Form::file('photo')}}
                    </div>

                    @if($errors->first('photo'))
                        <div class="formErrors">
                            *{{$errors->first('photo')}}
                        </div>
                    @endif

                    {{ Form::submit('Actualizar Prospecto') }}

                    {{ Form::close() }}

                </div>
            </section>
                <section class="">
                    @include('layou.map')
                </section>
            </div>

@stop

@section('javascript')
    {{ HTML::script('js/updateBusiness.js'); }}
    {{ HTML::script('js/maps.js'); }}
@stop