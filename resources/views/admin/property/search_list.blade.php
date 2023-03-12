@extends('admin.layout.master')
@push('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-tooltip.css')}}">
@endpush

@section('product_search_list','active')
@section('Product Management','open')

@section('title')
    @lang('product.list_page_title')
@endsection

@section('page-name')
    @lang('product.list_page_sub_title')
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('product.breadcrumb_title')</a></li>
    <li class="breadcrumb-item active">Product List</li>
@endsection

@php
    $roles = userRolePermissionArray()
@endphp

@section('content')
<div class="card min-height min-height">
    <div class="card-content card-success">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.components._product_search_inner')
                </div>
            </div>

        </section>
    </div>
</div>
</div>
@endsection

@push('custom_js')
<script src="{{ asset('app-assets/js/scripts/tooltip/tooltip.js')}}"></script>
@endpush
