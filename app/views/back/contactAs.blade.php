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
            {{Form::label('text','Mensaje:')}}
            {{ Form::textarea('text') }}
        </div>

        @if($errors->first('text'))
            <div class="formErrors">
                *{{$errors->first('text')}}
            </div>
        @endif

        <div>
            {{Form::submit('enviar correo')}}
        </div>

        {{Form::close()}}
    </section>


@stop
