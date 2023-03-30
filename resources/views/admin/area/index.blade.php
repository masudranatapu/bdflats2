@extends('admin.layouts.master')

@section('settings_menu','menu-open')
@section('area_list','active')

@section('title') Area @endsection
@section('page-name') Area @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Area</li>
@endsection

@php

@endphp
@push('style')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
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
                    <h1 class="m-0">{{ __('Area') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Area') }}</li>
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
                                {{ __('Area list') }}
                                <span class="float-right">
                                    <a href="{{ route('admin.area.create') }}" class="btn btn-sm btn-primary">
                                        + Create Role
                                    </a>
                                </span>
                            </h5>
                        </div>

                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table
                                    class="table table-striped table-bordered alt-pagination"
                                    id="indextable">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">SL.</th>
                                        <th class="" style="min-width: 100px;">Area Name</th>
                                        <th class="" style="min-width: 100px;">Sub Area Name</th>
                                        <th class="" style="min-width: 100px;">City Name</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th class="" style="">Order</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($rows) && count($rows))
                                        @foreach($rows as $key => $row)
                                            <tr>
                                                <td class="text-center"
                                                    style="width: 50px;">{{ $key + 1 }}</td>
                                                <td class="" style="">{{ $row['area_name'] }}</td>
                                                <td class="" style="">{{ $row['sub_area_name'] }}</td>
                                                <td class="" style="">{{ $row['city_name'] }}</td>
                                                <td>{{ $row['lat'] ?? 'N/A' }}</td>
                                                <td>{{ $row['lon'] ?? 'N/A' }}</td>
                                                <td class="" style="">{{ $row['order_id'] }}</td>
                                                <td class="text-center" style="width: 200px;">

                                                <a href="{{ route('admin.area.edit', $row['id'] ) }}" title="EDIT" class="btn btn-xs btn-info  mb-1">Edit</a>

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
@endsection


@push('script')

    <!--script only for brand page-->
    <script type="text/javascript" src="{{ asset('app-assets/pages/category.js')}}"></script>


@endpush('script')
