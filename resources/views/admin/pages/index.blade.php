@extends('admin.layouts.master')

@section('Pages','menu-open')
@section('pages_index','active')

@section('title') Pages @endsection
@section('page-name') Pages @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Pages</li>
@endsection

@push('style')

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@push('script')

    <!-- BEGIN: Data Table-->
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
    <!-- END: Data Table-->
@endpush

@php

@endphp

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Pages') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Pages') }}</li>
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
                            <h5 class="m-0">{{ __('Pages list') }}</h5>
                            <span class="float-right">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-primary">All Users</a>
                                <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary">+ Create
                                    Role</a>
                            </span>
                        </div>

                        <div class="card-body">
                            <div class="row  mb-2">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-bordered alt-pagination">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Page Title</th>
                                                <th>Page URL</th>
                                                <th>Order</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($data['pages']) && count($data['pages']))
                                                @foreach($data['pages'] as $key => $page)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $page->title }}</td>
                                                        <td>{{ $page->url_slug }}</td>
                                                        <td class="font-weight-bold text-primary">{{ $page->order_id }}</td>
                                                        @if($page->is_active)
                                                            <td class="text-success">Active</td>
                                                        @else
                                                            <td class="text-danger">Inactive</td>
                                                        @endif
                                                        <td>

                                                            @if (Auth::user()->can('admin.pages.edit'))
                                                                <a href="{{ route('admin.pages.edit', $page->id) }}"
                                                                   class="btn btn-sm btn-warning">
                                                                    Edit
                                                                </a>
                                                            @endif
                                                            @if (Auth::user()->can('admin.pages.delete'))
                                                                <a href="{{ route('admin.pages.delete', $page->id) }}"
                                                                   onclick="return confirm('Are you sure?')"
                                                                   class="btn btn-sm btn-danger">
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
