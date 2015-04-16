@extends('layou/plantille')

@section('titleContent')
    <h1>Productos</h1>
@stop

@section('content')

    <section class="formContent">
        <a class="icon-lock"></a>
        {{ Form::open(array('name'=>'form-update-permission','route' => 'product', 'method' => 'POST')) }}
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
    <div class="wrapperContent">
        <section class="tableContent">
            <h2>BRANDING</h2>
            <table class=" ">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                    @if($product->dependency==1)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td><a class="icon-ccw " href="{{route('updateProduct',$product->id)}}"></a><a  class="icon-trash " href="{{route('deleteProduct',$product->id)}}"></a></td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </section>
        </div>
        <div class="wrapperContent">
        <section class="tableContent">
            <h2>WEB Y APPS</h2>
            <table class=" ">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                    @if($product->dependency==2)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td><a class="icon-ccw " href="{{route('updateProduct',$product->id)}}"></a><a  class="icon-trash " href="{{route('deleteProduct',$product->id)}}"></a></td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </section>
        </div>
    <div class="wrapperContent">
        <section class="tableContent">
            <h2>MARKETING</h2>
            <table class=" ">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                    @if($product->dependency==3)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td><a class="icon-ccw " href="{{route('updateProduct',$product->id)}}"></a><a  class="icon-trash " href="{{route('deleteProduct',$product->id)}}"></a></td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </section>
    </div>
    <div class="wrapperContent">
        <section class="tableContent">
            <h2>PRODUCCIÓN AUDIOVISUAL</h2>
            <table class=" ">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                    @if($product->dependency==4)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td><a class="icon-ccw " href="{{route('updateProduct',$product->id)}}"></a><a  class="icon-trash " href="{{route('deleteProduct',$product->id)}}"></a></td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </section>
    </div>
    <div class="wrapperContent">
        <section class="tableContent">
            <h2>ESTRATEGIA</h2>
            <table class=" ">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                    @if($product->dependency==5)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td><a class="icon-ccw " href="{{route('updateProduct',$product->id)}}"></a><a  class="icon-trash " href="{{route('deleteProduct',$product->id)}}"></a></td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </section>
    </div>
    <div class="wrapperContent">
        <section class="tableContent">
            <h2>IMPRESIÓN</h2>
            <table class=" ">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                    @if($product->dependency==6)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td><a class="icon-ccw " href="{{route('updateProduct',$product->id)}}"></a><a  class="icon-trash " href="{{route('deleteProduct',$product->id)}}"></a></td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </section>
    </div>

@stop
