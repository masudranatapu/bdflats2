@extends('admin.layouts.master')

@section('settings_menu','menu-open')
@section('payment_acc','active')


@section('title')
    Payment account
@endsection

@section('page-name')
    Payment account
@endsection

@push('style')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-tooltip.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">


@push('sript')
<!-- BEGIN: Data Table-->
<script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
<!-- END: Data Table-->
@endpush


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('payment.breadcrumb_title')</a></li>
    <li class="breadcrumb-item active">Payment account</li>
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
                                        + Create
                                    </a>
                                </span>
                            </h5>
                        </div>
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination table-sm" id="indextable">
                                    <thead>
                                        <tr>
                                            <th style="width: 40px;"  class="text-center">Sl.</th>
                                            <th>Method</th>
                                            <th  style="">Bank Name</th>
                                            <th  style="">Account Name</th>
                                            <th >Account No</th>
                                            <th>Balance Actual</th>
                                            <th style="width: 50px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rows as $key => $row)
                                            <tr>
                                                <td  class="text-center">{{ $key+1 }}</td>
                                                <td>
                                                    {{ $row->method->name ?? '' }}
                                                </td>
                                                <td>{{ $row->bank_name }}</td>
                                                <td>{{ $row->bank_acc_name }}</td>
                                                <td>{{ $row->bank_acc_no }}</td>
                                                <td class="text-right">
                                                    {{ number_format($row->balance_actual,2) }}
                                                </td>

                                                <td class="text-center">
                                                    <a href="{{ route('admin.payment_acc.edit',['id' => $row->id]) }}">Edit</a>
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


@push('sript')



@endpush('sript')
