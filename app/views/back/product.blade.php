@extends('layou/plantille')

@section('content')

    <h2>Productos</h2>
    <section>
        {{ Form::open(array('name'=>'form-update-permission','route' => 'product', 'method' => 'POST')) }}
        <div>
            {{Form::label('id','Id del producto:')}}
            {{Form::text('id')}}
        </div>
        <div>
            {{Form::label('dependency','dependencia:')}}
            {{ Form::text('dependency') }}
        </div>

        <div>
            {{Form::label('name','Nombre:')}}
            {{ Form::text('dependency') }}
        </div>
        {{Form::submit('guardar producto')}}
        {{Form::close()}}
    </section>


@stop
