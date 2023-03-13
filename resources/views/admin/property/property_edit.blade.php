@extends('admin.layouts.master')

@section('Property Management', 'menu-open')
@section('property_list', 'active')

@section('title')
    Property Edit
@endsection
@section('page-name')
    Property Edit
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/forms/validation/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/forms/datepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/image_upload/image-uploader.min.css') }}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,700|Montserrat:300,400,500,600,700|Source+Code+Pro&display=swap">
    <style>
        .show_img {
            height: 82px;
            width: 82px;
            object-fit: cover
        }

        .del_img {
            background: #bbb;
            padding: 2px 7px;
            border-radius: 77px;
            font-weight: 700;
            color: #000;
            position: absolute;
            top: 5px;
            right: 20px
        }

        .del_btn {
            border-radius: 75%;
            height: 26px;
            width: 26px;
            position: absolute;
            right: -8px;
            top: 8px
        }

        .select2 {
            width: 100% !important
        }

        a.ui-state-default {
            background-color: red !important
        }

        .ctm {
            min-width: 140px;
            display: inline-block;
        }
    </style>
@endpush

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">@lang('admin_action.breadcrumb_title')</a></li>
    <li class="breadcrumb-item active">Property Edit</li>
@endsection

@section('content')
    @php
        $data = $data ?? [];
        $product = $product ?? [];
        $property_types = $data['property_type'] ?? [];
        $cities = $data['city'] ?? [];

        $area = $data['area'] ?? [];
        $property_conditions = $data['property_condition'] ?? [];
        $listing_variants = $data['listing_variants'] ?? [];
        $floor_lists = $data['floor_list'] ?? [];
        $property_facing = $data['property_facing'] ?? [];
        $property_additional_info = $data['property_additional_info'] ?? [];
        $listing_features = $data['listing_feature'] ?? [];
        $nearby = $data['near_by'] ?? [];
        $property_listing_types = $data['property_listing_type'] ?? [];
        $property_listing_images = $data['property_listing_images'] ?? [];
        $features = json_decode($property_additional_info->F_FEATURE_NOS) ?? [];
        $near = json_decode($property_additional_info->F_NEARBY_NOS) ?? [];

        $bed_room = Config::get('static_array.bed_room') ?? [];
        $bath_room = Config::get('static_array.bath_room') ?? [];
        $user_type = Config::get('static_array.user_type') ?? [];
        $property_status = Config::get('static_array.property_status') ?? [];
        $payment_status = Config::get('static_array.payment_status') ?? [];
        $tabIndex = 0;

        $property_price = 0;
        if ($product->PROPERTY_FOR == 'roommate') {
            $property_price = $product->ROOMMAT_PRICE;
        } elseif ($product->PROPERTY_FOR == 'sale') {
            $property_price = $product->SELL_PRICE;
        } elseif ($product->PROPERTY_FOR == 'rent') {
            $property_price = $product->RENT_PRICE;
        }

        $WEB_PATH = env('WEB_PATH');
        $PANEL_PATH = env('PANEL_PATH');

    @endphp

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Property Edit') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Property Edit') }}</li>
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
                                <h5 class="m-0">{{ __('Property Edit') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="saleform-wrapper mt-2">
                                    <div class="container">

                                        {!! Form::open([
                                            'route' => ['admin.property.update', $product->id],
                                            'method' => 'post',
                                            'files' => true,
                                            'novalidate',
                                            'autocomplete' => 'off',
                                        ]) !!}

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-title mb-2">
                                                    <h3>Basic Information</h3>
                                                </div>
                                                <div class="saleform-header mb-2">
                                                    <p><span class="ctm">Property ID </span>: {{ $product->code }}</p>
                                                    <p><span class="ctm">Create Date </span>:
                                                        {{ date('M d, Y', strtotime($product->created_at)) }}</p>
                                                    <p><span class="ctm">Modified On </span>:
                                                        {{ date('M d, Y', strtotime($product->modified_at)) }}</p>
                                                    <p><span class="ctm">Owner Name </span>:
                                                        {{ $product->getUser->name }}</p>
                                                    <p><span class="ctm">Owner Type </span>:
                                                        {{ $user_type[$product->user_type] ?? '' }}</p>
                                                    @if ($product->getUser->user_type != 5)
                                                        <p><span class="ctm">Payment Status </span>:
                                                            {{ $payment_status[$product->payment_status] ?? '' }}</p>
                                                        <p><span class="ctm">Expire Date </span>: @if ($product->expaired_at)
                                                                {{ date('d-m-Y', strtotime($product->expaired_at)) }}
                                                            @else
                                                                Not set yet
                                                            @endif
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Billing information</h3>
                                                </div>
                                                @if ($product->getUser->user_type != 5)
                                                    <div class="form-group">
                                                        <div class="billing-amounot">
                                                            <h5>Billing amount: {{ number_format($property_price, 2) }} TK
                                                            </h5>
                                                        </div>
                                                        @if ($product->payment_status == 0)
                                                            <input type="radio" checked="" name="billing"
                                                                value="pending" id="pending"
                                                                tabindex="{{ ++$tabIndex }}">
                                                            <label for="pending">Due</label>
                                                            @if ($product->getUser->unused_topup < $property_price)
                                                                <a data-toggle="tooltip" data-placement="right"
                                                                    title="Click here for payment entry"
                                                                    href="{{ route('admin.owner.recharge', $product->f_user_no) }}">Balance
                                                                    not avaiable, Pay first</a>
                                                            @else
                                                                <input type="radio" tabindex="{{ ++$tabIndex }}"
                                                                    name="billing" value="paid" id="paid">
                                                                <label for="paid">Paid</label>
                                                            @endif
                                                        @endif
                                                    </div>
                                                @endif
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" name="is_verified"
                                                            {{ $product->is_verified ? 'checked' : '' }}
                                                            tabindex="{{ ++$tabIndex }}" class="custom-control-input"
                                                            id="customSwitch1">
                                                        <label class="custom-control-label" for="customSwitch1">Verified
                                                            BDF</label>
                                                    </div>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" name="ci_payment"
                                                            {{ $product->ci_payment ? 'checked' : '' }}
                                                            tabindex="{{ ++$tabIndex }}" class="custom-control-input"
                                                            id="customSwitch2">
                                                        <label class="custom-control-label" for="customSwitch2">Need
                                                            payment to view</label>
                                                    </div>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" name="auto_payment_renew"
                                                            {{ $product->payment_auto_renew ? 'checked' : '' }}
                                                            tabindex="{{ ++$tabIndex }}" class="custom-control-input"
                                                            id="customSwitch3">
                                                        <label class="custom-control-label" for="customSwitch3">Payment
                                                            Auto Renew</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr><br>

                                        <div class="row">
                                            <!-- Advertisment Type -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('alert') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        <label class="label-title">Advertisement Type
                                                            <span>*</span></label>
                                                        {!! Form::radio('property_for', 'sale', $product->property_for == 'sale' ? true : false, [
                                                            'id' => 'sale',
                                                            'data-validation-required-message' => 'This field is required',
                                                        ]) !!}
                                                        {{ Form::label('sale', 'Sell') }}

                                                        {!! Form::radio('property_for', 'rent', $product->property_for == 'rent' ? true : false, ['id' => 'rent']) !!}
                                                        {{ Form::label('rent', 'Rent') }}

                                                        {!! Form::radio('property_for', 'roommate', $product->property_for == 'roommate' ? true : false, [
                                                            'id' => 'roommate',
                                                        ]) !!}
                                                        {{ Form::label('roommate', 'Roommate') }}

                                                        {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Property Type -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('propertyType') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {{ Form::label('propertyType', 'Property Type', ['class' => 'label-title']) }}
                                                        {!! Form::select('propertyType', $property_types, $product->f_property_type_no, [
                                                            'id' => 'propertyType',
                                                            'class' => 'form-control propertyType',
                                                            'placeholder' => 'Select Property Type',
                                                            'tabIndex' => ++$tabIndex,
                                                        ]) !!}
                                                        {!! $errors->first('propertyType', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- City -->

                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('city') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {!! Form::label('city', 'City <span>*</span>', ['class' => 'label-title'], false) !!}
                                                        {!! Form::select('city', $cities, $product->f_city_no, [
                                                            'id' => 'city',
                                                            'class' => 'select2 form-control city',
                                                            'data-validation-required-message' => 'This field is required',
                                                            'placeholder' => 'Select City',
                                                            'tabIndex' => ++$tabIndex,
                                                        ]) !!}
                                                        {!! $errors->first('city', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Area (Based on city) -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('area') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {!! Form::label('area', 'Area (Based on City) <span>*</span>', ['class' => 'label-title'], false) !!}
                                                        {!! Form::select('area', $area, $product->f_area_no, [
                                                            'id' => 'area',
                                                            'class' => 'select2 form-control area',
                                                            'data-validation-required-message' => 'This field is required',
                                                            'placeholder' => 'Select Area',
                                                            'tabIndex' => ++$tabIndex,
                                                        ]) !!}
                                                        {!! $errors->first('area', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Area (Based on area) -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('sub_area') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {!! Form::label('sub_area', 'Area (Based on City) <span>*</span>', ['class' => 'label-title'], false) !!}
                                                        {!! Form::select('sub_area', [], null, [
                                                            'sub_area',
                                                            'class' => 'select2 form-control sub_area',
                                                            'data-validation-required-message' => 'This field is required',
                                                            'placeholder' => 'Select Area',
                                                            'tabIndex' => ++$tabIndex,
                                                        ]) !!}
                                                        {!! $errors->first('sub_area', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Address -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('address') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {{ Form::label('address', 'Address <span>*</span>', ['class' => 'label-title'], false) }}
                                                        {!! Form::text('address', $product->address, [
                                                            'class' => 'form-control address',
                                                            'data-validation-required-message' => 'This field is required',
                                                            'placeholder' => 'Address',
                                                            'tabIndex' => ++$tabIndex,
                                                        ]) !!}
                                                        {!! $errors->first('address', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Condition -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('condition') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {!! Form::label('condition', 'Condition <span>*</span>', ['class' => 'label-title'], false) !!}
                                                        {!! Form::select('condition', $property_conditions, $product->f_property_condition, [
                                                            'class' => 'form-control condition',
                                                            'data-validation-required-message' => 'This field is required',
                                                            'tabIndex' => ++$tabIndex,
                                                            'placeholder' => 'Select Condition',
                                                        ]) !!}
                                                        {!! $errors->first('condition', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Ad Title -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('ad_title') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {{ Form::label('ad_title', 'Title for your ad <span>*</span>', ['class' => 'label-title '], false) }}
                                                        {!! Form::text('ad_title', $product->title, [
                                                            'class' => 'form-control ad_title',
                                                            'data-validation-required-message' => 'This field is required',
                                                            'placeholder' => 'Type here',
                                                            'tabIndex' => ++$tabIndex,
                                                        ]) !!}
                                                        {!! $errors->first('ad_title', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label-title">URl Slug</label>
                                                    <input type="text" class="form-control url_slug"
                                                        tabindex="{{ ++$tabIndex }}"
                                                        {{ $product->url_slug_locked ? 'readonly' : '' }} id="url_slug"
                                                        value="{{ $product->listingSEO && $product->listingSEO->meta_url ? $product->listingSEO->meta_url : $product->url_slug }}"
                                                        name="meta_url">
                                                </div>
                                            </div>
                                        </div>
                                        <hr><br>
                                        <!-- Property Size & Price -->
                                        <div class="form-title mb-2 mt-2">
                                            <h3>Property Size & Price</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="size_parent">
                                                    @foreach ($data['listing_variants'] as $key => $item)
                                                        <div class="row no-gutters form-group size_child"
                                                            style="position: relative">
                                                            <div class="col-6 col-md-3">
                                                                <div class="form-group {!! $errors->has('size') ? 'error' : '' !!}">
                                                                    <label>Size(Sqft)</label>
                                                                    <div class="controls">
                                                                        {!! Form::number('size[]', $item->property_size, [
                                                                            'class' => 'form-control',
                                                                            'placeholder' => 'Size in sft',
                                                                            'data-validation-required-message' => 'This field is required',
                                                                            'tabIndex' => ++$tabIndex,
                                                                        ]) !!}
                                                                        {!! $errors->first('size', '<label class="help-block text-danger">:message</label>') !!}
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 col-md-3 bedroom_div">
                                                                <div class="form-group {!! $errors->has('bedroom') ? 'error' : '' !!}">
                                                                    <label>Bedroom</label>
                                                                    <div class="controls">
                                                                        {!! Form::select('bedroom[]', $bed_room ?? [], $item->bedroom, [
                                                                            'class' => 'form-control',
                                                                            'placeholder' => 'Bedroom',
                                                                            'tabIndex' => ++$tabIndex,
                                                                        ]) !!}
                                                                        {!! $errors->first('bedroom', '<label class="help-block text-danger">:message</label>') !!}
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 col-md-3 bathroom_div">
                                                                <div class="form-group {!! $errors->has('bathroom') ? 'error' : '' !!}">
                                                                    <label>Bathroom</label>
                                                                    <div class="controls">
                                                                        {!! Form::select('bathroom[]', $bath_room ?? [], $item->bathroom, [
                                                                            'class' => 'form-control',
                                                                            'placeholder' => 'Bathroom',
                                                                            'tabIndex' => ++$tabIndex,
                                                                        ]) !!}
                                                                        {!! $errors->first('bathroom', '<label class="help-block text-danger">:message</label>') !!}
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 col-md-3">
                                                                <div class="form-group {!! $errors->has('price') ? 'error' : '' !!}">
                                                                    <label>Total price</label>
                                                                    <div class="controls">
                                                                        {!! Form::number('price[]', $item->total_price, [
                                                                            'class' => 'form-control',
                                                                            'placeholder' => 'Price',
                                                                            'tabIndex' => ++$tabIndex,
                                                                            'data-validation-required-message' => 'This field is required',
                                                                        ]) !!}
                                                                        {!! $errors->first('price', '<label class="help-block text-danger">:message</label>') !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @if ($key != 0)
                                                                <button class="del_btn btn btn-danger btn-xs">✕</button>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="col-6 col-sm-3" style="margin-top: -26px;margin-left: -15px">
                                                    <div class="form-group addSize">
                                                        <a href="javascript:void(0);" id="add_btn">
                                                            <i class="fa fa-plus"></i>
                                                            Add New Size
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="controls">
                                                    <label class="label-title">Property price is</label>
                                                    {!! Form::radio('property_priceChek', '1', $product->price_type == 1, ['id' => 'fixed', 'checked' => 'checked']) !!}
                                                    {{ Form::label('fixed', 'Fixed') }}

                                                    {!! Form::radio('property_priceChek', '2', $product->price_type == 2, ['id' => 'negotiable']) !!}
                                                    {{ Form::label('negotiable', 'Negotiable') }}

                                                    {!! $errors->first('property_priceChek', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <br>


                                        <div class="form-title mb-2 mt-2">
                                            <h3>Additional information</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('floor') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {{ Form::label('floor', 'Total Number of Floor', ['class' => 'label-title '], false) }}
                                                        {!! Form::select('floor', $floor_lists, $product->total_floors, [
                                                            'class' => 'form-control floor',
                                                            'placeholder' => 'Select Total Floor',
                                                            'tabIndex' => ++$tabIndex,
                                                        ]) !!}
                                                        {!! $errors->first('floor', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('', 'Floor Available:', ['class' => 'label-title advertis-label']) }}
                                                    <div class="form-group {!! $errors->has('floor_available') ? 'error' : '' !!}">
                                                        <div class="controls">
                                                            {!! Form::select('floor_available[]', $floor_lists, json_decode($product->floors_avaiable), [
                                                                'multiple' => 'multiple',
                                                                'class' => 'form-control floor_available_select',
                                                            ]) !!}
                                                            {!! $errors->first('floor_available', '<label class="help-block text-danger">:message</label>') !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('floor') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {{ Form::label('facing', 'Facing', ['class' => 'label-title '], false) }}
                                                        {!! Form::select('facing', $property_facing, $property_additional_info->f_facing_no, [
                                                            'class' => 'form-control facing',
                                                            'placeholder' => 'Select Facing',
                                                            'tabIndex' => ++$tabIndex,
                                                        ]) !!}
                                                        {!! $errors->first('facing', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('datepicker', 'Handover Date', ['class' => 'label-title']) }}
                                                    <div class="controls">
                                                        {!! Form::text('handover_date', date('d-m-Y', strtotime($property_additional_info->handover_date)), [
                                                            'id' => 'datepicker',
                                                            'class' => 'form-control datetimepicker',
                                                            'placeholder' => 'Handover date',
                                                            'autocomplete' => 'off',
                                                            'tabIndex' => ++$tabIndex,
                                                        ]) !!}
                                                        {!! $errors->first('handover_date', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    {{ Form::label('description', 'Descriptions', ['class' => 'label-title']) }}
                                                    {{--                    <textarea class="form-control" id="description"></textarea> --}}
                                                    <div class="controls">
                                                        {!! Form::textarea('description', $property_additional_info->description, [
                                                            'id' => 'description',
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Type here',
                                                            'tabIndex' => ++$tabIndex,
                                                        ]) !!}
                                                        {!! $errors->first('description', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Features -->
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Features</h3>
                                                </div>
                                                <div class="form-group">
                                                    @foreach ($listing_features as $key => $listing_feature)
                                                        <div class="form-check form-check-inline {!! $errors->has('features') ? 'error' : '' !!}">
                                                            <div class="controls">
                                                                {!! Form::checkbox('features[]', $key, in_array($key, $features), [
                                                                    'id' => 'features' . $key,
                                                                    'tabIndex' => ++$tabIndex,
                                                                ]) !!}
                                                                {{ Form::label('features' . $key, $listing_feature) }}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    {!! $errors->first('features', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Facilities within 1km -->
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Facilities within 1km</h3>
                                                </div>
                                                <div class="form-group">
                                                    @foreach ($nearby as $key => $item)
                                                        <div class="form-check form-check-inline {!! $errors->has('nearby') ? 'error' : '' !!}">
                                                            <div class="controls">
                                                                {!! Form::checkbox('nearby[]', $key, in_array($key, $near), [
                                                                    'id' => 'nearby' . $key,
                                                                    'tabIndex' => ++$tabIndex,
                                                                ]) !!}
                                                                {{ Form::label('nearby' . $key, $item) }}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    {!! $errors->first('nearby', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>


                                        <!-- map -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('map_url', 'Property Location on map:', ['class' => 'label-title']) }}
                                                    <div class="controls">
                                                        {!! Form::text('map_url', $property_additional_info->location_map, [
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Paste Your Location Map URL',
                                                            'tabIndex' => ++$tabIndex,
                                                        ]) !!}
                                                        {!! $errors->first('map_url', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                                @if ($property_additional_info->location_map)
                                                    <div class="map">
                                                        <iframe src="{{ $property_additional_info->location_map }}"
                                                            style="border:0; width:100%; height: 250px;"
                                                            allowfullscreen="" loading="lazy"></iframe>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('videoURL', 'Video:', ['class' => 'label-title']) }}
                                                    <div class="controls">
                                                        {!! Form::text('videoURL', $property_additional_info->video_code, [
                                                            'id' => 'videoURL',
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Paste your youtube video URL',
                                                            'tabIndex' => ++$tabIndex,
                                                        ]) !!}
                                                        {!! $errors->first('videoURL', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Image & video -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Images</h3>
                                                </div>
                                                <div class="row form-group {!! $errors->has('image') ? 'error' : '' !!}">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            @foreach ($property_listing_images as $key => $item)
                                                                <div class="col-3 mb-1 remove_img{{ $item->id }}">
                                                                    <a href="javascript:void(0)" class="del_img"
                                                                        data-id="{{ $item->id }}">
                                                                        ✕
                                                                    </a>
                                                                    <img class="show_img"
                                                                        src="{{ $WEB_PATH . $item->image_path }}"
                                                                        alt="">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="controls">
                                                            <div id="imageFile" style="padding-top: .5rem;"></div>
                                                        </div>
                                                        {!! $errors->first('image', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <br>
                                        <div class="row">
                                            <!-- Property Owner Details -->
                                            <div class="col-md-6">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Property Owner Details</h3>
                                                </div>
                                                <div class="form-group {!! $errors->has('contact_person') ? 'error' : '' !!}">
                                                    {{ Form::label('contact_person', 'Contact Person', ['class' => 'label-title']) }}
                                                    <div class="controls">
                                                        {!! Form::text('contact_person', $product->contact_person1, [
                                                            'id' => 'contact_person',
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Auto fill owner name except agent user',
                                                            'data-validation-required-message' => 'This field is required',
                                                            'tabIndex' => ++$tabIndex,
                                                        ]) !!}
                                                        {!! $errors->first('contact_person', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                                <div class="form-group {!! $errors->has('mobile') ? 'error' : '' !!}">
                                                    {{ Form::label('mobile', 'Mobile', ['class' => 'label-title']) }}
                                                    <div class="controls">
                                                        {!! Form::number('mobile', $product->mobile1, [
                                                            'id' => 'mobile',
                                                            'class' => 'form-control',
                                                            'data-validation-required-message' => 'This field is required',
                                                            'tabIndex' => ++$tabIndex,
                                                        ]) !!}
                                                        {!! $errors->first('mobile', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::label('contact_person_2', 'Second Contact Person:', ['class' => 'label-title']) }}

                                                    <div class="form-group {!! $errors->has('contact_person_2') ? 'error' : '' !!}">
                                                        <div class="controls">
                                                            {!! Form::text('contact_person_2', old('contact_person_2', $product->contact_person2), [
                                                                'id' => 'contact_person_2',
                                                                'class' => 'form-control',
                                                                'placeholder' => 'Contact person name',
                                                                'tabIndex' => ++$tabIndex,
                                                            ]) !!}
                                                            {!! $errors->first('contact_person_2', '<label class="help-block text-danger">:message</label>') !!}
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::label('mobile_2', 'Mobile:', ['class' => 'label-title']) }}
                                                    <div class="form-group {!! $errors->has('mobile_2') ? 'error' : '' !!}">
                                                        <div class="controls">
                                                            {!! Form::number('mobile_2', old('mobile_2', $product->mobile2), [
                                                                'id' => 'mobile_2',
                                                                'class' => 'form-control',
                                                                'placeholder' => 'Contact person mobile number',
                                                                'tabIndex' => ++$tabIndex,
                                                            ]) !!}
                                                            {!! $errors->first('mobile_2', '<label class="help-block text-danger">:message</label>') !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- SEO -->
                                            <div class="col-md-6">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>SEO</h3>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-title">Title</label>
                                                    <input type="text" name="meta_title" class="form-control seoTitle"
                                                        value="{{ $product->listingSEO->meta_title ?? '' }}"
                                                        id="seoTitle" tabindex="{{ ++$tabIndex }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-title">Meta descriptions</label>
                                                    <textarea name="meta_description" class="form-control" tabindex="{{ ++$tabIndex }}" id="metaDescr">{{ $product->listingSEO->meta_description ?? '' }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label class="label-title">OG Image</label>
                                                    @if ($product->listingSEO && $product->listingSEO->og_image_path)
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <img src="{{ $PANEL_PATH . $product->listingSEO->og_image_path }}"
                                                                    alt=""
                                                                    style="max-height: 150px;max-width: 200px">
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="controls">
                                                        <div id="seoImage" style="padding-top: .5rem;"></div>
                                                    </div>
                                                    {!! $errors->first('image', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>

                                        <hr><br>
                                        <div class="row">
                                            <!-- Listing Type -->
                                            <div class="col-md-6">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Listing Type</h3>
                                                </div>
                                                <div class="form-group listingType">
                                                    <div class="controls">
                                                        @foreach ($property_listing_types as $key => $item)
                                                            @php
                                                                $price = 0.0;
                                                                if ($product->property_for == 'sale') {
                                                                    $price = number_format($item->sell_price, 2);
                                                                } elseif ($product->property_for == 'rent') {
                                                                    $price = number_format($item->rent_price, 2);
                                                                } elseif ($product->property_for == 'roommate') {
                                                                    $price = number_format($item->roommat_price, 2);
                                                                }
                                                            @endphp

                                                            {!! Form::radio('listing_type', $item->id, $product->f_listing_type == $item->id ? true : false, [
                                                                'id' => 'listing_type' . $item->id,
                                                                'data-validation-required-message' => 'This field is required',
                                                                'tabIndex' => ++$tabIndex,
                                                            ]) !!}
                                                            {{ Form::label('listing_type' . $item->id, $item->name . ' (BDT ' . $price . '/' . $item->duration . ' Day)') }}
                                                        @endforeach
                                                        {!! $errors->first('listing_type', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Publishing Status -->
                                            <div class="col-md-6">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Publishing Status</h3>
                                                </div>
                                                <div class="form-group publishingStatus">
                                                    @if ($property_status)
                                                        @foreach ($property_status as $k => $st)
                                                            <input type="radio"
                                                                {{ $product->status == $k ? 'checked' : '' }}
                                                                name="status" value="{{ $k }}"
                                                                tabindex="{{ ++$tabIndex }}"
                                                                id="prop_status_{{ $k }}"> <label
                                                                for="prop_status_{{ $k }}">
                                                                {{ ucwords($st) }}</label>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('max_sharing_permission', 'Sharing Permission (Max):', ['class' => 'label-title']) }}
                                                    <div class="form-group {!! $errors->has('max_sharing_permission') ? 'error' : '' !!}">
                                                        <div class="controls">
                                                            {!! Form::number('max_sharing_permission', old('max_sharing_permission', $product->max_sharing_permission), [
                                                                'id' => 'max_sharing_permission',
                                                                'class' => 'form-control',
                                                                'placeholder' => 'Max Sharing Permission',
                                                                'tabIndex' => ++$tabIndex,
                                                            ]) !!}
                                                            {!! $errors->first('max_sharing_permission', '<label class="help-block text-danger">:message</label>') !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('contact_view_price', 'Contact View Price:', ['class' => 'label-title']) }}
                                                    <div class="form-group {!! $errors->has('contact_view_price') ? 'error' : '' !!}">
                                                        <div class="controls">
                                                            {!! Form::number('contact_view_price', old('contact_view_price', $product->ci_price), [
                                                                'id' => 'contact_view_price',
                                                                'class' => 'form-control',
                                                                'placeholder' => 'Contact view price',
                                                                'tabIndex' => ++$tabIndex,
                                                            ]) !!}
                                                            {!! $errors->first('contact_view_price', '<label class="help-block text-danger">:message</label>') !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($product->user_type == 5)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        {{ Form::label('agent_commission_amt', 'Agent Commission Amount:', ['class' => 'label-title']) }}
                                                        <div class="form-group {!! $errors->has('agent_commission_amt') ? 'error' : '' !!}">
                                                            <div class="controls">
                                                                {!! Form::number('agent_commission_amt', old('agent_commission_amt', $product->agent_commission_amt), [
                                                                    'id' => 'agent_commission_amt',
                                                                    'class' => 'form-control',
                                                                    'placeholder' => 'Contact view price',
                                                                    'tabIndex' => ++$tabIndex,
                                                                ]) !!}
                                                                {!! $errors->first('agent_commission_amt', '<label class="help-block text-danger">:message</label>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif


                                            <div class="col-12 mt-2">
                                                <a href="{{ route('admin.property.list') }}">
                                                    <button type="button" class="btn btn-warning mr-1">
                                                        <i class="ft-x"></i> Cancel
                                                    </button>
                                                </a>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </div>

                                        <!--  Additional informamtion -->
                                        <input type="hidden" value="{{ URL::to('/') }}" id="base_path">
                                        {!! Form::close() !!}

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade text-left" id="paidModal" tabindex="-1" role="dialog" aria-labelledby="brand_name"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="brand_name">Payment for the property</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" action="http://dev.ukshop.my/product-model/store" accept-charset="UTF-8"
                    class="form-horizontal" novalidate="" id="model_update_frm" enctype="multipart/form-data"><input
                        name="_token" type="hidden" value="IGLL3FtXu9uC20rps5E8XLzsXt3h8K19J7HgJxfb">
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-sm text-center">
                                <thead>
                                    <tr>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <th>{{ date('d-m-Y', strtotime('+1 days')) }}</th>
                                        <th>{{ date('d-m-Y', strtotime($product->duration . ' days')) }}</th>
                                        <th>{{ number_format($property_price, 2) }}</th>
                                        <th>
                                            <button class="btn btn-sm btn-info">Paid</button>
                                            <input type="reset" class="btn btn-secondary btn-sm" data-dismiss="modal"
                                                value="Close">
                                        </th>
                                    </tr>
                                </thead>

                            </table>
                        </div>

                        {{-- <div class="form-group ">
                            <label>Name<span class="text-danger">*</span></label>
                            <div class="controls">
                                <input class="form-control mb-1 model_name" data-validation-required-message="This field is required" placeholder="Enter model name" tabindex="1" name="name" type="text">

                            <div class="help-block"></div></div>
                        </div> --}}

                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@push('script')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js') }}"></script>


    <script src="{{ asset('/assets/js/forms/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('/assets/js/forms/datepicker/bootstrap-datetimepicker.min.js') }}"></script>

    <script src="{{ asset('/assets/css/image_upload/image-uploader.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            let city = $('#area');
            let area = $('#sub_area');

            city.change(function() {
                updateArea();
            });

            function updateArea() {
                $.ajax('{{ route('admin.area.get') }}?area=' + city.val())
                    .done(function(res) {
                        area.html('');
                        area.append(new Option('Select area', 0));
                        for (const a in res.data) {
                            let option = new Option(res.data[a], a, parseInt(a) === parseInt(
                                {{ $product->f_area_no }}));
                            area.append(option);
                        }
                    })
            }
            updateArea();
        })
    </script>
    <script>
        $('#imageFile').imageUploader();
        $('#seoImage').imageUploader({
            imagesInputName: 'seo_image',
            maxFiles: 1
        });

        $('.datetimepicker').datetimepicker({
            icons: {
                next: 'fa fa-angle-right',
                previous: 'fa fa-angle-left'
            },
            format: 'DD-MM-YYYY'
        });

        var basepath = $('#base_path').val();

        $(document).on('change', '#city', function() {
            var id = $(this).val();
            if (id == '') {
                return false;
            }
            $("#area").empty();
            $.ajax({
                type: 'get',
                url: basepath + '/admin/area_list?city=' + id,
                async: true,
                dataType: 'json',
                beforeSend: function() {
                    $("body").css("cursor", "progress");
                },
                success: function(response) {
                    $.each(response.data, function(key, value) {
                        var option = new Option(value, key);
                        $("#area").append(option);
                    });
                },
                complete: function(data) {
                    $("body").css("cursor", "default");

                }
            });
        });

        $(document).on('click', '#add_btn', function() {
            $.ajax({
                type: 'get',
                data: {
                    property_type: $('#propertyType').val()
                },
                url: '{{ route('admin.property.get_variant') }}',
                async: true,
                dataType: 'json',
                beforeSend: function() {
                    $("body").css("cursor", "progress");
                },
                success: function(response) {
                    $("#size_parent").append(response.html);
                },
                complete: function(data) {
                    $("body").css("cursor", "default");

                }
            });
        });


        $(document).on("click", ".del_btn", function() {
            $(this).closest(".size_child").remove();
        });


        $(document).ready(function() {
            $(".floor_available_select").select2({
                placeholder: "Select Floors",
            });
            changePropertySizePrice($('#propertyType').val());
        });

        $(".floor_select").on('change', function() {
            $.ajax({
                url: basepath + "/ajax-get-available-floor",
                type: 'GET',
                success: function(data) {
                    $(".floor_available_select").empty();
                    $.each(data, function(value, key) {
                        $(".floor_available_select").append($("<option></option>").attr("value",
                            value).text(key));
                        return value < $(".floor_select").val();
                    });
                    $(".floor_available_select").select2({
                        placeholder: "Select Floors",
                    });
                }
            });
        });

        $(".del_img").on('click', function() {
            let remove_img = '.remove_img' + $(this).data('id');
            $.ajax({
                url: '{{ route('admin.property.delete_image') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $(this).data('id')
                },
                type: 'POST',
                success: function(data) {
                    if (data.status) {
                        $(remove_img).remove();
                        toastr.success(data.success);
                    } else {
                        toastr.success(data.error);
                    }
                }
            });
        });

        $("#propertyType").on('change', function() {
            console.log($(this).val())
            changePropertySizePrice($(this).val());
        });

        function changePropertySizePrice(property_type) {
            $.ajax({
                url: basepath + "/property/ajax-property-type/" + property_type,
                type: 'GET',
                success: function(data) {
                    if (data == 'A') {
                        $("#p_type").val(data);
                        $(".size_placeholder").text('(Apartment)');
                        $(".bathroom_div").css('display', 'block');
                        $(".bedroom_div").css('display', 'block');
                        $(".floor_div").css('display', 'flex');
                        $(".floor_available_div").css('display', 'flex');
                        $("#size").attr('placeholder', 'Size In sft');
                    } else if (data == 'B') {
                        $("#p_type").val(data);
                        $(".size_placeholder").text('(Office/Shop/Warehouse/Industrial Space/Garage)');
                        $(".bathroom_div").css('display', 'none');
                        $(".bedroom_div").css('display', 'none');
                        $(".floor_div").css('display', 'flex');
                        $(".floor_available_div").css('display', 'flex');
                        $("#size").attr('placeholder', 'Size In sft');
                    } else if (data == 'C') {
                        $("#p_type").val(data);
                        $(".size_placeholder").text('(Land)');
                        $(".bathroom_div").css('display', 'none');
                        $(".bedroom_div").css('display', 'none');
                        $(".floor_div").css('display', 'none');
                        $(".floor_available_div").css('display', 'none');
                        $("#size").attr('placeholder', 'Size In Katha');
                    }
                }
            });
        }

        //Payment

        // $(document).on('click','#paid', function(e){
        //     $('#paidModal').modal('show');
        // })
    </script>

    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endpush
