@extends('admin.layouts.master')

@section('settings_menu','menu-open')
@section('propertyfloor','active')

@section('title') Floor List @endsection
@section('page-name') Floor List @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Floor List</li>
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
                    <h1 class="m-0">{{ __('Floor List') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Floor List') }}</li>
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
                                {{ __('Floor List list') }}
                                <span class="float-right">
                                    <a href="{{ route('admin.propertyfloor.create') }}" class="btn btn-sm btn-primary">
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
                                        <th class="" style="min-width: 100px;">Name</th>
                                        <th class="" style="">Order</th>
                                        <th class="" style="">Status</th>
                                        <th class="text-center" style="width: 200px;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($data['floors']) && count($data['floors']))
                                        @foreach($data['floors'] as $key => $floors)
                                            <tr>
                                                <td class="text-center"
                                                    style="width: 50px;">{{ $key + 1 }}</td>
                                                <td class="" style="">{{ $floors->name }}</td>
                                                <td class="" style="">{{ $floors->order_id }}</td>
                                                @if($floors->is_active)
                                                    <td class="text-success">Active</td>
                                                @else
                                                    <td class="text-danger">Inactive</td>
                                                @endif
                                                <td class="text-center" style="width: 200px;">

                                                    <a href="{{ route('admin.propertyfloor.edit', [$floors->id]) }}"
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
