@extends('layou/plantille')


@section('content')
    <div>
        <section>
            @if($business->type==1)
                <h1>Infomarción del Cliente</h1>
            @else
                <h1>Infomarción del Prospecto</h1>
            @endif
            <section>
                <figure>
                    {{ HTML::image('business/'.$business->photo,'',array('style'=>'width: 100px;')) }}
                </figure>
                <section>
                    <p>Nombre: {{$business->name}}</p>
                    <p>Encargado: {{$manager->name }}</p>
                    <p>Estado: {{$state}}</p>
                    <p>Nit: {{$business->nit}}</p>
                    <p>Direccion: {{$business->address}}</p>
                    <p>Telefono: {{$business->phone}}</p>
                    <p>Ext: {{$business->ext}}</p>
                    <p>E-mail: {{$business->email}}</p>
                    <p>E-mail Opcional: {{$business->ext}}</p>
                    <p>Celular: {{$business->mobile_phone}}</p>
                    <p>Pagina web: {{$business->page_web}}</p>
                    <p>Fax: {{$business->fax}}</p>
                    <p>Pais: {{$business->country}}</p>
                    <p>Ciudad: {{$business->city}}</p>
                    <p>Skype: {{$business->skype}}</p>
                    <p>Fuente: {{$business->source}}</p>
                    @if($business->type==1)
                    <p>Fecha de pago: {{$business->payment_date}}</p>
                    <p>Fecha de expedición: {{$business->expedition_date}}</p>
                    @endif
                </section>
            </section>
        </section>
        <section>
            <div id="" class="">
                <h2>Contactos</h2>
                @foreach($contacts as $contact)

                    <details>
                        <summary><h2>{{$contact->name}}</h2></summary>

                        <p>Nombre:{{$contact->name}}</p>
                        <p>Apellido:{{$contact->last_name}}</p>
                        <p>Correo:{{$contact->email}}</p>
                        <p>Cargo:{{$contact->charge_id}}</p>
                        <p>Telefono:{{$contact->phone}}</p>
                        <p>Movil:{{$contact->mobile_phone}}</p>
                        <p>Empresa:{{$business->name}}</p>
                        <a href="{{route('updateContacts',$contact->id)}}">Actualizar</a>
                    </details>
                @endforeach
                <a href="{{route('contacts')}}">Crear Contacto</a>
            </div>
        </section>
        <section>

        </section>
    </div>

@stop