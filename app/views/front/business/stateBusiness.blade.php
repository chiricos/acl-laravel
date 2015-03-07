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
                        <summary><h3>{{$contact->name}}</h3></summary>

                        <p>Nombre: {{$contact->name}}</p>
                        <p>Apellido: {{$contact->last_name}}</p>
                        @foreach($charges as $charge)
                            @if($charge->id==$contact->charges_id)
                                <p>Cargo: {{$charge->name}}</p>
                            @endif
                        @endforeach
                        <p>E-mail: {{$contact->email}}</p>
                        <p>Telefono: {{$contact->phone}}</p>
                        <p>Celular: {{$contact->mobile_phone}}</p>
                    </details>
                @endforeach
                <a href="{{route('contacts')}}">Crear Contacto</a>
            </div>
        </section>
        <section class="business-states">
            <p class="get-type">{{$business->type}}</p>
            <p class="get-state">{{$business->state}}</p>
            <div>
                <h2>Estado</h2>
                {{ Form::open(array('name'=>'form-see-business','url' => 'admin/verEmpresa/'.$business->id, 'method' => 'POST')) }}
                <details>
                    <summary><h3>cotizacion oridnaria</h3></summary>
                    <p>{{$business->record["state_one"]}}</p>
                    {{ Form::textarea('state_one',$business->record["state_one"], ['class' => '']) }}
                </details>
                <details>
                    <summary><h3>Portafolio y propuesta</h3></summary>
                    <p>{{$business->record["state_two"]}}</p>
                    {{ Form::textarea('state_two',$business->record["state_two"], ['class' => '']) }}
                </details>
                <details>
                    <summary><h3>Primera llamada</h3></summary>
                    <p>{{$business->record["state_three"]}}</p>
                    {{ Form::textarea('state_three',$business->record["state_three"], ['class' => '']) }}
                </details>
                <details>
                    <summary><h3>Cotizacion especifica</h3></summary>
                    <p>{{$business->record["state_four"]}}</p>
                    {{ Form::textarea('state_four',$business->record["state_four"], ['class' => '']) }}
                </details>
                <details>
                    <summary><h3>Segunda llamada</h3></summary>
                    <p>{{$business->record["state_five"]}}</p>
                    {{ Form::textarea('state_five',$business->record["state_five"], ['class' => '']) }}
                </details>
                <details>
                    <summary><h3>Negociacion</h3></summary>
                    <p>{{$business->record["state_six"]}}</p>
                    {{ Form::textarea('state_six',$business->record["state_six"], ['class' => '']) }}
                </details>
                <details>
                    <summary><h3>Activo</h3></summary>
                    <p>{{$business->record["state_seven"]}}</p>
                    {{ Form::textarea('state_seven',$business->record["state_seven"], ['class' => '']) }}
                </details>
                <details>
                    <summary><h3>Mensual</h3></summary>
                    <p>{{$business->record["state_eight"]}}</p>
                    {{ Form::textarea('state_eight',$business->record["state_eight"], ['class' => '']) }}
                </details>
                <details>
                    <summary><h3>Moroso</h3></summary>
                    <p>{{$business->record["state_nine"]}}</p>
                    {{ Form::textarea('state_nine',$business->record["state_nine"], ['class' => '']) }}
                </details>
                <details>
                    <summary><h3>Eliminado</h3></summary>
                    <p>{{$business->record["state_ten"]}}</p>
                    {{ Form::textarea('state_ten',$business->record["state_ten"], ['class' => '']) }}
                </details>

                {{ Form::submit('Guardar Cambios') }}

                {{ Form::close() }}
            </div>
        </section>
    </div>

@stop


@section('javascript')
    {{ HTML::script('js/business.js'); }}
@stop