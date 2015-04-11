@extends('layou.plantille')

@section('titleContent')
    <h1>Productos</h1>
@stop

@section('content')

<div class="formContent">
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
</div>
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
                        <td>{{$businessProduct->product_id}}</td>
                        @foreach($showProducts as $product)

                            @if($product->id==$businessProduct->product_id)

                                <td>{{$product->name}}</td>
                            @endif
                        @endforeach
                        <td>{{$businessProduct->value}}</td>

                        <td>
                            <a class="icon-folder-open" href="{{route('paymentBusiness',$businessProduct->id)}}"></a>
                            <a class="icon-trash " href="{{route('deleteProduct',$businessProduct->id)}}"></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@stop
