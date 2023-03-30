@extends('admin.layouts.master')


@section('Web Ads', 'menu-open')

@section('ads_position', 'active')

@section('title') Ads Position @endsection
@section('page-name') Ads Position @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Ads Position</li>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('/custom/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endpush

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Ads Position') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Ads Position') }}</li>
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
                                    {{ __('Ads Position list') }}
                                    <span class="float-right">
                                        <a href="{{ route('admin.ads_position.create') }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-plus"></i>
                                            Create
                                        </a>
                                    </span>
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row  mb-2">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-sm text-center">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Name</th>
                                                        <th>Position ID</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (isset($data['rows']) && count($data['rows']) > 0)
                                                        @foreach ($data['rows'] as $key => $row)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td class="text-left">{{ $row->name ?? '' }}</td>
                                                                <td>{{ $row->position_id }}</td>
                                                                <td>{{ $row->is_active ? 'Active' : 'In active' }}</td>
                                                                <td>
                                                                    @if (Auth::user()->can('admin.ads_position.edit'))
                                                                        <a class="btn btn-sm btn-warning text-white"
                                                                            href="{{ route('admin.ads_position.edit', $row->id) }}"
                                                                            title="Edit" >
                                                                            Edit
                                                                        </a>
                                                                    @endif
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
@endsection

@push('script')
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js') }}"></script>
    <!-- END: Data Table-->
@endpush
