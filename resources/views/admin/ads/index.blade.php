@extends('admin.layouts.master')

@section('Web Ads','menu-open')
@section('ads_list','active')

@section('title') Ads @endsection
@section('page-name') Ads @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Ads</li>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/custom/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
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
                    <h1 class="m-0">{{ __('Ad') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Ad') }}</li>
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
                            <h5 class="m-0">{{ __('Ad list') }}</h5>
                            <span class="float-right">
                                <a href="{{ route('admin.ads') }}" class="btn btn-sm btn-primary">All Ads</a>
                                <a href="{{ route('admin.ads.create') }}" class="btn btn-sm btn-primary">+ Create
                                </a>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="row  mb-2">
                                <div class="col-12">

                                    <div class="table-responsive ">
                                        <table class="table table-striped table-bordered table-sm text-center" >
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Position</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Photo Count</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($data['rows']) && count($data['rows']) > 0 )
                                                    @foreach( $data['rows'] as $key => $row )
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td class="text-left">{{ $row->position->name ?? '' }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($row->available_from)) }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($row->available_to)) }}</td>
                                                            <td>{{ $row->images->count() }}</td>
                                                            <td>{{ $row->status ? 'Published' : 'Pending' }}</td>
                                                            <td>

                                                                @if (Auth::user()->can('admin.ads-image'))
                                                                    <a class="btn btn-sm btn-success text-white"
                                                                       href="{{ route('admin.ads-image', $row->id) }}"
                                                                       title="Images">
                                                                        Images
                                                                    </a>
                                                                @endif
                                                                @if (Auth::user()->can('admin.ads.edit'))
                                                                    <a class="btn btn-sm btn-warning text-white"
                                                                       href="{{ route('admin.ads.edit', $row->id) }}"
                                                                       title="Edit">
                                                                       Edit
                                                                    </a>
                                                                @endif

                                                                @if (Auth::user()->can('admin.ads.delete'))
                                                                <a class="btn btn-sm btn-danger text-white"
                                                                   href="{{ route('admin.ads.delete', $row->id) }}"
                                                                   title="Delete">
                                                                   Delete
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
