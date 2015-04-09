@extends('layou.plantille')

@section('titleContent')
    <h1>Pagos De La Empresa {{$business->name}}</h1>
@stop

@section('content')
    <div class="formContent">
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
    <div class="formContent">
        {{ Form::open(array('name'=>'form-create-user','url' => 'admin/crearPagos/'.$business->id, 'method' => 'POST')) }}
        <div>
            {{ Form::label('type', 'Općiones') }}
            {{ Form::select('type', $option, count($business->payments), array('id' => 'payment-option')) }}
        </div>

        <section class="payment-input">
        @if(count($business->payments)>=1)
        <div>
            {{Form::label('payment','Primer Pago')}}
            {{Form::input('date','0',$business->payments[0]["payment"])}}
            {{$errors->first('0')}}
        </div>
        @else
        <div>
            {{Form::label('payment','Primer Pago')}}
            {{Form::input('date','0')}}
            {{$errors->first('0')}}
        </div>
        @endif
        </section>
        <section class="payment-input">
        @if(count($business->payments)>=2)
        <div>
            {{Form::label('payment','Segundo Pago')}}
            {{Form::input('date','1',$business->payments[1]["payment"])}}
            {{$errors->first('1')}}
        </div>
        @else
        <div>
            {{Form::label('payment','Segundo Pago')}}
            {{Form::input('date','1')}}
            {{$errors->first('1')}}
        </div>
        @endif
        </section>
        <section class="payment-input">
        @if(count($business->payments)>=3)
        <div>
            {{Form::label('payment','Tercer Pago')}}
            {{Form::input('date','2',$business->payments[2]["payment"])}}
            {{$errors->first('2')}}
        </div>
        @else
        <div>
            {{Form::label('payment','Tercer Pago')}}
            {{Form::input('date','2')}}
            {{$errors->first('2')}}
        </div>
        @endif
        </section>
        {{ Form::submit('Guardar Cambios') }}

        {{ Form::close() }}
    </div>

@stop

@section('javascript')
    {{ HTML::script('js/payment.js'); }}
@stop