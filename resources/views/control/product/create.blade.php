@extends('control.layouts.master')

@section('content')
    @include('control.product._form',[
        'title'  => 'Create Product',
        'action' => action('ProductController@store'),
        'method' => 'POST'
    ])
@endsection