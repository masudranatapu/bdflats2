@extends('admin.layouts.master')

@section('Property Owner','menu-open')
@section('owner_list','active')

@section('title') Property Owner Payment @endsection
@section('page-name') Property Owner Payment @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('invoice.breadcrumb_title')</a></li>
    <li class="breadcrumb-item active">Payment</li>
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
                                    <h3>Transaction</h3>
                                    <p><strong class="font-weight-bold">Payment Date: </strong>{{ $data['payment']->transaction_date }}</p>

                                    <p><strong class="font-weight-bold">Payment Type: </strong>
                                        @if( $data['payment']->transaction_type == '1')
                                        {{ $data['payment']->payment->payment_type == 1 ? 'Customer Payment' : 'Bonus Payment by BDFLAT' }}
                                        @elseif( $data['payment']->transaction_type == '2')
                                        Listing Payment
                                        @endif
                                    </p>
                                    <p><strong class="font-weight-bold">Customer Name: </strong>{{ $data['payment']->customer->name }}</p>
                                    @if( $data['payment']->transaction_type == '1')
                                    <p><strong class="font-weight-bold">Bank Name: </strong>{{ $data['payment']->payment->payment_bank_name }}</p>

                                    <p><strong class="font-weight-bold">Account Name: </strong>{{ $data['payment']->payment->payment_account_name }}</p>
                                    <p><strong class="font-weight-bold">Account No.: </strong>{{ $data['payment']->payment->payment_bank_acc_no }}</p>
                                    <p><strong class="font-weight-bold">Slip Number: </strong>{{ $data['payment']->payment->slip_number }}</p>
                                    <p><strong class="font-weight-bold">Attachment: </strong>@if($data['payment']->payment->attachment_path)<a href="{{ asset($data['payment']->payment->attachment_path) }}" target="_blank">Click to View</a>@else N/A @endif</p>
                                    <p><strong class="font-weight-bold">Note: </strong>{{ $data['payment']->payment->payment_note ?? 'N/A' }}</p>
                                    <p><strong class="font-weight-bold">Payment Status: </strong>{{ $data['payment']->payment->payment_confirmed_status == 1 ? 'Confirmed' : 'Pending' }}</p>
                                    @endif
                                    <p><strong class="font-weight-bold">Amount: </strong>{{ number_format($data['payment']->amount, 2) }}</p>
                                </div>
                                <div class="col-12">
                                    <a href="{{ route('admin.owner.payment', $data['payment']->f_customer_no) }}" class="btn btn-info">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





    <div class="modal fade text-left" id="recharge" tabindex="-1" role="dialog" aria-labelledby="category_amount"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="category_amount">Recharge Balance</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['method' => 'admin.owner.payment.update', 'class' => 'form-horizontal', 'files' => true , 'novalidate' , 'id' => 'subcat_add_edit_frm' ]) !!}
                <div class="modal-body p-5">
                    <div class="form-group {!! $errors->has('amount') ? 'error' : '' !!}">
                        <label>Amount<span class="text-danger">*</span></label>
                        <div class="controls">
                            {!! Form::number('amount', null, [ 'class' => 'form-control mb-1 subcat_amount', 'data-validation-required-message' => 'This field is required', 'placeholder' => '0.00', 'tabindex' => 1 ]) !!}
                            {!! $errors->first('amount', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                    </div>

                    <div class="form-group {!! $errors->has('amount') ? 'error' : '' !!}">
                        <label>Note<span class="text-danger">*</span></label>
                        <div class="controls">
                            {!! Form::textarea('note', null, [ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Type Note', 'tabindex' => 1 ]) !!}
                            {!! $errors->first('note', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success submit-btn" value="Save" title="Save">
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
