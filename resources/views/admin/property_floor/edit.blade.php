@extends('admin.layouts.master')

@section('settings_menu','menu-open')
@section('propertyfloor','active')

@section('name') Floor | Update @endsection
@section('page-name') Floor | Update @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Floor</li>
@endsection

@php

$status = [
    1 => 'Active',
    0 => 'Inactive'
];
@endphp
@push('style')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@push('script')
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
                    <h1 class="m-0">{{ __('Floor') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Floor') }}</li>
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
                                {{ __('Floor list') }}
                                <span class="float-right">
                                    <a href="{{ route('admin.propertyfloor.create') }}" class="btn btn-sm btn-primary">
                                        + Create
                                    </a>
                                </span>
                            </h5>
                        </div>
                        <div class="card-body card-dashboard">
                            {!! Form::open([ 'route' => ['admin.propertyfloor.update', $data['floor']->id], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Name *', ['class' => 'label-name']) !!}
                                        <div class="controls">
                                            {!! Form::text('name', old('name', $data['floor']->name), ['class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Floor']) !!}
                                            {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('order_id', 'Order ID *', ['class' => 'label-name']) !!}
                                        <div class="controls">
                                            {!! Form::number('order_id', old('order_id', $data['floor']->order_id), ['class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Order ID']) !!}
                                            {!! $errors->first('order_id', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('status', 'Status *', ['class' => 'label-name']) !!}
                                        <div class="controls">
                                            {!! Form::select('status', $status ?? [], old('status', $data['floor']->is_active), ['class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Select Status']) !!}
                                            {!! $errors->first('status', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a href="{{ route('admin.propertyfloor.list')}}">
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


@push('script')

    <!--script only for brand page-->
    <script type="text/javascript" src="{{ asset('app-assets/pages/category.js')}}"></script>


@endpush('script')
