@extends('layou/plantille')

@section('titleContent')
    <h1>Pagos Pendientes</h1>
@stop

@section('content')


    <a class="icon-reply back" href="{{route('home')}}"></a>
    <div class="wrapperContent">
        <section class="tableContent">
            <table class=" ">
                <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>Celular</th>
                    <th>Producto</th>
                    <th>Fecha de pago</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            @foreach($businessProducts as $businessProduct)
                                @if($payment->businessProduct_id==$businessProduct->id)
                                    @foreach($business as $client)
                                        @if($businessProduct->business_id==$client->id)
                                            <td>{{ HTML::image('business/'.$client->photo,'',array('style'=>'width: 100px;')) }}</td>
                                            <td> {{$client->name}}</td>
                                            <td>{{$client->email}}</td>
                                            <td>{{$client->mobile_phone}}</td>
                                        @endif
                                    @endforeach
                                    @foreach($products as $product)
                                        @if($businessProduct->product_id==$product->id)
                                            <td> {{$product->name}}</td>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                                <td>{{$payment->payment}}</td>
                                <td><a class="icon-folder-open" href="{{route('paymentBusiness',$payment->businessProduct_id)}}"></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </section>
        <p style="font-weight: 100"> Total de registros{{$payments->getTotal()}} </p>
        {{$payments->links();}}
    </div>

@stop