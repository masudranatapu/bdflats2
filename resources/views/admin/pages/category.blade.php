@extends('admin.layout.master')

@section('pages-category','active')

@section('title') Pages Category @endsection
@section('page-name') Pages Category @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Pages Category</li>
@endsection

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/custom/css/custom.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@push('custom_js')

    <!-- BEGIN: Data Table-->
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
    <!-- END: Data Table-->
@endpush

@php
    $roles = userRolePermissionArray()
@endphp

@section('content')
    <div class="content-body min-height">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-success">
                    <div class="card-content">
                        <div class="card-header">
                            <a href="{{ route('admin.pages-category.create') }}" class="text-warning font-weight-bold"><i class="fa fa-plus"></i> Add New</a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row  mb-2">

                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-bordered alt-pagination">
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
                                            @if(isset($data['categories']) && count($data['categories']))
                                                @foreach($data['categories'] as $key => $category)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $category->NAME }}</td>
                                                        <td class="font-weight-bold text-primary">{{ $category->ORDER_ID }}</td>
                                                        <td>{{ ucwords($category->PROPERTY_FOR) }}</td>
                                                        @if($category->IS_ACTIVE)
                                                            <td class="text-success">Active</td>
                                                        @else
                                                            <td class="text-danger">Inactive</td>
                                                        @endif
                                                        <td>
                                                            @if(hasAccessAbility('edit_pages_category', $roles))
                                                                <a href="{{ route('admin.pages-category.edit', $category->PK_NO) }}"
                                                                   class="btn btn-sm btn-warning">
                                                                    <i class="la la-pencil"></i>
                                                                </a>
                                                            @endif
                                                            @if(hasAccessAbility('delete_pages_category', $roles))
                                                                <a href="{{ route('admin.pages-category.delete', $category->PK_NO) }}"
                                                                   onclick="return confirm('Are you sure?')"
                                                                   class="btn btn-sm btn-danger">
                                                                    <i class="la la-trash"></i>
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
@endsection
