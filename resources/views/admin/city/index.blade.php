@extends('admin.layouts.master')

@section('settings_menu', 'menu-open')
@section('city_list', 'active')

@section('title') {{ __('City / Division') }} @endsection
@section('page-name') {{ __('City / Division') }} @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('City / Division') }}</li>
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
                        <h1 class="m-0">{{ __('City / Division') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('City / Division') }}</li>
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
                                            <i class="fa fa-plus"></i>
                                            {{ __('Create') }}
                                        </a>
                                    </span>
                                </h5>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped cell-border text-center alt-pagination"
                                        id="dtable">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SL.') }}</th>
                                                <th>{{ __('City Name') }}</th>
                                                <th>{{ __('Is Populated') }}</th>
                                                <th>{{ __('Latitude') }}</th>
                                                <th>{{ __('Longitude') }}</th>
                                                <th>{{ __('Order') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Total Properties') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($data['cities']) && count($data['cities']))
                                                @foreach ($data['cities'] as $key => $city)
                                                    <tr>
                                                        <td>
                                                            {{ $key + 1 }}
                                                        </td>
                                                        <td>{{ $city->city_name }}</td>
                                                        <td>
                                                            {{ $city->is_populated ? 'Populate' : 'Common' }}
                                                        </td>
                                                        <td>{{ $city->LAT ?? 'N/A' }}</td>
                                                        <td>{{ $city->LON ?? 'N/A' }}</td>
                                                        <td>{{ $city->order_id }}</td>
                                                        <td>
                                                            {{ $city->is_active ? 'Active' : 'Inactive' }}
                                                        </td>
                                                        <td>{{ $city->total_listing }}</td>
                                                        <td style="width: 200px;">
                                                            <a href="{{ route('admin.city.edit', [$city->id]) }}"
                                                                title="{{ __('EDIT') }}" class="btn btn-xs btn-info  mb-1">
                                                                {{ __('Edit') }}
                                                            </a>
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
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dtable').DataTable({
                pageLength: 25,
            });
        });
    </script>
@endpush
