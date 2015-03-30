@extends('layou.plantille')


@section('content')

    <h1>Productos</h1>

    {{ Form::open(array('name'=>'form-update-permission','to' => 'agregarProductos/'.$id, 'method' => 'POST')) }}

    <div>
        {{Form::label('product_id','Producto:')}}
        {{ Form::select('product_id',$products) }}
        {{$errors->first('product_id')}}
    </div>

    <div>
        {{Form::label('value','Valor:')}}
        {{ Form::text('value') }}
        {{$errors->first('value')}}
    </div>

    <div>
        {{Form::submit('Crear Producto')}}
    </div>

        {{Form::close()}}

@stop
