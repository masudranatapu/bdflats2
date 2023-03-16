@extends('admin.layouts.master')

@section('Property Owner', 'menu-open')
@section('owner_list', 'active')

@section('title')
    Property Owner
@endsection
@section('page-name')
    Property Owner
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            @lang('invoice.breadcrumb_title')
        </a>
    </li>
    <li class="breadcrumb-item active">
        Property Owner
    </li>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-tooltip.css') }}">
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
    @php
        $user_type = Config::get('static_array.user_type');
        $user_status = Config::get('static_array.user_status');
    @endphp
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
                        @if (session()->has('flashMessageSuccess'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-times" style="color: white;"></i>
                                </button>
                                {{ session()->get('flashMessageSuccess') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-sm">
                            <div class="card-header">
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <a href="{{ route('admin.owner.index', ['owner' => 2]) }}"
                                            class="btn btn-info btn-sm">Owner</a>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <a href="{{ route('admin.owner.index', ['owner' => 3]) }}"
                                            class="btn btn-info btn-sm">Builder</a>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <a href="{{ route('admin.owner.index', ['owner' => 4]) }}"
                                            class="btn btn-info btn-sm">Agency</a>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <a href="{{ route('admin.owner.index') }}" class="btn btn-info btn-sm">All</a>
                                    </div>
                                </div>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive ">
                                        <table class="table table-striped table-bordered table-sm" id="dtable">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">SL</th>
                                                    <th class="text-center">User ID</th>
                                                    <th>Create Date</th>
                                                    <th>User Type</th>
                                                    <th>Name</th>
                                                    <th>Mobile</th>
                                                    <th>Email</th>
                                                    <th>Is Feature</th>
                                                    <th>Balance</th>
                                                    <th>Properties</th>
                                                    <th>Status</th>
                                                    <th style="width: 17%" class="text-center">Action</th>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let get_url = $('#base_url').val();

        $(document).ready(function() {
            let value = getCookie('owner_list');

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
                        url: get_url + '/admin/owner_list',
                        type: 'POST',
                        data: function(d) {
                            d._token = "{{ csrf_token() }}";
                            d.owner = {{ request()->query('owner') ?? 'null' }};
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
                            data: 'user_type',
                            name: 'user_type',
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
                            data: 'unused_topup',
                            name: 'unused_topup',
                            searchable: false,
                            className: 'text-right',
                            render: function(data) {
                                return formatter.format(data);
                            }
                        },

                        {
                            data: 'total_listing',
                            name: 'total_listing',
                            className: 'text-center',
                            searchable: true
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
