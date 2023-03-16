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
                                            <div class="col-md-12">
                                                {!! Form::label('transaction_type', 'Transaction Type', ['class' => 'lable-title']) !!}
                                            </div>
                                            <div class="col-md-12">
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
                                        <table class="table table-striped table-bordered text-center" id="dtable">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>User ID</th>
                                                    <th>TID</th>
                                                    <th>Date</th>
                                                    <th>Transaction Type</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let get_url = $('#base_url').val();

        $(document).ready(function() {
            var value = getCookie('transaction_list');

            if (value !== null) {
                var value = (value - 1) * 25;
                // table.fnPageChange(value,true);
            } else {
                var value = 0;
            }
            var table = callDatatable(value);

        });

        function callDatatable(value) {
            return $('#dtable').dataTable({
                processing: false,
                serverSide: true,
                paging: true,
                pageLength: 25,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                iDisplayStart: value,
                ajax: {
                    url: get_url + '/admin/transaction_list',
                    type: 'POST',
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.transaction_type = `{{ request()->query('transaction_type') }}`;
                        d.from_date = `{{ request()->query('from_date') }}`;
                        d.to_date = `{{ request()->query('to_date') }}`;

                    },

                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        searchable: false,
                        sortable: false,
                        className: 'text-center',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'c_code',
                        name: 'c_code',
                        className: 'text-center',
                        searchable: true
                    },
                    {
                        data: 'code',
                        name: 'code',
                        searchable: true
                    },
                    {
                        data: 'transaction_date',
                        name: 'transaction_date',
                        searchable: true,
                    },

                    {
                        data: 'transaction_type',
                        name: 'transaction_type',
                        searchable: true,
                    },
                    {
                        data: 'amount',
                        name: 'amount',
                        searchable: true,

                    },

                    {
                        data: 'action',
                        name: 'action',
                        className: 'text-center',
                        searchable: false
                    },

                ]
            });
        }

        let formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'BDT'
        });
    </script>

    <script>
        $(document).on('click', '.paginate_button', function() {
            let pageNum = $(this).text();
            setCookie('transaction_list', pageNum);
        });

        function setCookie(transaction_list, pageNum) {
            let today = new Date();
            let name = transaction_list;
            let elementValue = pageNum;
            let expiry = new Date(today.getTime() + 30 * 24 * 3600 * 1000); // plus 30 days

            document.cookie = name + "=" + elementValue + "; path=/; expires=" + expiry.toGMTString();
        }

        function getCookie(name) {
            let re = new RegExp(name + "=([^;]+)");
            let value = re.exec(document.cookie);
            return (value != null) ? unescape(value[1]) : null;
        }
    </script>


@endpush
