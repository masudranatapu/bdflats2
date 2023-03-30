@extends('admin.layouts.master')

@section('settings_menu', 'menu-open')
@section('nearbyarea', 'active')

@section('title') {{ __('NearBy Area | Update') }} @endsection
@section('page-name') {{ __('NearBy Area | Updat') }}e @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('NearBy Area') }}</li>
@endsection

@php

    $status = [
        1 => 'Active',
        0 => 'Inactive',
    ];
@endphp
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endpush

@push('script')
    <!-- BEGIN: Data Table-->
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js') }}"></script>
    <!-- END: Data Table-->
@endpush

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Nearby List') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Nearby List') }}</li>
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
                                    {{ __('Nearby List') }}
                                    <span class="float-right">
                                        <a href="{{ route('admin.nearbyarea.list') }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-backward"></i>
                                            {{ __('Back') }}
                                        </a>
                                    </span>
                                </h5>
                            </div>

                            <div class="card-body card-dashboard">
                                {!! Form::open([
                                    'route' => ['admin.nearbyarea.update', $data->id],
                                    'method' => 'post',
                                    'class' => 'form-horizontal',
                                    'files' => true,
                                    'novalidate',
                                ]) !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('title', 'Title *', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                {!! Form::text('title', old('title', $data->title), [
                                                    'class' => 'form-control',
                                                    'data-validation-required-message' => 'This field is required',
                                                    'placeholder' => 'NearBy Area',
                                                ]) !!}
                                                {!! $errors->first('title', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('order_id', 'Order ID *', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                {!! Form::number('order_id', old('order_id', $data->order_id), [
                                                    'class' => 'form-control',
                                                    'data-validation-required-message' => 'This field is required',
                                                    'placeholder' => 'Order ID',
                                                ]) !!}
                                                {!! $errors->first('order_id', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('icon', 'Icon *', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                <img src="{{ asset($data->ICON) }}" alt="{{ $data->title }}"
                                                    width="50">
                                                {!! Form::file('icon', old('icon'), ['class' => 'form-control']) !!}
                                                {!! $errors->first('icon', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('status', 'Status *', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                {!! Form::select('status', $status ?? [], old('status', $data->is_active), [
                                                    'class' => 'form-control',
                                                    'data-validation-required-message' => 'This field is required',
                                                    'placeholder' => 'Select Status',
                                                ]) !!}
                                                {!! $errors->first('status', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="{{ route('admin.nearbyarea.list') }}">
                                            <button type="button" class="btn btn-warning mr-1">
                                                <i class="fa fa-times"></i> {{ __('Cancel') }}
                                            </button>
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-save"></i> {{ __('Save') }}
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

@push('script')

@endpush
