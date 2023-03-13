@extends('admin.layouts.master')

@section('Payment', 'menu-open')
@section('refund_request', 'active')

@section('title') Update Refund Request @endsection
@section('page-name') Update Refund Request @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Update Refund Request</li>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Refund Request edit') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Refund Request edit') }}</li>
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
                                <h5 class="m-0">{{ __('Refund Request edit') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row  mb-2">
                                    <div class="col-12">
                                        <h2>Refund Request For {{ $data['refund']->refundType() }}</h2>
                                        <p><strong>Property: </strong>{{ $data['refund']->title }}</p>
                                        <p><strong>Property ID: </strong>{{ $data['refund']->property_id }}</p>
                                        <p><strong>Property Owner: </strong>{{ $data['refund']->owner_name }}</p>
                                        <p><strong>Requested
                                                At:
                                            </strong>{{ date('M d, Y h:i a', strtotime($data['refund']->request_at)) }}
                                        </p>
                                        <p><strong>Purchase
                                                At:
                                            </strong>{{ date('M d, Y h:i a', strtotime($data['refund']->purchase_date)) }}
                                        </p>
                                        <p><strong>Refund Request Reason: </strong>{{ $data['refund']->request_reason }}
                                        </p>
                                        <p><strong>Comments: </strong>{{ $data['refund']->comment }}</p>
                                        <p><strong>Request
                                                Amount: </strong>BDT
                                            {{ number_format($data['refund']->request_amount, 2) }}
                                        </p>
                                        @if ($data['refund']->status == 2)
                                            <p><strong>Status: </strong>Approved</p>
                                            <p><strong>Note: </strong>{{ $data['refund']->admin_note }}</p>
                                        @else
                                            <hr>
                                            {!! Form::open([
                                                'route' => ['admin.refund_request.update', $data['refund']->id],
                                                'method' => 'post',
                                                'class' => 'form-horizontal',
                                                'files' => true,
                                                'novalidate',
                                            ]) !!}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="status"><strong>Status</strong></label>
                                                        <div class="controls">
                                                            {!! Form::select('status', [1 => 'Pending', 2 => 'Approved', 3 => 'Denied'], $data['refund']->status, [
                                                                'class' => 'form-control mb-1 select2',
                                                                'id' => 'status',
                                                                'data-validation-required-message' => 'This field is required',
                                                                'tabindex' => 1,
                                                            ]) !!}
                                                            {!! $errors->first('status', '<label class="help-block text-danger">:message</label>') !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="status"><strong>Note</strong></label>
                                                        <div class="controls">
                                                            {!! Form::textarea('note', $data['refund']->admin_note, ['class' => 'form-control mb-1', 'tabindex' => 2]) !!}
                                                            {!! $errors->first('status', '<label class="help-block text-danger">:message</label>') !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-lg-6">
                                                    <div class="form-group">
                                                        <a href="{{ route('admin.refund_request') }}">
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
