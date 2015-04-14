@extends('layou/plantille')

@section('titleContent')
    @if($business->type==1)
        <h1>Infomarción del Cliente</h1>
    @else
        <h1>Infomarción del Prospecto</h1>
    @endif
@stop

@section('content')
    {{ Form::text('maps',$business->maps,['id'=>'maps','class'=>'hidden']) }}
    <div class="formContent">

    <script>


            function initialize() {
                var ubicacion=$('#maps').val();

                var res = ubicacion.split(",");
                console.log(res[0]+res[1]);
                var myLatlng = new google.maps.LatLng(res[0],res[1]);
                var mapOptions = {
                    zoom: 12,
                    center: myLatlng
                }
                var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: 'Hello World!'
                });
            }

            google.maps.event.addDomListener(window, 'load', initialize);
    </script>


    <div>
        <section>

            <section class="datesProfile">
                <figure>
                    {{ HTML::image('business/'.$business->photo,'') }}
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
        @if($business->maps!='')
        <div id="map-canvas"></div>
        @endif
        <a class=" icon-users" ></a>
        </div>

    </div>

    <div class="formContent hidden" id="businessContacts">

        <section>
            <div id="" class="">
                <h2>Contactos</h2>

                @foreach($contacts as $contact)

                    <details>
                        <summary><h3>{{$contact->name}}</h3></summary>

                        <p>Nombre: {{$contact->name}}</p>
                        <p>Apellido: {{$contact->last_name}}</p>
                        <p>Cargo: {{$contact->charge}}</p>
                        <p>E-mail: {{$contact->email}}</p>
                        <p>Telefono: {{$contact->phone}}</p>
                        <p>Celular: {{$contact->mobile_phone}}</p>
                    </details>
                @endforeach
                {{ Form::open(array('name'=>'','route' => 'contacts', 'method' => 'POST')) }}
                <div class="hidden">
                    {{Form::text('business_id',$business->id)}}
                </div>
                {{form::submit('crear contacto')}}
                {{form::close()}}
            </div>

        </section>
    </div>

        <section class="business-states">
            <p class="get-type hidden">{{$business->type}}</p>
            <p class="get-state hidden">{{$business->state}}</p>
            <div class="formContent">
                <h2>Estado del cliente</h2>
                {{ Form::open(array('name'=>'form-see-business','url' => 'admin/verEmpresa/'.$business->id, 'method' => 'POST')) }}
                <details class="state-input hidden">
                    <summary><h3>cotizacion oridnaria</h3></summary>
                    <p class="state-p0">Comentarios: {{$business->record["state_one"]}}</p>
                    {{ Form::textarea('state_one',$business->record["state_one"], ['class' => 'state0 ','id'=>'hidden']) }}
                </details>
                <details class="state-input hidden">
                    <summary><h3>Portafolio y propuesta</h3></summary>
                    <p class="state-p1">Comentarios: {{$business->record["state_two"]}}</p>
                    {{ Form::textarea('state_two',$business->record["state_two"], ['class' => 'state1 ','id'=>'hidden']) }}
                </details>
                <details class="state-input hidden">
                    <summary><h3>Primera llamada</h3></summary>
                    <p class="state-p2">Comentarios: {{$business->record["state_three"]}}</p>
                    {{ Form::textarea('state_three',$business->record["state_three"], ['class' => 'state2 ','id'=>'hidden']) }}
                </details>
                <details class="state-input hidden">
                    <summary><h3>Cotizacion especifica</h3></summary>
                    <p class="state-p3">Comentarios: {{$business->record["state_four"]}}</p>
                    {{ Form::textarea('state_four',$business->record["state_four"], ['class' => 'state3 ','id'=>'hidden']) }}
                </details>
                <details class="state-input hidden">
                    <summary><h3>Segunda llamada</h3></summary>
                    <p class="state-p4">Comentarios: {{$business->record["state_five"]}}</p>
                    {{ Form::textarea('state_five',$business->record["state_five"], ['class' => 'state4 ','id'=>'hidden']) }}
                </details>
                <details class="state-input hidden">
                    <summary><h3>Negociacion</h3></summary>
                    <p class="state-p5">Comentarios: {{$business->record["state_six"]}}</p>
                    {{ Form::textarea('state_six',$business->record["state_six"], ['class' => ' state-change','id'=>'hidden']) }}
                </details>
                <details class="state-input hidden">
                    <summary><h3>Activo</h3></summary>
                    <p class="state-p6">Comentarios: {{$business->record["state_seven"]}}</p>
                    {{ Form::textarea('state_seven',$business->record["state_seven"], ['class' => 'state6 ','id'=>'hidden']) }}
                </details>
                <details class="state-input hidden">
                    <summary><h3>Mensual</h3></summary>
                    <p class="state-p7">Comentarios: {{$business->record["state_eight"]}}</p>
                    {{ Form::textarea('state_eight',$business->record["state_eight"], ['class' => 'state7 ','id'=>'hidden']) }}
                </details>
                <details class="state-input hidden">
                    <summary><h3>Moroso</h3></summary>
                    <p class="state-p8">Comentarios: {{$business->record["state_nine"]}}</p>
                    {{ Form::textarea('state_nine',$business->record["state_nine"], ['class' => 'state8 ','id'=>'hidden']) }}
                </details>
                <details class="state-input hidden">
                    <summary><h3>Eliminado</h3></summary>
                    <p class="state-p9">Comentarios: {{$business->record["state_ten"]}}</p>
                    {{ Form::textarea('state_ten',$business->record["state_ten"] ,['class' => 'state9 ','id'=>'hidden']) }}
                </details>

                {{ Form::submit('Guardar Cambios') }}

                {{ Form::close() }}
            </div>
        </section>


@stop


@section('javascript')
    {{ HTML::script('js/business.js'); }}
@stop