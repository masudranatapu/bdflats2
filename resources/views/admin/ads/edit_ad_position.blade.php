@extends('admin.layouts.master')

@section('Web Ads','menu-open')
@section('ads_position','active')

@section('title') Ads Position | Edit @endsection
@section('page-name') Ads Position | Edit @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Ads Position</li>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/custom/css/custom.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@push('script')

    <!-- BEGIN: Data Table-->
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
    <!-- END: Data Table-->
@endpush

@php

$status = [
    1 => 'Active',
    0 => 'In active'
];
@endphp

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Ad position') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Ad position') }}</li>
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
                            <h5 class="m-0">{{ __('Ad position list') }}</h5>
                            <span class="float-right">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-primary">All Users</a>
                                <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary">+ Create
                                    Role</a>
                            </span>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                {!! Form::open([ 'route' => ['admin.ads_position.update', $data['position']->id], 'method' => 'post', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::label('name','Name <span>*</span>', ['class' => 'label-title'], false) !!}
                                                {!! Form::text('name', old('name', $data['position']->name), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Name / Title']) !!}
                                                {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {!! $errors->has('position') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::label('position','Position ID <span>*</span>', ['class' => 'label-title'], false) !!}
                                                {!! Form::number('position', old('position', $data['position']->position_id), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Ad Position']) !!}
                                                {!! $errors->first('position', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {!! $errors->has('status') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::label('status','Status <span>*</span>', ['class' => 'label-title'], false) !!}
                                                {!! Form::select('status', $status, old('status', $data['position']->is_active),array('class'=>'form-control area','data-validation-required-message' => 'This field is required', 'placeholder'=>'Select Active Status')) !!}
                                                {!! $errors->first('status', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.ads_position')}}">
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
</div>
@endsection
