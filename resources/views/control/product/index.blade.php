@extends('control.layouts.master')

@section('css')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                {!! $dataTable->table() !!}
            </div>
        </div>
    </div>

@stop

@section('js')
    {!! $dataTable->scripts() !!}
@endsection
