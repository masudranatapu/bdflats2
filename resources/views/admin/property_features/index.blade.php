@extends('admin.layouts.master')

@section('settings_menu', 'menu-open')

@section('propertyfeatures', 'active')

@section('title') {{ __('Property Features') }} @endsection
@section('page-name') {{ __('Property Features') }} @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Property Features') }}</li>
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
                        <h1 class="m-0">{{ __('Property Features') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Property Features') }}</li>
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
                                    {{ __('Property Features list') }}
                                    <span class="float-right">
                                        <a href="{{ route('admin.propertyfeatures.create') }}"
                                            class="btn btn-sm btn-primary">
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
                                                <th >{{ __('Feature') }}</th>
                                                <th>{{ __('Order') }}</th>
                                                <th>{{ __('ICON') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($data['features']) && count($data['features']))
                                                @foreach ($data['features'] as $key => $features)
                                                    <tr>
                                                        <td>{{ $key + 1 }} </td>
                                                        <td>{{ $features->title }}</td>
                                                        <td>{{ $features->order_id }}</td>
                                                        <td>
                                                            <img src="{{ asset($features->icon) }}" alt="icon" width="50">
                                                        </td>
                                                        <td>
                                                            @if ($features->is_active)
                                                                <span class="text-success"> {{ __('Active') }}</span>
                                                            @else
                                                                <span class="text-danger">{{ __('Inactive') }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.propertyfeatures.edit', [$features->id]) }}"
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
@endpush('script')
