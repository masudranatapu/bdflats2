@extends('admin.layouts.master')

@section('Property Seekers','menu-open')
@section('seeker_list','active')

@section('title') Property Seekers @endsection
@section('page-name') Property Seekers @endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-tooltip.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">@lang('customer.breadcrumb_title')</a></li>
    <li class="breadcrumb-item active">Property Seekers</li>
@endsection

@php

    $property_for_combo     = Config::get('static_array.property_for');
    $lead_status_combo      = Config::get('static_array.seeker_verification_status');
    $city_combo             = $data['city'] ?? [];
    $area_combo             = $data['area'] ?? [];
    $property_type_combo    = $data['property_type'] ?? [];

@endphp

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Property Seekers') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Property Seekers') }}</li>
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
                            <h5 class="m-0">{{ __('Property seekers list') }}</h5>
                            <span class="float-right">
                                <a href="{{ route('admin.seeker.index') }}" class="btn btn-sm btn-primary">All Seekers</a>
                            </span>
                        </div>
                        <div class="card-body">
                            <form action="" class="my-2">
                                <div class="row mb-1">
                                    <div class="col">
                                        <div class="form-group {!! $errors->has('property_for') ? 'error' : '' !!}">
                                            {!! Form::label('property_for', 'Property for') !!}
                                            <div class="controls">
                                                {!! Form::select('property_for', $property_for_combo, request()->query->get('property_for'), ['class'=>'form-control mb-1 ', 'placeholder' => 'Select property for', 'tabindex' => 6]) !!}
                                                {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group {!! $errors->has('lead_status') ? 'error' : '' !!}">
                                            {!! Form::label('lead_status', 'Lead status') !!}
                                            <div class="controls">
                                                {!! Form::select('lead_status', $lead_status_combo ?? [], request()->query->get('lead_status'), ['class'=>'form-control mb-1 ', 'placeholder' => 'Select lead status', 'tabindex' => 6]) !!}
                                                {!! $errors->first('lead_status', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group {!! $errors->has('city') ? 'error' : '' !!}">
                                            {!! Form::label('city', 'City') !!}
                                            <div class="controls">
                                                {!! Form::select('city', $city_combo, request()->query->get('city'), ['class'=>'form-control mb-1 ', 'placeholder' => 'Select city', 'tabindex' => 6, 'id' => 'city']) !!}
                                                {!! $errors->first('city', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group {!! $errors->has('area') ? 'error' : '' !!}">
                                            {!! Form::label('area', 'Area') !!}
                                            <div class="controls">
                                                {!! Form::select('area', $area_combo, request()->query->get('area'), ['class'=>'form-control mb-1 ', 'placeholder' => 'Select area', 'tabindex' => 6, 'id' => 'area']) !!}
                                                {!! $errors->first('area', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group {!! $errors->has('property_type') ? 'error' : '' !!}">
                                            {!! Form::label('property_type', 'Property type') !!}
                                            <div class="controls">
                                                {!! Form::select('property_type', $property_type_combo, request()->query->get('property_type'), ['class'=>'form-control mb-1 ', 'placeholder' => 'Select property type', 'tabindex' => 6, 'id' => 'property_type']) !!}
                                                {!! $errors->first('property_type', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <input type="submit" class="btn btn-info btn-sm px-2" value="Search" style="border-radius: 0px">
                                        <a class="btn btn-sm btn-primary text-white" href="{{ route('admin.seeker.index') }}" style="color: #FC611F;margin-left: 10px;">Reset</a>
                                    </div>
                                </div>

                            </form>
                            <div class="table-responsive ">
                                <table class="table table-striped table-bordered table-sm" id="dtable">
                                    <thead>
                                    <tr>
                                        <th class="text-center">SL</th>
                                        <th class="text-center">User ID</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Balance (BDT)</th>
                                        <th>Create Date</th>
                                        <th>Lead Status</th>
                                        <th>Lead Info</th>
                                        <th>Account Status</th>
                                        <th style="width: 17%" class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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

    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var get_url = $('#base_url').val();
        $(document).on('click', '#city', function(e){
            let id = $(this).val();
            if (id == '') {
                return false;
            }
            $("#area").empty();
           // $("#area").html('<optin value="">Select area</option>');
            $.ajax({
                type: 'get',
                url: get_url + '/admin/seeker/get_area/' + id,
                async: true,
                dataType: 'json',
                beforeSend: function () {
                    $("body").css("cursor", "progress");
                },
                success: function (response) {
                    var option1 = new Option('Select area', '');
                    $("#area").append(option1);
                    $.each(response.html, function (key, value) {
                        var option = new Option(value, key);
                        $("#area").append(option);
                    });
                },
                complete: function (data) {
                    $("body").css("cursor", "default");

                }
            });
        })


        $(document).ready(function () {
            var value = getCookie('seeker_list');

            if (value !== null) {
                var value = (value - 1) * 25;
                // table.fnPageChange(value,true);
            } else {
                var value = 0;
            }
            var table = callDatatable(value);

        });

        function callDatatable(value) {
            var table =
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
                        url: get_url + '/admin/seeker_list',
                        type: 'POST',
                        data: function (d) {
                            d._token = "{{ csrf_token() }}";
                            d.property_for = {!! request()->query('property_for') ? '"' . request()->query('property_for') . '"' : 'null' !!};
                            d.lead_status = {{ request()->query('lead_status') ?? 'null' }};
                            d.city = {{ request()->query('city') ?? 'null' }};
                            d.area = {{ request()->query('area') ?? 'null' }};
                            d.property_type = {{ request()->query('property_type') ?? 'null' }};
                        }
                    },
                    columns: [
                        {
                            data: 'id',
                            name: 'id',
                            searchable: false,
                            sortable: false,
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },

                        {
                            data: 'code',
                            name: 'code',
                            searchable: true,
                            className: 'text-center',
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
                            data: 'unused_topup',
                            name: 'unused_topup',
                            searchable: false,
                            className: 'text-right',
                            render: function (data, type, row, meta) {
                                return formatter.format(data);
                            }
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            searchable: false,

                        },

                        {
                            data: 'leadStatus',
                            name: 'leadStatus',
                            searchable: false,
                            className: 'text-center'

                        },
                        {
                            data: 'leadInfo',
                            name: 'leadInfo',
                            searchable: false,
                            className: 'text-left'

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
                            searchable: false,
                            className: 'text-center'
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
        $(document).on('click', '.page-link', function () {
            var pageNum = $(this).text();
            setCookie('seeker_list', pageNum);
        });

        function setCookie(seeker_list, pageNum) {
            var today = new Date();
            var name = seeker_list;
            var elementValue = pageNum;
            var expiry = new Date(today.getTime() + 30 * 24 * 3600 * 1000); // plus 30 days

            document.cookie = name + "=" + elementValue + "; path=/; expires=" + expiry.toGMTString();
        }

        function getCookie(name) {
            var re = new RegExp(name + "=([^;]+)");
            var value = re.exec(document.cookie);
            return (value != null) ? unescape(value[1]) : null;
        }
    </script>
@endpush


