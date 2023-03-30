@extends('admin.layouts.master')

@section('Product Management','open')
@section('city_list','active')

@section('title') City / Division @endsection
@section('page-name') City / Division @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">City / Division</li>
@endsection

@php

@endphp
@push('custom_css')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@push('custom_js')
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
                    <h1 class="m-0">{{ __(' City / Division') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __(' City / Division') }}</li>
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
                                {{ __(' City / Division list') }}
                                <span class="float-right">
                                    <a href="{{ route('admin.city.create') }}" class="btn btn-sm btn-primary">
                                        + Create
                                    </a>
                                </span>
                            </h5>
                        </div>

                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table
                                    class="table table-striped table-bordered text-center alt-pagination"
                                    id="indextable">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">SL.</th>
                                        <th class="" style="min-width: 100px;">City Name</th>
                                        <th class="" style="min-width: 100px;">Is Populated</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th class="" style="">Order</th>
                                        <th class="" style="">Status</th>
                                        <th class="" style="">Total Properties</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($data['cities']) && count($data['cities']))
                                        @foreach($data['cities'] as $key => $city)
                                            <tr>
                                                <td class="text-center"
                                                    style="width: 50px;">{{ $key + 1 }}</td>
                                                <td class="" style="">{{ $city->city_name }}</td>
                                                <td class="" style="">{{ $city->is_populated ? 'Populate' : 'Common' }}</td>
                                                <td>{{ $city->LAT ?? 'N/A' }}</td>
                                                <td>{{ $city->LON ?? 'N/A' }}</td>
                                                <td class="" style="">{{ $city->order_id }}</td>
                                                <td class="" style="">{{ $city->is_active ? 'Active' : 'Inactive' }}</td>
                                                <td class="" style="">{{ $city->total_listing }}</td>
                                                <td class="text-center" style="width: 200px;">

                                                        <a href="{{ route('admin.city.edit', [$city->id]) }}"
                                                           title="EDIT" class="btn btn-xs btn-info  mb-1">Edit</a>

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


@push('custom_js')

    <!--script only for brand page-->
    <script type="text/javascript" src="{{ asset('app-assets/pages/category.js')}}"></script>


@endpush('custom_js')
