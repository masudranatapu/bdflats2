@extends('admin.layouts.master')

@section('BDFLAT_Agents', 'menu-open')

@section('agent_list', 'active')

@section('title')
    @lang('agent.list_page_title')
@endsection

@section('page-name')
    @lang('agent.list_page_sub_title')
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            @lang('agent.breadcrumb_title')
        </a>
    </li>
    <li class="breadcrumb-item active">
        @lang('agent.breadcrumb_sub_title')
    </li>
@endsection

@push('style')
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Agents List') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Agents List') }}</li>
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
                                    {{ __('Agents List') }}
                                    <span class="float-right">
                                        <a href="{{ route('admin.agents.create') }}" class="text-warning font-weight-bold">
                                            <i class="fa fa-plus"></i>
                                            Add  New
                                        </a>
                                    </span>
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row  mb-2">
                                    <div class="col-12">
                                        <div class="table-responsive ">
                                            <table id="dtable"
                                                class="table table-striped table-bordered table-sm text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Sl</th>
                                                        <th>ID</th>
                                                        <th>Create Date</th>
                                                        <th>Agent Name</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Is Feature</th>
                                                        <th>Properties</th>
                                                        <th>Earning</th>
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
    </div>
@endsection

@push('script')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let get_url = $('#base_url').val();

        $(document).ready(function() {
            let value = getCookie('agents_list');

            if (value !== null) {
                let value = (value - 1) * 25;
                // table.fnPageChange(value,true);
            } else {
                let value = 0;
            }
            let table = callDatatable(value);

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
                    url: get_url + '/admin/agents_list',
                    type: 'POST',
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                    }
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
                        data: 'code',
                        name: 'code',
                        className: 'text-center',
                        searchable: true
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        searchable: true
                    },
                    {
                        data: 'name',
                        name: 'name',
                        searchable: true,
                    },
                    {
                        data: 'mobile_no',
                        name: 'mobile_no',
                        searchable: true,
                    },
                    {
                        data: 'email',
                        name: 'email',
                        searchable: true,
                    },
                    {
                        data: 'is_feature',
                        name: 'is_feature',
                        searchable: true,
                        render: function(data) {
                            return data === 1 ? 'Feature' : 'General';
                        }
                    },
                    {
                        data: 'total_listing',
                        name: 'total_listing',
                        className: 'text-center',
                        searchable: true
                    },
                    {
                        data: 'unused_topup',
                        name: 'unused_topup',
                        searchable: false,
                        className: 'text-right',
                        render: function(data) {
                            return formatter.format(data);
                        }
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
        }

        let formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'BDT'
        });
    </script>

    <script>
        $(document).on('click', '.page-link', function() {
            let pageNum = $(this).text();
            setCookie('agents_list', pageNum);
        });

        function setCookie(agents_list, pageNum) {
            let today = new Date();
            let name = agents_list;
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
