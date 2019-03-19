@extends('control.layouts.master')

@section('content')
    @include('control.product._form',[
        'title'  => 'Update Product',
        'action' => action('ProductController@update',['id' => $id]),
        'method' => 'PUT'
    ])
@endsection
