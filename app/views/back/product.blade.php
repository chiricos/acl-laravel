@extends('layou/plantille')

@section('titleContent')
    <h1>Productos</h1>
@stop

@section('content')
    <div  class="" >
        <a href="{{route('createProduct')}}" class="buttonA business">Crear producto</a>
        <a class="seeCategory buttonA business-fixed">Ver por categorias</a>
    </div>

    <div class="">
        {{ Form::open(array('name'=>'form','route' => 'productSearch', 'method' => 'POST','class'=>'formSearch')) }}
        <div class="buttonSearch">
            <div>
                {{Form::text('search')}}
            </div>

            <button>{{ HTML::image('img/search.png','',array('id'=>'')) }}</button>
            {{Form::close()}}
        </div>
    </div>

    <div class="wrapperContent" id="products">
        <section class="tableContent">
            <h2>Productos</h2>
            <table class=" ">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Seccion</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            @if($product->dependency==1)
                                <td>Branding</td>
                            @endif
                            @if($product->dependency==2)
                                <td>Web y App</td>
                            @endif
                            @if($product->dependency==3)
                                <td>Marketing</td>
                            @endif
                            @if($product->dependency==4)
                                <td>Produccion Audiovisual</td>
                            @endif
                            @if($product->dependency==5)
                                <td>Estrategia</td>
                            @endif
                            @if($product->dependency==6)
                                <td>Impresion</td>
                            @endif
                            <td><a class="icon-ccw " href="{{route('updateProduct',$product->id)}}"></a><a  class="icon-trash " href="{{route('deleteProduct',$product->id)}}"></a></td>
                        </tr>

                @endforeach
                </tbody>
            </table>

        </section>
    </div>
<section class="category hidden">
    <div class="wrapperContent ">
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
</section>
@stop

@section('javascript')
    {{ HTML::script('js/products.js'); }}
@stop
