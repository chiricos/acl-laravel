@extends('layou/plantille')

@section('content')

    <h2>Contactenos</h2>
    <section>
        {{ Form::open(array('name'=>'form-update-permission','route' => 'contactAs', 'method' => 'POST')) }}
        <div>
            {{Form::label('about','Asunto:')}}
            {{Form::text('about')}}
        </div>
        <div>
            {{Form::label('message','Mensaje:')}}
            {{ Form::textarea('message') }}
        </div>
        {{Form::submit('enviar correo')}}
        {{Form::close()}}
    </section>


@stop
