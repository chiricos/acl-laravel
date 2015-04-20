@extends('layou.plantille')

@section('titleContent')
    <h1>Productos de</h1>
@stop

@section('content')
    <a href="{{route('seeBusiness',$business->id)}}" class="icon-reply back"></a>
    <div class="formContent">
        {{ Form::open(array('name'=>'form-update-permission','to' => 'admin/agregarProducto/'.$id, 'method' => 'POST')) }}

        <div>
            {{Form::label('product_id','Producto:')}}
            {{ Form::select('product_id',$products) }}
        </div>

        @if($errors->first('product_id'))
            <div class="formErrors">
                *{{$errors->first('product_id')}}
            </div>
        @endif

        <div>
            {{Form::label('quantity','Cantidad:')}}
            {{ Form::text('quantity') }}
        </div>

        @if($errors->first('quantity'))
            <div class="formErrors">
                *{{$errors->first('quantity')}}
            </div>
        @endif

        <div>
            {{Form::label('value','Valor:')}}
            {{ Form::text('value') }}
        </div>

        @if($errors->first('value'))
            <div class="formErrors">
                *{{$errors->first('value')}}
            </div>
        @endif

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
                    <th>Id del producto</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Valor</th>
                    <th>acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($businessProducts as $businessProduct)
                    <tr>
                        <td>{{$businessProduct->product_id}}</td>
                        @foreach($showProducts as $product)

                            @if($product->id==$businessProduct->product_id)

                                <td>{{$product->name}}</td>
                            @endif
                        @endforeach
                        <td>{{$businessProduct->quantity}}</td>
                        <td>{{$businessProduct->value}}</td>

                        <td>
                            <a class="icon-ccw" href="{{route('updateProducts',$businessProduct->id)}}"></a>
                            <a class="icon-trash " href="{{route('dellProducts',$businessProduct->id)}}"></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@stop
@section('javascript')
    {{ HTML::script('js/business.js'); }}
@stop