@extends('admin.layouts.master')

@section('Property Owner', 'open')

@section('owner_list', 'active')

@section('title')
    Property Owner Payments
@endsection

@section('page-name')
    Property Owner Payments
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('invoice.breadcrumb_title')</a></li>
    <li class="breadcrumb-item active">Payments </li>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('/custom/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endpush

@push('script')
    <!-- BEGIN: Data Table-->
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js') }}"></script>
    <!-- END: Data Table-->
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Owner Payment') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Owner Payment') }}</li>
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
                                <h5 class="m-0">{{ __('Owner Payment ') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row  mb-2">
                                    <div class="col-12">
                                        <div class="row mb-1">
                                            <div class="col-2">
                                                <p class="font-weight-bold">Balance</p>
                                                <h2 class="font-weight-bold text-success">BDT
                                                    {{ number_format($data['rows'][0]->customer->unused_topup ?? 0, 2) }}
                                                </h2>
                                            </div>
                                            <div class="col-2 offset-8 text-right" style="padding-top: 10px">
                                                <a href="{{ route('admin.owner.recharge', request()->route('id')) }}"
                                                    class="btn btn-success">Recharge Balance</a>
                                            </div>
                                        </div>
                                        <h3>Transaction History</h3>
                                        <div class="table-responsive ">
                                            <table class="table table-striped table-bordered table-sm text-center"
                                                {{-- id="process_data_table" --}}
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Tran. ID</th>
                                                        <th>Tran. Type</th>
                                                        <th>Date</th>
                                                        <th>Slip</th>
                                                        <th>Note</th>
                                                        <th>Amount</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (isset($data['rows']) && count($data['rows']))
                                                        @foreach ($data['rows'] as $key => $row)
                                                            <tr>
                                                                <td>
                                                                    <span>{{ $key + 1 }}</span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $row->code }}</span>
                                                                </td>
                                                                <td>
                                                                    @if ($row->transaction_type == '1')
                                                                        <span>{{ $row->payment->payment_type == 2 ? 'Bonus Payment' : 'Customer Payment' }}</span>
                                                                    @elseif($row->transaction_type == '2')
                                                                        <span> Listing Payment </span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <span>{{ $row->transaction_date }}</span>
                                                                </td>
                                                                <td>
                                                                    @if ($row->transaction_type == '1')
                                                                        <span>{{ $row->payment->slip_number }}</span>
                                                                    @endif
                                                                </td>

                                                                <td>
                                                                    @if ($row->transaction_type == '1')
                                                                        <span>{{ $row->payment->payment_note }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <span>{{ number_format($row->amount, 2) }}</span>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('admin.owner.payment.view', ['id' => $row->f_customer_no, 'pay_id' => $row->id]) }}"
                                                                        class="btn btn-info btn-sm">View</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
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
                {!! Form::open([
                    'method' => 'admin.owner.payment.update',
                    'class' => 'form-horizontal',
                    'files' => true,
                    'novalidate',
                    'id' => 'subcat_add_edit_frm',
                ]) !!}
                <div class="modal-body p-5">
                    <div class="form-group {!! $errors->has('amount') ? 'error' : '' !!}">
                        <label>Amount<span class="text-danger">*</span></label>
                        <div class="controls">
                            {!! Form::number('amount', null, [
                                'class' => 'form-control mb-1 subcat_amount',
                                'data-validation-required-message' => 'This field is required',
                                'placeholder' => '0.00',
                                'tabindex' => 1,
                            ]) !!}
                            {!! $errors->first('amount', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                    </div>

                    <div class="form-group {!! $errors->has('amount') ? 'error' : '' !!}">
                        <label>Note<span class="text-danger">*</span></label>
                        <div class="controls">
                            {!! Form::textarea('note', null, [
                                'class' => 'form-control mb-1',
                                'data-validation-required-message' => 'This field is required',
                                'placeholder' => 'Type Note',
                                'tabindex' => 1,
                            ]) !!}
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
