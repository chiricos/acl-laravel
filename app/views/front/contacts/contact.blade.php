@extends('layou.plantille')

@section('titleContent')
    <h1>Contactos</h1>
@stop

@section('content')

    <p class="new-contact buttonA">nuevo contacto</p>


<div>

    <div class="content-contact hidden contact{{Session::get('see')}} formContent">

        {{ Form::open(array('name'=>'form-create-contacts','route' => 'contacts', 'method' => 'POST')) }}

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
            {{ Form::label('charge', 'Cargo') }}
            {{ Form::text('charge') }}
        </div>

        @if($errors->first('charge'))
            <div class="formErrors">
                *{{$errors->first('charge')}}
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
            {{ Form::label( 'phone','Telefono') }}
            {{ Form::text('phone') }}
        </div>

        @if($errors->first('phone'))
            <div class="formErrors">
                *{{$errors->first('phone')}}
            </div>
        @endif

        <div>
            {{ Form::label( 'mobile_phone','Celular') }}
            {{ Form::text('mobile_phone') }}
        </div>

        @if($errors->first('mobile_phone'))
            <div class="formErrors">
                *{{$errors->first('mobile_phone')}}
            </div>
        @endif

        <div>
            {{ Form::label('business_id', 'Empresa') }}
            {{ Form::select('business_id', $business_id, null, array('id' => '')) }}
        </div>

        @if($errors->first('business_id'))
            <div class="formErrors">
                *{{$errors->first('business_id')}}
            </div>
        @endif

        {{ Form::submit('Crear Contacto',['class'=>'button-contact']) }}

        {{ Form::close() }}

    </div>
    <div class="">
        {{ Form::open(array('name'=>'form','route' => 'searchContacts', 'method' => 'POST','class'=>'formSearch')) }}
        <div class="buttonSearch">
            <div>
                {{Form::text('search')}}
            </div>

            <button>{{ HTML::image('img/search.png','',array('id'=>'')) }}</button>
            {{Form::close()}}
        </div>
    </div>
    <div class=" wrapperContent">
        <div class="tableContent">
            <h2>Contactos</h2>
            <table class=" ">

                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Celular</th>
                    <th>E-mail</th>
                    <th>Cargo</th>
                    <th>Empresa</th>
                    <th>Actualizar</th>
                </tr>
                </thead>
                <tbody>

                @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->last_name}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>{{$contact->mobile_phone}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->charge}}</td>

                        @foreach($business as $businessContact)
                            @if($businessContact->id==$contact->business_id)
                                <td>{{$businessContact->name}}</td>
                            @endif
                        @endforeach
                        <td><a class="icon-ccw" href="{{route('updateContacts',$contact->id)}}"></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>




@stop

@section('javascript')
    {{ HTML::script('js/contact.js'); }}
@stop