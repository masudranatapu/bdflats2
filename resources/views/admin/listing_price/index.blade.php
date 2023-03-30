@extends('admin.layouts.master')

@section('settings_menu','menu-open')
@section('listing_price','active')


@section('title') Listing Price @endsection
@section('page-name') Listing Price @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Listing Price</li>
@endsection

@push('stype')
    <link rel="stylesheet" type="text/css" href="{{asset('/custom/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@push('script')

    <!-- BEGIN: Data Table-->
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
    <!-- END: Data Table-->
@endpush

@php

    $data = $data ?? [];
    $data2 = $data2 ?? [];
@endphp


@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Admin roles') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Admin roles') }}</li>
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
                                {{ __('Admin roles list') }}
                                <span class="float-right">
                                    <a href="{{ route('admin.listing_price.list') }}" class="btn btn-sm btn-primary">
                                        + Create
                                    </a>
                                </span>
                            </h5>
                        </div>

                        <div class="card-body">
                            {!! Form::open([ 'route' => 'admin.listing_price.update', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                            <div class="form-body">
                                @foreach($data as $key => $item)
                                    @php
                                        $price = $item->listingPrice;
                                    @endphp
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {!! $errors->has('gl_sale_price') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::text('gl_sale_name'.$key, $item->name,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                                    {!! $errors->first('gl_sale_price', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Listing For Sale (BDT):</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {!! $errors->has('gl_sale_price') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::text('gl_sale_price'.$key, $price->sell_price,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                                    {!! $errors->first('gl_sale_price', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Listing For Rent (BDT):</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {!! $errors->has('gl_rent_price') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::text('gl_rent_price'.$key, $price->rent_price,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                                    {!! $errors->first('gl_rent_price', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Listing For Roommate (BDT):</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {!! $errors->has('gl_roommate_price') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::text('gl_roommate_price'.$key, $price->roommat_price,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                                    {!! $errors->first('gl_roommate_price', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Duration (Days):</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group {!! $errors->has('gl_duration') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::text('gl_duration'.$key, $item->duration,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                                    {!! $errors->first('gl_duration', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="form-actions mt-10 mb-3 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Save
                                    </button>
                                </div>

                            </div>
                            {!! Form::close() !!}

                        </div>

                        <hr>
                        <hr>

                        <div class="card-body">
                            {!! Form::open([ 'route' => 'admin.listing_lead_price.update', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                            <div class="form-body">
                                <h2 class="mb-2 mt-2">Agent Properties Contact View</h2>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Listing For Sale:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::text('apv_sale_price', $data2->agent_prop_view_sales_price ?? 0,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                                {!! $errors->first('apv_sale_price', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Listing For Rent:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group {!! $errors->has('apv_rent_price') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::text('apv_rent_price', $data2->agent_prop_view_rent_price ?? 0,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                                {!! $errors->first('apv_rent_price', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Listing For Roommate:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group {!! $errors->has('apv_roommate_price') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::text('apv_roommate_price', $data2->agent_prop_view_roommate_price ?? 0,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                                {!! $errors->first('apv_roommate_price', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h2 class="mb-2 mt-2">Agent Commission</h2>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Listing For Sale:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group {!! $errors->has('ac_sale_price') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::text('ac_sale_price', $data2->agent_comm_sales_price ?? 0,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                                {!! $errors->first('ac_sale_price', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Listing For Rent:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group {!! $errors->has('ac_rent_price') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::text('ac_rent_price', $data2->agent_comm_rent_price ?? 0,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                                {!! $errors->first('ac_rent_price', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Listing For Roommate:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group {!! $errors->has('ac_roommate_price') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::text('ac_roommate_price', $data2->agent_comm_roommate_price ?? 0,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                                {!! $errors->first('ac_roommate_price', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <h2 class="mb-2 mt-2">Lead View</h2>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Listing For Sale:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group {!! $errors->has('lv_sale_price') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::text('lv_sale_price', $data2->lead_view_sales_price ?? 0,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                                {!! $errors->first('lv_sale_price', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Listing For Rent:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group {!! $errors->has('lv_rent_price') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::text('lv_rent_price', $data2->lead_view_rent_price ?? 0,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                                {!! $errors->first('lv_rent_price', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Listing For Roommate:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group {!! $errors->has('lv_roommate_price') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::text('lv_roommate_price', $data2->lead_view_roommate_price ?? 0 ,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                                {!! $errors->first('lv_roommate_price', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions mt-10 mb-3 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Save
                                    </button>
                                </div>

                            </div>
                            {!! Form::close() !!}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
