@extends('layou.plantille')


@section('content')
    <h1>Pagos de la empresa {{$business->name}}</h1>
    <div>
        {{ Form::open(array('name'=>'form-create-user','url' => 'admin/pagos/'.$business->id, 'method' => 'POST')) }}

        <div>
            {{ Form::label('name', 'Općiones') }}
            {{ Form::select('name', $option, $business->payment["name"], array('id' => 'payment-option')) }}
            {{$errors->first('name')}}
        </div>
        <section class="payment-input hidden">
            <div >
                {{ Form::label('first_payment', 'Primer pago') }}
                {{Form::input('date','first_payment',$business->payment["first_payment"])}}
                {{$errors->first('first_payment')}}
            </div>

            <div>
                {{ Form::label('first_validator', 'Pago realizado') }}
                {{ Form::checkbox('first_validator',1,$business->payment["first_validator"]) }}
                {{$errors->first('first_validator')}}
            </div>
        </section>

        <section class="payment-input hidden">
            <div>
                {{ Form::label('second_payment', 'Segundo pago') }}
                {{Form::input('date','second_payment',$business->payment["second_payment"])}}
                {{$errors->first('second_payment')}}
            </div>

            <div>
                {{ Form::label('second_validator', 'Pago realizado') }}
                {{ Form::checkbox('second_validator',1,$business->payment["second_validator"]) }}
                {{$errors->first('second_validator')}}
            </div>
        </section>

        <section class="payment-input hidden">
            <div>
                {{ Form::label('third_payment', 'Tercer pago') }}
                {{Form::input('date','third_payment',$business->payment["third_payment"])}}
                {{$errors->first('third_payment')}}
            </div>

            <div>
                {{ Form::label('third_validator', 'Pago realizado') }}
                {{ Form::checkbox('third_validator',1,$business->payment["third_validator"]) }}
                {{$errors->first('third_validator')}}
            </div>
        </section>

        {{ Form::submit('Guardar Cambios') }}

        {{ Form::close() }}

    </div>

@stop

@section('javascript')
    {{ HTML::script('js/payment.js'); }}
@stop