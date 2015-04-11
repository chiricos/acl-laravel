@extends('layou/plantille')

@section('titleContent')
    <h1>Pagos Pendientes</h1>
@stop

@section('content')



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

                    @if($payment->type>0)
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
                        <td><a href="{{route('paymentBusiness',$payment->businessProduct_id)}}">Validar el pago</a></td>
                        </tr>
                    @endif
                @endforeach

                </tbody>
            </table>

        </section>

    </div>

@stop