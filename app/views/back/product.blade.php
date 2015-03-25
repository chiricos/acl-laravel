@extends('layou/plantille')

@section('content')

    <h2>Productos</h2>
    <section>
        {{ Form::open(array('name'=>'form-update-permission','route' => 'product', 'method' => 'POST')) }}
        <div>
            {{Form::label('id','Id del producto:')}}
            {{Form::text('id')}}
            {{$errors->first('id')}}
        </div>
        <div>
            {{Form::label('dependency','dependencia:')}}
            {{ Form::select('dependency',$services) }}
            {{$errors->first('dependency')}}
        </div>

        <div>
            {{Form::label('name','Nombre:')}}
            {{ Form::text('name') }}
            {{$errors->first('name')}}
        </div>
        {{Form::submit('guardar producto')}}
        {{Form::close()}}
    </section>
    <div>
        <section class="">
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
                        <td><a href="">a</a></td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </section>
    </div>
    <div>
        <section class="">
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
                            <td><a href="">a</a></td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </section>
    </div>
    <div>
        <section class="">
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
                            <td><a href="">a</a></td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </section>
    </div>
    <div>
        <section class="">
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
                            <td><a href="">a</a></td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </section>
    </div>
    <div>
        <section class="">
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
                            <td><a href="">a</a></td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </section>
    </div>

    <div>
        <section class="">
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
                            <td><a href="">a</a></td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </section>
    </div>

@stop
