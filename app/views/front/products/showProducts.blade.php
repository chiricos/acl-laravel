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

    <div class="wrapperContent">
        <div class="tableContent">
            <h2>Productos Adquiridos por {{$business->name}}</h2>
            <table class=" ">
                <thead>
                <tr>
                    <th>Nombre de la empresa </th>
                    <th>Id del producto</th>
                    <th>Producto</th>
                    <th>Valor</th>
                    <th>acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($businessProducts as $businessProduct)
                    <tr>
                        <td>{{$business->name}}</td>
                        <td>id del pr</td>
                        <td>producto</td>
                        <td>{{$businessProduct->value}}</td>

                        <td><a class="icon-folder-open" href="{{route('paymentBusiness',$businessProduct->id)}}"></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@stop
