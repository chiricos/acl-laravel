@extends('layou.plantille')


@section('content')
    <div>
        <h1>Contactos</h1>
        <div>
            {{ Form::open(array('name'=>'form-','to' => 'admin/actualizar/'.$contact->id, 'method' => 'POST')) }}

                {{ Form::text('id',$contact->id,['id'=>'hidden']) }}
            <div>
                {{ Form::label('name', 'Nombre') }}
                {{ Form::text('name',$contact->name) }}
                {{$errors->first('name')}}
            </div>

            <div>
                {{ Form::label('last_name', 'apellido') }}
                {{ Form::text('last_name',$contact->last_name) }}
                {{$errors->first('last_name')}}
            </div>

            <div>
                {{ Form::label('charges_id', 'Cargo') }}
                {{ Form::select('charges_id', $charges_id, $contact->charges_id, array('id' => '')) }}
                {{$errors->first('charges_id')}}
            </div>

            <div>
                {{ Form::label('email', 'E-mail') }}
                {{ Form::text('email',$contact->email) }}
                {{$errors->first('email')}}
            </div>

            <div>
                {{ Form::label( 'phone','Telefono') }}
                {{ Form::text('phone',$contact->phone) }}
                {{$errors->first('phone')}}
            </div>

            <div>
                {{ Form::label( 'mobile_phone','Celular') }}
                {{ Form::text('mobile_phone',$contact->mobile_phone) }}
                {{$errors->first('mobile_phone')}}
            </div>

            <div>
                {{ Form::label('business_id', 'Empresa') }}
                {{ Form::select('business_id', $business_id, $contact->business_id, array('id' => '')) }}
                {{$errors->first('business_id')}}
            </div>

            {{ Form::submit('Actualizar Contacto') }}

            {{ Form::close() }}

        </div>

        <div>
            <section class="show">
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
                            @foreach($charges as $charge)
                                @if($charge->id==$contact->charges_id)
                                    <td>{{$charge->name}}</td>
                                @endif
                            @endforeach
                            @foreach($business as $businessContact)
                                @if($businessContact->id==$contact->business_id)
                                    <td>{{$businessContact->name}}</td>
                                @endif
                            @endforeach
                            <td><a href="{{route('updateContacts',$contact->id)}}">Actualizar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </section>
        </div>
        <div>
            <section class="show-business">
                <h2>Cargos</h2>
                <table class=" ">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($charges as $charge)
                        <tr>
                            <td>{{$charge->name}}</td>
                            <td><a href="{{route('deleteCharges',$charge->id)}}">Eliminar</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </section>
        </div>
        <div>
            {{ Form::open(array('name'=>'form-create-charges','route' => 'charges', 'method' => 'POST')) }}

            {{ Form::label('name', 'Nombre del cargo') }}
            {{ Form::text('name') }}
            {{$errors->first('name')}}
            {{ Form::submit('Crear Cargo') }}

            {{ Form::close() }}
        </div>
    </div>




@stop

@section('javascript')
    {{ HTML::script('js/contact.js'); }}
@stop