@extends('admin.layouts.master')

@section('settings_menu', 'menu-open')
@section('area_list', 'active')

@section('title') {{ __('Area') }} @endsection
@section('page-name') {{ __('Area') }} @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Area') }}</li>
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
                                            <i class="fa fa-plus"></i>
                                            Create
                                        </a>
                                    </span>
                                </h5>
                            </div>

                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped cell-border alt-pagination" id="dtable">
                                        <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Area Name</th>
                                                <th>Sub Area Name</th>
                                                <th>City Name</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Order</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($rows) && count($rows))
                                                @foreach ($rows as $key => $row)
                                                    <tr>
                                                        <td>
                                                            {{ $key + 1 }}
                                                        </td>
                                                        <td>{{ $row['area_name'] }}</td>
                                                        <td>{{ $row['sub_area_name'] }}</td>
                                                        <td>{{ $row['city_name'] }}</td>
                                                        <td>{{ $row['lat'] ?? 'N/A' }}</td>
                                                        <td>{{ $row['lon'] ?? 'N/A' }}</td>
                                                        <td>{{ $row['order_id'] }}</td>
                                                        <td style="width: 200px;">
                                                            <a href="{{ route('admin.area.edit', $row['id']) }}"
                                                                title="{{ __('EDIT') }}"
                                                                class="btn btn-xs btn-info mb-1">
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
