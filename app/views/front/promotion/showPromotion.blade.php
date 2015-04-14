@extends('layou/plantille')
@section('titleContent')
    <h1>Promociones</h1>
@stop

@section('content')

    <section class="formContent">
        {{ Form::open(array('name'=>'form-see-business','route' => 'promotion', 'method' => 'POST','files'=>'true')) }}


        <div>
            {{Form::label('about','Asunto:')}}
            {{Form::Text('about')}}
        </div>

        @if($errors->first('about'))
            <div class="formErrors">
                *{{$errors->first('about')}}
            </div>
        @endif

        <div>
            {{Form::label('message','Mensaje:')}}
            {{Form::textarea('message')}}
        </div>

        @if($errors->first('message'))
            <div class="formErrors">
                *{{$errors->first('message')}}
            </div>
        @endif

        <div>
            {{Form::label('image','Imagen:')}}
            {{Form::file('image')}}
        </div>

        @if($errors->first('image'))
            <div class="formErrors">
                *{{$errors->first('image')}}
            </div>
        @endif

        <div>
            {{Form::submit('Enviar correo a las empresas')}}
        </div>

            {{Form::close()}}

    </section>

@stop