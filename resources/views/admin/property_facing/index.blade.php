@extends('admin.layouts.master')

@section('settings_menu', 'menu-open')
@section('propertyfacing', 'active')

@section('title') {{ __('Property Facing') }} @endsection
@section('page-name') {{ __('Property Facing') }} @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Property Facing') }}</li>
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
                        <h1 class="m-0">{{ __('Property Facing') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Property Facing') }}</li>
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
                                    {{ __('Property Facing list') }}
                                    <span class="float-right">
                                        <a href="{{ route('admin.propertyfacing.create') }}"
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
                                                <th class="text-center" style="width: 50px;">SL.</th>
                                                <th class="" style="min-width: 100px;">Facing</th>
                                                <th class="" style="">Order</th>
                                                <th class="" style="">Status</th>
                                                <th class="text-center" style="width: 200px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($data['facings']) && count($data['facings']))
                                                @foreach ($data['facings'] as $key => $row)
                                                    <tr>
                                                        <td class="text-center" style="width: 50px;">{{ $key + 1 }}
                                                        </td>
                                                        <td class="" style="">{{ $row->title }}</td>
                                                        <td class="" style="">{{ $row->order_id }}</td>
                                                        @if ($row->is_active)
                                                            <td class="text-success">Active</td>
                                                        @else
                                                            <td class="text-danger">Inactive</td>
                                                        @endif
                                                        <td class="text-center" style="width: 200px;">

                                                            <a href="{{ route('admin.propertyfacing.edit', [$row->id]) }}"
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
