@extends('admin.layout.master')

@section('web_ads','open')
@section('ads_position','active')

@section('title') Ads Position | Edit @endsection
@section('page-name') Ads Position | Edit @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Ads Position</li>
@endsection

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/custom/css/custom.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@push('custom_js')

    <!-- BEGIN: Data Table-->
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
    <!-- END: Data Table-->
@endpush

@php
    $roles = userRolePermissionArray();
$status = [
    1 => 'Active',
    0 => 'In active'
];
@endphp

@section('content')
    <div class="content-body min-height">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            {!! Form::open([ 'route' => ['web.ads_position.update', $data['position']->PK_NO], 'method' => 'post', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::label('name','Name <span>*</span>', ['class' => 'label-title'], false) !!}
                                            {!! Form::text('name', old('name', $data['position']->NAME), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Name / Title']) !!}
                                            {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {!! $errors->has('position') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::label('position','Position ID <span>*</span>', ['class' => 'label-title'], false) !!}
                                            {!! Form::number('position', old('position', $data['position']->POSITION_ID), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Ad Position']) !!}
                                            {!! $errors->first('position', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {!! $errors->has('status') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::label('status','Status <span>*</span>', ['class' => 'label-title'], false) !!}
                                            {!! Form::select('status', $status, old('status', $data['position']->IS_ACTIVE),array('class'=>'form-control area','data-validation-required-message' => 'This field is required', 'placeholder'=>'Select Active Status')) !!}
                                            {!! $errors->first('status', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('web.ads_position')}}">
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
@endsection
