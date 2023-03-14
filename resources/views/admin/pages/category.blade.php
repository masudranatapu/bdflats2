@extends('admin.layouts.master')

@section('Pages', 'menu-open')
@section('pages-category', 'active')

@section('title') Pages Category @endsection
@section('page-name') Pages Category @endsection

@push('style')
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
@endpush

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            @lang('agent.breadcrumb_title')
        </a>
    </li>
    <li class="breadcrumb-item active">Pages Category</li>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Pages Category') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Pages Category') }}</li>
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
                                    {{ __('Category list') }}
                                    <a href="{{ route('admin.pages-category.create') }}"
                                        class="btn btn-success btn-sm float-right">
                                        Add New
                                    </a>
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row  mb-2">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-bordered alt-pagination" id="dtable">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Sl.</th>
                                                        <th>Category Name</th>
                                                        <th>Order ID</th>
                                                        <th>Property For</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (isset($data['categories']) && count($data['categories']))
                                                        @foreach ($data['categories'] as $key => $category)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $category->name }}</td>
                                                                <td class="font-weight-bold text-primary">
                                                                    {{ $category->order_id }}</td>
                                                                <td>{{ ucwords($category->property_for) }}</td>
                                                                @if ($category->is_active)
                                                                    <td class="text-success">Active</td>
                                                                @else
                                                                    <td class="text-danger">Inactive</td>
                                                                @endif
                                                                <td>
                                                                    <a href="{{ route('admin.pages-category.edit', $category->id) }}"
                                                                        class="btn btn-sm btn-warning">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.pages-category.delete', $category->id) }}"
                                                                        onclick="return confirm('Are you sure?')"
                                                                        class="btn btn-sm btn-danger">
                                                                        <i class="fa fa-trash"></i>
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
        </div>
    </div>
@endsection

@push('script')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
@endpush
