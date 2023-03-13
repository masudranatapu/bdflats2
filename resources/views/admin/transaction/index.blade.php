@extends('admin.layouts.master')

@section('Payment', 'menu-open')
@section('transaction_list', 'active')

@section('title') Transaction @endsection
@section('page-name') Transaction @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Transaction</li>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endpush

@push('script')
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js') }}"></script>
@endpush

@section('content')
    @php
        $transaction_type = Config::get('static_array.transaction_type');
    @endphp
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Transaction') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Transaction') }}</li>
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
                                <h5 class="m-0">{{ __('Transaction') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    {!! Form::open(['route' => 'admin.transaction.index', 'method' => 'get']) !!}
                                        <div class="col-md-12">
                                            <div class="row form-group">
                                                <div class="col-md-2">
                                                    {!! Form::label('transaction_type', 'Transaction Type', ['class' => 'lable-title']) !!}
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="controls">
                                                        {!! Form::radio(
                                                            'transaction_type',
                                                            'all',
                                                            request()->query('transaction_type') == 'all' || null == request()->query('transaction_type'),
                                                            ['id' => 'all'],
                                                        ) !!}
                                                        {{ Form::label('all', 'All') }}
                                                        &emsp;
                                                        {!! Form::radio('transaction_type', 'listing_ad', request()->query('transaction_type') == 'listing_ad', [
                                                            'id' => 'listing_ad',
                                                        ]) !!}
                                                        {{ Form::label('listing_ad', 'Listing Ad') }}
                                                        &emsp;
                                                        {!! Form::radio('transaction_type', 'lead_purchase', request()->query('transaction_type') == 'lead_purchase', [
                                                            'id' => 'lead_purchase',
                                                        ]) !!}
                                                        {{ Form::label('lead_purchase', 'Lead Purchase') }}
                                                        &emsp;
                                                        {!! Form::radio('transaction_type', 'contact_view', request()->query('transaction_type') == 'contact_view', [
                                                            'id' => 'contact_view',
                                                        ]) !!}
                                                        {{ Form::label('contact_view', 'Contact View') }}
                                                        &emsp;
                                                        {!! Form::radio('transaction_type', 'recharge', request()->query('transaction_type') == 'recharge', [
                                                            'id' => 'recharge',
                                                        ]) !!}
                                                        {{ Form::label('recharge', 'Recharge') }}
                                                        &emsp;
                                                        {!! Form::radio('transaction_type', 'commission', request()->query('transaction_type') == 'commission', [
                                                            'id' => 'commission',
                                                        ]) !!}
                                                        {{ Form::label('commission', 'Commission') }}
                                                        &emsp;
                                                        {!! Form::radio('transaction_type', 'refund', request()->query('transaction_type') == 'refund', [
                                                            'id' => 'refund',
                                                        ]) !!}
                                                        {{ Form::label('refund', 'Refund') }}

                                                        {!! $errors->first('transaction_type', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group" style="align-items: center">
                                                <div class="col-md-2">Search by Date:</div>
                                                <div class="col-md-10">
                                                    <div class="row" style="align-items: center">
                                                        <div class="col-md-3">
                                                            {!! Form::date('from_date', request()->query->get('from_date'), ['class' => 'form-control']) !!}
                                                        </div>
                                                        <div class="col-md-1 text-center">
                                                            <p>To</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            {!! Form::date('to_date', request()->query->get('to_date'), ['class' => 'form-control']) !!}
                                                        </div>
                                                        <div class="col-md-3">
                                                            {!! Form::submit('Search', ['class' => 'btn btn-success']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered text-center">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>User ID</th>
                                                    <th>TID</th>
                                                    <th>Date</th>
                                                    <th>Transaction Type</th>
                                                    <th>Note</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (isset($data['rows']) && count($data['rows']))
                                                    @foreach ($data['rows'] as $key => $row)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $row->customer_no }}</td>
                                                            <td>{{ $row->code }}</td>
                                                            <td>{{ date('M d, Y', strtotime($row->transaction_date)) }}
                                                            </td>
                                                            <td>{{ $transaction_type[$row->transaction_type] ?? '' }}</td>
                                                            <td>{{ $row->payment_note ?? '' }}</td>
                                                            <td>{{ number_format($row->amount, 2) }}</td>
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
@endsection
