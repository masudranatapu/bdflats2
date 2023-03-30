@extends('admin.layouts.master')

@section('settings_menu', 'menu-open')
@section('propertyfeatures', 'active')

@section('title') {{ __('Property Features | Create') }} @endsection
@section('page-name') {{ __('Property Features | Create') }} @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Property Features') }}</li>
@endsection

@push('style')

@endpush

@php

    $status = [
        1 => 'Active',
        0 => 'Inactive',
    ];
@endphp

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Property Features') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Property Features') }}</li>
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
                                    {{ __('Property Features Create') }}
                                    <span class="float-right">
                                        <a href="{{ route('admin.propertyfeatures.list') }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-backward"></i>
                                            {{ __('Back') }}
                                        </a>
                                    </span>
                                </h5>
                            </div>
                            <div class="card-body card-dashboard">
                                {!! Form::open([
                                    'route' => 'admin.propertyfeatures.store',
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
                                                {!! Form::text('title', old('title'), [
                                                    'class' => 'form-control',
                                                    'data-validation-required-message' => 'This field is required',
                                                    'placeholder' => 'Property Features',
                                                ]) !!}
                                                {!! $errors->first('title', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('order_id', 'Order ID *', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                {!! Form::number('order_id', old('order_id'), [
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
                                                {!! Form::file('icon', old('icon'), [
                                                    'class' => 'form-control',
                                                    'data-validation-required-message' => 'This field is required',
                                                ]) !!}
                                                {!! $errors->first('icon', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('status', 'Status *', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                {!! Form::select('status', $status ?? [], old('status'), [
                                                    'class' => 'form-control',
                                                    'data-validation-required-message' => 'This field is required',
                                                    'placeholder' => 'Select Status',
                                                ]) !!}
                                                {!! $errors->first('status', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="{{ route('admin.propertyfeatures.list') }}">
                                            <button type="button" class="btn btn-warning mr-1">
                                                <i class="fa fa-times"></i>
                                                {{ __('Cancel') }}
                                            </button>
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-save"></i>
                                            {{ __('Save') }}
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
    <script type="text/javascript" src="{{ asset('app-assets/pages/category.js') }}"></script>
@endpush('script')
