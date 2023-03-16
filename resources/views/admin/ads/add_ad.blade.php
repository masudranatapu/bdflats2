@extends('admin.layout.master')

@section('web_ads','open')
@section('ads','active')

@section('title') Ads | Create @endsection
@section('page-name') Ads | Create @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Ads</li>
@endsection

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/custom/css/custom.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/datepicker/bootstrap-datetimepicker.min.css')}}">
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
    1 => 'Published',
    0 => 'Pending'
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
                            {!! Form::open([ 'route' => 'web.ads.store', 'method' => 'post', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {!! $errors->has('position') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::label('position','Ad Position <span>*</span>', ['class' => 'label-title'], false) !!}
                                            {!! Form::select('position', $data['positions'] ?? [], old('position'), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Ad Position']) !!}
                                            {!! $errors->first('position', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {!! $errors->has('start_date') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::label('start_date','Start Date <span>*</span>', ['class' => 'label-title'], false) !!}
                                            {!! Form::text('start_date', old('start_date'), ['class'=>'datetimepicker form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Available From']) !!}
                                            {!! $errors->first('start_date', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {!! $errors->has('end_date') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::label('end_date','End Date <span>*</span>', ['class' => 'label-title'], false) !!}
                                            {!! Form::text('end_date', old('end_date'), ['class'=>'datetimepicker form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Available To']) !!}
                                            {!! $errors->first('end_date', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {!! $errors->has('status') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::label('status','Status <span>*</span>', ['class' => 'label-title'], false) !!}
                                            {!! Form::select('status', $status, old('status'),array('class'=>'form-control area','data-validation-required-message' => 'This field is required', 'placeholder'=>'Select Status')) !!}
                                            {!! $errors->first('status', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('web.ads')}}">
                                <button type="button" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Cancel
                                </button>
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> Save
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="{{asset('/assets/js/forms/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('/assets/js/forms/datepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <script>
        $('.datetimepicker').datetimepicker({
            icons: {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            format: 'DD-MM-YYYY'
        });
    </script>
@endpush
