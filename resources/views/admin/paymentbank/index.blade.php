@extends('admin.layouts.master')

@section('settings_menu', 'menu-open')

@section('payment_acc', 'active')

@section('title')
    {{ __('Payment account') }}
@endsection

@section('page-name')
    {{ __('Payment account') }}
@endsection

@push('style')
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
@endpush

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Payment account') }}</li>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Payment account') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Payment account') }}</li>
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
                                    {{ __('Payment account list') }}
                                    <span class="float-right">
                                        <a href="{{ route('admin.payment_acc.create') }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-plus"></i>
                                            Create
                                        </a>
                                    </span>
                                </h5>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped cell-border alt-pagination table-sm" id="dtable">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Sl.') }}</th>
                                                <th>{{ __('Method') }}</th>
                                                <th>{{ __('Bank Name') }}</th>
                                                <th>{{ __('Account Name') }}</th>
                                                <th>{{ __('Account No') }}</th>
                                                <th>{{ __('Balance Actual') }}</th>
                                                <th class="text-center">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rows as $key => $row)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        {{ $row->method->name ?? '' }}
                                                    </td>
                                                    <td>{{ $row->bank_name }}</td>
                                                    <td>{{ $row->bank_acc_name }}</td>
                                                    <td>{{ $row->bank_acc_no }}</td>
                                                    <td class="text-right">
                                                        {{ number_format($row->balance_actual, 2) }}
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('admin.payment_acc.edit', ['id' => $row->id]) }}"
                                                            class="btn btn-info">
                                                            {{ __('Edit') }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach()
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
