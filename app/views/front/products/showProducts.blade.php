@extends('layou.plantille')


@section('content')

    <h1>Productos</h1>

    <div>
        {{Form::label('dependency','dependencia:')}}
        {{ Form::select('dependency',$services) }}
        {{$errors->first('dependency')}}
    </div>

@stop
