@extends('layou/plantille')

@section('titleContent')
    <h1>Productos</h1>
@stop

@section('content')

    <section class="formContent">
        {{ Form::open(array('name'=>'form-update-permission','route' => 'createProduct', 'method' => 'POST')) }}
        <h2>Crear Productos</h2>
        <div>
            {{Form::label('id','Id del producto:')}}
            {{Form::text('id')}}
        </div>

        @if($errors->first('id'))
            <div class="formErrors">
                *{{$errors->first('id')}}
            </div>
        @endif

        <div>
            {{Form::label('dependency','dependencia:')}}
            {{ Form::select('dependency',$services) }}
        </div>

        @if($errors->first('dependency'))
            <div class="formErrors">
                *{{$errors->first('dependency')}}
            </div>
        @endif

        <div>
            {{Form::label('name','Nombre:')}}
            {{ Form::text('name') }}
        </div>

        @if($errors->first('name'))
            <div class="formErrors">
                *{{$errors->first('name')}}
            </div>
        @endif

        {{Form::submit('guardar producto')}}
        {{Form::close()}}
    </section>

@stop
