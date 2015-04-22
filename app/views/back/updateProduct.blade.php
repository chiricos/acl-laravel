@extends('layou/plantille')

@section('titleContent')
    <h1>Productos</h1>
@stop

@section('content')

    <a href="{{route('product')}}" class="icon-reply back"></a>

    <section class="formContent">
        {{ Form::open(array('name'=>'form-update-permission','url' => 'admin/actualizarProductos/'.$updateProduct->id, 'method' => 'POST')) }}
        <div>
            {{Form::label('id','Id del producto:')}}
            {{Form::text('id',$updateProduct->id)}}
        </div>

        @if($errors->first('id'))
            <div class="formErrors">
                *{{$errors->first('id')}}
            </div>
        @endif

        <div>
            {{Form::label('dependency','dependencia:')}}
            {{ Form::select('dependency',$services,$updateProduct->dependency) }}
        </div>

        @if($errors->first('dependency'))
            <div class="formErrors">
                *{{$errors->first('dependency')}}
            </div>
        @endif

        <div>
            {{Form::label('name','Nombre:')}}
            {{ Form::text('name',$updateProduct->name) }}
        </div>

        @if($errors->first('name'))
            <div class="formErrors">
                *{{$errors->first('name')}}
            </div>
        @endif

        {{Form::submit('Actualizar Producto')}}
        {{Form::close()}}
    </section>

@stop