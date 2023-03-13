@extends('admin.layouts.master')

@section('Payment','menu-open')
@section('recharge_request','active')

@section('title') Update Recharge Request @endsection
@section('page-name') Update Recharge Request @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Update Recharge Request</li>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@push('script')

    <!-- BEGIN: Data Table-->
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
    <!-- END: Data Table-->
@endpush

@php

@endphp

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
                            <h5 class="m-0">{{ __('Admin roles list') }}</h5>
                            <span class="float-right">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-primary">All Users</a>
                                <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary">+ Create
                                    Role</a>
                            </span>
                        </div>

                        <div class="card-body">
                            <div class="row  mb-2">
                                <div class="col-12">
                                    <p><strong>User ID: </strong>{{ $data['recharge']->c_code }}</p>
                                    <p> <strong>Property {{ $data['recharge']->user_type == 1 ? 'Seeker' : 'Owner' }} Name: </strong>{{ $data['recharge']->c_name }}</p>
                                    <p><strong>Property {{ $data['recharge']->user_type == 1 ? 'Seeker' : 'Owner' }}
                                            Mobile: </strong>{{ $data['recharge']->c_mobile_no }}</p>
                                    <p><strong>Payment
                                            Date: </strong>{{ date('M d, Y', strtotime($data['recharge']->payment_date)) }}
                                    </p>
                                    <p><strong>Payment Note: </strong>{{ $data['recharge']->payment_note }}</p>
                                    <p><strong>Amount: </strong>BDT {{ number_format($data['recharge']->amount, 2) }}
                                    </p>
                                    <p><strong>Slip Number: </strong>{{ $data['recharge']->slip_number ?? 'N/A' }}</p>
                                    <p>
                                        <strong>Attachment: </strong>{{ $data['recharge']->attachment_path ? asset($data['recharge']->attachment_path) : 'N/A' }}
                                    </p>
                                    @if($data['recharge']->status == 1)
                                        <p>
                                            <strong>Status: </strong> Approved
                                        </p>
                                    @else
                                        <hr>
                                        {!! Form::open([ 'route' => ['admin.recharge_request.update', $data['recharge']->id], 'method' => 'post', 'id' => 'recharge_form', 'class' => 'form-horizontal', 'files' => false , 'novalidate']) !!}
                                        <div class="row">
                                            <div class="col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label for="status"><strong>Status</strong></label>
                                                    <div class="controls">
                                                        {!! Form::select('status', [0 => 'Pending', 1 => 'Approved', 2 => 'Denied'], $data['recharge']->status, ['class'=>'form-control mb-1 select2', 'id' => 'status', 'data-validation-required-message' => 'This field is required', 'tabindex' => 1]) !!}
                                                        {!! $errors->first('status', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-6">
                                                <div class="form-group">
                                                    <a href="{{ route('admin.recharge_request')}}">
                                                        <button type="button" class="btn btn-warning mr-1">
                                                            <i class="ft-x"></i> Cancel
                                                        </button>
                                                    </a>
                                                    <button type="submit" class="btn btn-primary"
                                                            onclick="return confirm('Are you sure?')">
                                                        <i class="la la-check-square-o"></i> Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    @endif
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
