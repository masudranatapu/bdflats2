@extends('admin.layouts.master')

@section('Product Management','open')
@section('city_list','active')

@section('title') City / Division @endsection
@section('page-name') City / Division @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">City / Division</li>
@endsection

@php

$status = [
    1 => 'Active',
    0 => 'Inactive'
];
@endphp
@push('custom_css')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@push('custom_js')
    <!-- BEGIN: Data Table-->
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
    <!-- END: Data Table-->
@endpush

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('City / Division') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('City / Division') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">
                                {{ __('City / Division list') }}
                                <span class="float-right">
                                    <a href="{{ route('admin.city.create') }}" class="btn btn-sm btn-primary">
                                        + Create
                                    </a>
                                </span>
                            </h5>
                        </div>

                        <div class="card-body card-dashboard">
                            {!! Form::open([ 'route' => 'admin.city.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('city_name', 'City Name *', ['class' => 'label-title']) !!}
                                        <div class="controls">
                                            {!! Form::text('city_name', old('city_name'), ['class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'City Name']) !!}
                                            {!! $errors->first('city_name', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('latitude', 'Latitude *', ['class' => 'label-title']) !!}
                                        <div class="controls">
                                            {!! Form::text('latitude', old('latitude'), ['class' => 'form-control', 'placeholder' => 'Latitude']) !!}
                                            {!! $errors->first('latitude', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('longitude', 'Longitude *', ['class' => 'label-title']) !!}
                                        <div class="controls">
                                            {!! Form::text('longitude', old('longitude'), ['class' => 'form-control', 'placeholder' => 'Longitude']) !!}
                                            {!! $errors->first('longitude', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('order', 'Order *', ['class' => 'label-title']) !!}
                                        <div class="controls">
                                            {!! Form::number('order', old('order'), ['class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Order']) !!}
                                            {!! $errors->first('order', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('status', 'Status *', ['class' => 'label-title']) !!}
                                        <div class="controls">
                                            {!! Form::select('status', $status ?? [], old('status'), ['class' => 'form-control', 'data-validation-required-message' => 'This field is required']) !!}
                                            {!! $errors->first('status', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('populate', 'Is Populate *', ['class' => 'label-title']) !!}
                                        <div class="controls">
                                            {!! Form::select('populate', [1 => 'Populate', 0 => 'Common'], old('populate'), ['class' => 'form-control', 'data-validation-required-message' => 'This field is required']) !!}
                                            {!! $errors->first('populate', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a href="{{ route('admin.city.list')}}">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="ft-x"></i> Cancel
                                        </button>
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Save
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


@push('custom_js')

    <!--script only for brand page-->
    <script type="text/javascript" src="{{ asset('app-assets/pages/category.js')}}"></script>


@endpush('custom_js')
