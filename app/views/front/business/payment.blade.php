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

        <section class="">
            <div >
                {{ Form::text('id0',$business->payments[0]["id"],["class"=>"hidden"]) }}
                <p>Primer Pago: {{$business->payments[0]["payment"]}}</p>
                {{ Form::label('validator0', 'Pago realizado') }}
                {{ Form::checkbox('validator0',1,$business->payments[0]["validator"]) }}
            </div>
        </section>
        @endif
        @if(count($business->payments)>=2)
            <section class=" ">
                <div >
                    {{ Form::text('id1',$business->payments[1]["id"],["class"=>"hidden"]) }}
                    <p>Primer Pago: {{$business->payments[1]["payment"]}}</p>
                    {{ Form::label('validator1', 'Pago realizado') }}
                    {{ Form::checkbox('validator1',1,$business->payments[1]["validator"]) }}
                </div>
            </section>
        @endif
        @if(count($business->payments)==3)
            <section class=" ">
                <div >
                    {{ Form::text('id2',$business->payments[2]["id"],["class"=>"hidden"]) }}
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
        {{ Form::open(array('name'=>'form-create-user','url' => 'admin/crearPagos/'.$business->id, 'method' => 'POST')) }}
        {{ Form::label('type', 'Općiones') }}
        {{ Form::select('type', $option, count($business->payments), array('id' => 'payment-option')) }}
        <section class="payment-input">
        @if(count($business->payments)>=1)
            {{Form::label('payment','Primer Pago')}}
            {{Form::input('date','0',$business->payments[0]["payment"])}}
            {{$errors->first('0')}}
        @else
            {{Form::label('payment','Primer Pago')}}
            {{Form::input('date','0')}}
            {{$errors->first('0')}}
        @endif
        </section>
        <section class="payment-input">
        @if(count($business->payments)>=2)
            {{Form::label('payment','Segundo Pago')}}
            {{Form::input('date','1',$business->payments[1]["payment"])}}
            {{$errors->first('1')}}
        @else
            {{Form::label('payment','Segundo Pago')}}
            {{Form::input('date','1')}}
            {{$errors->first('1')}}
        @endif
        </section>
        <section class="payment-input">
        @if(count($business->payments)>=3)
            {{Form::label('payment','Tercer Pago')}}
            {{Form::input('date','2',$business->payments[2]["payment"])}}
            {{$errors->first('2')}}
        @else
            {{Form::label('payment','Tercer Pago')}}
            {{Form::input('date','2')}}
            {{$errors->first('2')}}
        @endif
        </section>
        {{ Form::submit('Guardar Cambios') }}

        {{ Form::close() }}
    </div>

@stop

@section('javascript')
    {{ HTML::script('js/payment.js'); }}
@stop