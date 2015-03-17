@extends('layou.plantille')


@section('content')
    <h1>Pagos de la empresa {{$business->name}}</h1>
    <div>
        {{ Form::open(array('name'=>'form-create-user','url' => 'admin/pagos/'.$business->id, 'method' => 'POST')) }}

        <div>
            @if(count($business->payments)==1)
                <p>Una Cuota</p>
            @endif
            @if(count($business->payments)==2)
                <p>Dos Cuotas</p>
            @endif
            @if(count($business->payments)==3)
                <p>Tres Cuotas</p>
            @endif
        </div>
        @if(count($business->payments)>=1)

        <section class="payment-input ">
            <div >
                {{ Form::text('id0',$business->payments[0]["id"]) }}
                <p>Primer Pago: {{$business->payments[0]["payment"]}}</p>
                {{ Form::label('validator0', 'Pago realizado') }}
                {{ Form::checkbox('validator0',1,$business->payments[0]["validator"]) }}
            </div>
        </section>
        @endif
        @if(count($business->payments)>=2)
            <section class="payment-input ">
                <div >
                    {{ Form::text('id1',$business->payments[1]["id"]) }}
                    <p>Primer Pago: {{$business->payments[1]["payment"]}}</p>
                    {{ Form::label('validator1', 'Pago realizado') }}
                    {{ Form::checkbox('validator1',1,$business->payments[1]["validator"]) }}
                </div>
            </section>
        @endif
        @if(count($business->payments)==3)
            <section class="payment-input ">
                <div >
                    {{ Form::text('id2',$business->payments[2]["id"]) }}
                    <p>Primer Pago: {{$business->payments[2]["payment"]}}</p>
                    {{ Form::label('validator2', 'Pago realizado') }}
                    {{ Form::checkbox('validator2',1,$business->payments[2]["validator"]) }}
                </div>
            </section>
        @endif



        {{ Form::submit('Guardar Cambios') }}

        {{ Form::close() }}

    </div>
    <div>
        {{ Form::label('type', 'Općiones') }}

        {{$errors->first('type')}}
        {{ Form::select('type', $option, $business->payments[0]["type"], array('id' => 'payment-option')) }}
    </div>

@stop

@section('javascript')
    {{ HTML::script('js/payment.js'); }}
@stop