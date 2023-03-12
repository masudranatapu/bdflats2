@extends('admin.layout.master')

@push('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">


@endpush('custom_css')

@section('Product Management','open')
@section('add_product','active')

@section('title') @lang('product.product_search_result') @endsection

@section('page-name') @lang('product.product_search_result') @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('product.breadcrumb_title')  </a></li>
<li class="breadcrumb-item active">@lang('product.product_search_result')    </li>
@endsection
<?php
$categories_combo = $data['category_combo'] ?? [];
$vat_class_combo = $data['vat_class_combo'] ?? [];
$brand_combo = $data['brand_combo'] ?? [];

$roles = userRolePermissionArray();
$active_tab = request('tab') ?? 1;
$variant_id = request('variant_id') ?? null;
$type = request('type') ?? null;
$method_name = request()->route()->getActionMethod();



$shipping_method_combo = [
 'AIR' => 'AIR',
 'SEA' => 'SEA'
];

?>
@section('content')
<div class="content-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-sm" >
                <!--?php vError($errors) ?-->
                <div class="card-content">
                  <div class="card-body">
                  @include('admin.components._product_search_inner')
                </div>
                    
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@push('custom_js')
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>

@endpush
