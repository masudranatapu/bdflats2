@extends('admin.layouts.master')

@section('settings_menu','menu-open')
@section('payment_method','active')

@section('title')
    Edit Payment Method
@endsection
@section('page-name')
    Edit Payment Method
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Edit Payment Method</li>
@endsection

<!--push from page-->
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
@endpush

@php($tabIndex = 0)

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Admin roles') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Admin roles') }}</li>
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
                                {{ __('Admin roles list') }}
                                <span class="float-right">
                                    <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary">
                                        + Create Role
                                    </a>
                                </span>
                            </h5>
                        </div>

                        <div class="card-body">
                            {!! Form::open([ 'route' => ['admin.payment_method.update',$data['rows']->id], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group {!! $errors->has('payment_method_name') ? 'error' : '' !!}">
                                            <label>Payment Method Name<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                {!! Form::text('payment_method_name', $data['rows']->name,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter Payment Method Name', 'tabIndex' => ++$tabIndex ]) !!}
                                                {!! $errors->first('payment_method_name', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group {!! $errors->has('status') ? 'status' : '' !!}">
                                            <label>Status<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                {!! Form::select('status',['1'=>'Active','0'=>'Inactive'],$data['rows']->is_active,[ 'class' => 'form-control mb-1','data-validation-required-message' => 'This field is required', 'placeholder' => 'Select Status', 'tabIndex' => ++$tabIndex ]) !!}
                                                {!! $errors->first('status', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions mt-10 mb-3">
                                <a href="{{route('admin.payment_method.list')}}">
                                    <button type="button" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i> Cancel
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
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

<!--push from page-->
@push('sript')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
@endpush('sript')
