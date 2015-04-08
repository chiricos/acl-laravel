@extends('layou/plantille')

@section('content')

    <h1>Pagos Pendientes</h1>
    <div>
        @foreach($payments as $payment)
            --------
            @if($payment->type>0)
                @foreach($business as $client)
                    @if($payment->business_id==$client->id)
                        <p>Nombre de la empresa: {{$client->name}}</p>
                    @endif
                @endforeach
                <p>Fecha de Pago: {{$payment->payment}}</p>
                <p><a href="{{route('paymentBusiness',$payment->businessProduct_id)}}">Validar el pago</a></p>

            @endif

        @endforeach
    </div>

@stop