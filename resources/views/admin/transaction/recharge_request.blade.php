@extends('admin.layouts.master')

@section('Payment', 'menu-open')
@section('recharge_request', 'active')

@section('title') Recharge Request @endsection
@section('page-name') Recharge Request @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Recharge Request</li>
@endsection

@push('style')
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
@endpush

@push('script')

@endpush

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Recharge Request') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Recharge Request') }}</li>
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
                                <h5 class="m-0">{{ __('Recharge Request') }}</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-block mb-1">
                                            <div class="controls">
                                                {!! Form::radio('type', 'all', !request()->query('filter'), ['id' => 'all', 'class' => 'type']) !!}
                                                {{ Form::label('all', 'All') }}
                                                &emsp;
                                                {!! Form::radio('type', '3', request()->query('filter') == '3', ['id' => 'pending', 'class' => 'type']) !!}
                                                {{ Form::label('pending', 'Pending') }}
                                                &emsp;
                                                {!! Form::radio('type', '1', request()->query('filter') == '1', ['id' => 'approved', 'class' => 'type']) !!}
                                                {{ Form::label('approved', 'Approved') }}
                                                &emsp;
                                                {!! Form::radio('type', '2', request()->query('filter') == '2', ['id' => 'rejected', 'class' => 'type']) !!}
                                                {{ Form::label('rejected', 'Rejected') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <table class="table table-striped table-bordered text-center" id="dtable">
                                            <thead>
                                                <tr>
                                                    <th>USER ID</th>
                                                    <th>Date</th>
                                                    <th>Property owner/seeker Name</th>
                                                    <th>Property owner/seeker No.</th>
                                                    <th>Note</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
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
        $('.type').click(function() {
            let type = $(this).val();
            let url = '{{ route('admin.recharge_request.list') }}'

            if (type !== 'all') {
                url += '?filter=' + type;
            }
            window.location = url;
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let get_url = $('#base_url').val();


        $(document).ready(function() {
            let value = getCookie('recharge_request');

            if (value !== null) {
                let value = (value - 1) * 25;
                // table.fnPageChange(value,true);
            } else {
                let value = 0;
            }
            let table = callDatatable(value);

        });

        function callDatatable(value) {
            let table =
                $('#dtable').dataTable({
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
                        url: '{{ route('admin.recharge_request.list') }}',
                        type: 'POST',
                        data: function(d) {
                            d._token = "{{ csrf_token() }}";
                            d.filter = {{ request()->query('filter') ?? 'null' }};
                        }
                    },
                    columns: [{
                            data: 'c_code',
                            name: 'c_code',
                            searchable: true
                        },

                        {
                            data: 'payment_date',
                            name: 'payment_date',
                            className: 'text-center',
                            searchable: true
                        },
                        {
                            data: 'c_name',
                            name: 'c_name',
                            searchable: true
                        },
                        {
                            data: 'c_mobile_no',
                            name: 'c_mobile_no',
                            searchable: true
                        },
                        {
                            data: 'payment_note',
                            name: 'payment_note',
                            searchable: true,
                        },
                        {
                            data: 'amount',
                            name: 'amount',
                            searchable: true,
                        },
                        {
                            data: 'status',
                            name: 'status',
                            searchable: true,
                            className: 'text-center'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            className: 'text-center',
                            searchable: false
                        },

                    ]
                });
            return table;
        }

        let formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'BDT'
        });
    </script>

    <script>
        $(document).on('click', '.page-link', function() {
            let pageNum = $(this).text();
            setCookie('owner_list', pageNum);
        });

        function setCookie(owner_list, pageNum) {
            let today = new Date();
            let name = owner_list;
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
