@extends('layou/plantille')

@section('titleContent')
    <h1>Contactenos</h1>
@stop

@section('content')

    <section class="formContent">
        {{ Form::open(array('name'=>'form-update-permission','route' => 'contactAs', 'method' => 'POST')) }}
        <div>
            {{Form::label('about','Asunto:')}}
            {{Form::text('about')}}
        </div>

        @if($errors->first('about'))
            <div class="formErrors">
                *{{$errors->first('about')}}
            </div>
        @endif

        <div>
            {{Form::label('message','Mensaje:')}}
            {{ Form::textarea('message') }}
        </div>

        @if($errors->first('message'))
            <div class="formErrors">
                *{{$errors->first('message')}}
            </div>
        @endif

        {{Form::submit('enviar correo')}}
        {{Form::close()}}
    </section>


@stop
