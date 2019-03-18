@extends('control.layouts.master')

@section('content')
    @include('control.product._form',[
        'action' => action('ProductController@store'),
        'method' => 'POST'
    ])
@stop
