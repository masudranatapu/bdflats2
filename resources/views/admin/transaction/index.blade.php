@extends('admin.layouts.master')

@section('Payment', 'menu-open')
@section('transaction_list', 'active')

@section('title') Transaction @endsection
@section('page-name') Transaction @endsection

@push('style')
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
@endpush

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Transaction</li>
@endsection

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
                                        <table class="table table-striped table-bordered text-center" id="empTable">
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

@push('script')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#empTable').DataTable({
                processing: false,
                paging: true,
                pageLength: 25,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.transaction_list') }}",
                    type: 'GET',
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.transactionType = {{ request()->query('transaction_type') ?? 'null' }};
                        d.fromDate = {{ request()->query('from_date') ?? 'null' }};
                        d.toDate = {{ request()->query('to_date') ?? 'null' }};
                    }
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'user_id'
                    },
                    {
                        data: 'tid'
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: 'transaction_type'
                    },
                    {
                        data: 'note'
                    },
                    {
                        data: 'amount'
                    },
                ]
            });
        });
    </script>
@endpush
