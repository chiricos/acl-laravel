@extends('layou/plantille')

@section('content')

    <h2>Promociones</h2>

    <section>
        {{ Form::open(array('name'=>'form-see-business','route' => 'product', 'method' => 'POST','files'=>'true')) }}


        <div>
            {{Form::label('about','Asunto:')}}
            {{Form::Text('about')}}
        </div>

        <div>
            {{Form::label('text','Mensaje:')}}
            {{Form::textarea('text')}}
        </div>

        <div>
            {{Form::label('image','Imagen:')}}
            {{Form::file('image')}}
        </div>

        <div>
            {{Form::submit('Enviar correo a las empresas')}}
        </div>

            {{Form::close()}}

    </section>

@stop