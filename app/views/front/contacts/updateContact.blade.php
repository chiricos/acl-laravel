@extends('layou.plantille')

@section('titleContent')
    <h1>Contactos</h1>
@stop

@section('content')

    <a class="icon-reply back " href="{{route('contacts')}}"></a>



        <div class="formContent">
            {{ Form::open(array('name'=>'form-','to' => 'admin/actualizar/'.$contact->id, 'method' => 'POST')) }}

                {{ Form::text('id',$contact->id,['id'=>'hidden']) }}
            <div>
                {{ Form::label('name', 'Nombre') }}
                {{ Form::text('name',$contact->name) }}
            </div>

            @if($errors->first('name'))
                <div class="formErrors">
                    *{{$errors->first('name')}}
                </div>
            @endif

            <div>
                {{ Form::label('last_name', 'apellido') }}
                {{ Form::text('last_name',$contact->last_name) }}
            </div>

            @if($errors->first('last_name'))
                <div class="formErrors">
                    *{{$errors->first('last_name')}}
                </div>
            @endif

            <div>
                {{ Form::label('charge', 'Cargo') }}
                {{ Form::text('charge',$contact->charge) }}
            </div>

            @if($errors->first('charge'))
                <div class="formErrors">
                    *{{$errors->first('charge')}}
                </div>
            @endif

            <div>
                {{ Form::label('email', 'E-mail') }}
                {{ Form::text('email',$contact->email) }}
            </div>

            @if($errors->first('email'))
                <div class="formErrors">
                    *{{$errors->first('email')}}
                </div>
            @endif

            <div>
                {{ Form::label( 'phone','Telefono') }}
                {{ Form::text('phone',$contact->phone) }}
            </div>

            @if($errors->first('phone'))
                <div class="formErrors">
                    *{{$errors->first('phone')}}
                </div>
            @endif

            <div>
                {{ Form::label( 'mobile_phone','Celular') }}
                {{ Form::text('mobile_phone',$contact->mobile_phone) }}
            </div>

            @if($errors->first('mobile_phone'))
                <div class="formErrors">
                    *{{$errors->first('mobile_phone')}}
                </div>
            @endif

            <div>
                {{ Form::label('business_id', 'Empresa') }}
                {{ Form::select('business_id', $business_id, $contact->business_id, array('id' => '')) }}
            </div>

            @if($errors->first('business_id'))
                <div class="formErrors">
                    *{{$errors->first('business_id')}}
                </div>
            @endif

            {{ Form::submit('Actualizar Contacto') }}

            {{ Form::close() }}

        </div>

        <div class="wrapperContent">
            <section class="tableContent">
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

            </section>
        </div>





@stop

@section('javascript')
    {{ HTML::script('js/contact.js'); }}
@stop