@extends('control.layouts.master')

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-title">
                            <h4>Products</h4>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        {!! $dataTable->table(['class' => 'table table-striped']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    {!! $dataTable->scripts() !!}
@endsection
