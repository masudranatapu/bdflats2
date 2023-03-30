@extends('admin.layouts.master')

@section('Web Ads', 'menu-open')

@section('ads_list', 'active')

@section('title') Ads | Edit @endsection

@section('page-name') Ads | Edit @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Ads | Edit</li>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('/custom/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/forms/datepicker/bootstrap-datetimepicker.min.css') }}">
@endpush

@section('content')
    @php
        $status = [
            1 => 'Published',
            0 => 'Pending',
        ];
    @endphp
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Ads | Edit') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Ads | Edit') }}</li>
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
                                    {{ __('Ads | Edit') }}
                                    <span class="float-right">
                                        {{-- <a href="{{ route('admin.ads') }}" class="btn btn-sm btn-primary">All Ads</a> --}}
                                        <a href="{{ route('admin.ads') }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-backward"></i>
                                            Back
                                        </a>
                                    </span>
                                </h5>
                            </div>
                            <div class="card-body">
                                {!! Form::open([
                                    'route' => ['admin.ads.update', $data['ad']->id],
                                    'method' => 'post',
                                    'files' => true,
                                    'novalidate',
                                    'autocomplete' => 'off',
                                ]) !!}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {!! $errors->has('position') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::label('position', 'Ad Position ID <span>*</span>', ['class' => 'label-title'], false) !!}
                                                    {!! Form::select('position', $data['positions'] ?? [], old('position', $data['ad']->F_AD_POSITION_NO), [
                                                        'class' => 'form-control',
                                                        'data-validation-required-message' => 'This field is required',
                                                        'placeholder' => 'Ad Position',
                                                    ]) !!}
                                                    {!! $errors->first('position', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {!! $errors->has('start_date') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::label('start_date', 'Start Date <span>*</span>', ['class' => 'label-title'], false) !!}
                                                    {!! Form::text('start_date', old('start_date', date('d-m-Y', strtotime($data['ad']->AVAILABLE_FROM))), [
                                                        'class' => 'datetimepicker form-control',
                                                        'data-validation-required-message' => 'This field is required',
                                                        'placeholder' => 'Available From',
                                                    ]) !!}
                                                    {!! $errors->first('start_date', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {!! $errors->has('end_date') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::label('end_date', 'End Date <span>*</span>', ['class' => 'label-title'], false) !!}
                                                    {!! Form::text('end_date', old('end_date', date('d-m-Y', strtotime($data['ad']->AVAILABLE_TO))), [
                                                        'class' => 'datetimepicker form-control',
                                                        'data-validation-required-message' => 'This field is required',
                                                        'placeholder' => 'Available To',
                                                    ]) !!}
                                                    {!! $errors->first('end_date', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {!! $errors->has('status') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::label('status', 'Status <span>*</span>', ['class' => 'label-title'], false) !!}
                                                    {!! Form::select('status', $status, old('status', $data['ad']->STATUS), [
                                                        'class' => 'form-control area',
                                                        'data-validation-required-message' => 'This field is required',
                                                        'placeholder' => 'Select Status',
                                                    ]) !!}
                                                    {!! $errors->first('status', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.ads') }}">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="fa fa-times"></i>
                                            Cancel
                                        </button>
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i>
                                        Save
                                    </button>
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
    <!-- BEGIN: Data Table-->
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js') }}"></script>
    <!-- END: Data Table-->

    <script src="{{ asset('/assets/js/forms/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('/assets/js/forms/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
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
