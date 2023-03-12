@extends('layouts.app')
@section('agency-listings','active')
@section('agent-listings','active')
@section('developer-listings','active')
@section('owner-listings','active')

@push('custom_css')

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/css/forms/datepicker/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/image_upload/image-uploader.min.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,700|Montserrat:300,400,500,600,700|Source+Code+Pro&display=swap"
        rel="stylesheet">

    <style>
        .del_btn {
            border-radius: 75%;
            height: 26px;
            width: 26px;
            position: absolute;
            right: -8px;
            top: 8px;
        }

        .row.form-group {
            align-items: baseline;
        }
        .bootstrap-datetimepicker-widget.dropdown-menu {
            display: block;
            margin: 2px 0;
            padding: 4px;
            width: 24em;
        }
        .select2-results__option--selected { display: none;}
    </style>
@endpush
<?php
$property_types         = $data['property_type'] ?? [];
$cities                 = $data['city'] ?? [];
// dd($cities);
$property_conditions    = $data['property_condition'] ?? [];
$property_facing        = $data['property_facing'] ?? [];
$property_listing_types = $data['property_listing_type'] ?? [];
$listing_features       = $data['listing_feature'] ?? [];
$nearby                 = $data['nearby'] ?? [];
$floor_lists            = $data['floor_list'] ?? [];
$bed_room               = Config::get('static_array.bed_room') ?? [];
$bath_room              = Config::get('static_array.bath_room') ?? [];
$balcony                = Config::get('static_array.balcony') ?? [];
$car_parking            = Config::get('static_array.parking') ?? [];
$setting = setting();
$admin_url = $setting->ADMIN_PUBLIC_URL;

?>

@section('content')
    <!--
     ============  advertisment    ============
 -->

    <div class="advertisment-sec">
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>
                <div class="col-sm-12 col-md-9">
                    @if(Auth::user()->USER_TYPE == 2)
                        {!! Form::open([ 'route' => 'listings.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                    @elseif(Auth::user()->USER_TYPE == 3)
                        {!! Form::open([ 'route' => 'developer.listings.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                    @elseif(Auth::user()->USER_TYPE == 4)
                        {!! Form::open([ 'route' => 'agency.listings.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                    @else
                        {!! Form::open([ 'route' => 'agent.listings.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                    @endif
                    {!! Form::hidden('p_type',null,['id' => 'p_type']) !!}
                    <div class="advertisment-wrap">
                        <div class="advertisment-form">
                            <!-- property type  -->
                            <div class="row form-group">
                                {{ Form::label('advertisement_type','Advertisement Type:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('property_for') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::radio('property_for','sale', old('property_for'),[ 'id' => 'sell','data-validation-required-message' => 'This field is required','checked']) !!}
                                            {{ Form::label('sell','Sell') }}

                                            {!! Form::radio('property_for','rent', old('property_for'),[ 'id' => 'rent']) !!}
                                            {{ Form::label('rent','Rent') }}

                                            {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                            {{ Form::label('roommate','Roommate') }}

                                            {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- property type  -->
                            <div class="row form-group">
                                {{ Form::label('property_type','Property Type:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('property_type') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::select('property_type', $property_types,null,['class'=>'form-control', 'placeholder'=>'Select property type','data-validation-required-message' => 'This field is required']) !!}
                                            {!! $errors->first('property_type', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- city  -->
                            <div class="row form-group">
                                {!! Form::label('city','City <span class="required">*</span>:', ['class' => 'col-sm-4 advertis-label'], false) !!}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('city') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::select('city', $cities ,null,array('id' => 'city', 'class'=>'select2 form-control', 'placeholder'=>'Select One','data-validation-required-message' => 'This field is required')) !!}
                                            {!! $errors->first('city', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  area  -->
                            <div class="row form-group">
                                {!! Form::label('area','Area(based on city) <span class="required"></span>:', ['class' => 'col-sm-4 advertis-label'], false) !!}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('area') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::select('area', [],null,['id' => 'area', 'class'=>'select2 form-control', 'placeholder'=>'Select One','data-validation-required-message' => 'This field is required']) !!}
                                            {!! $errors->first('area', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                {!! Form::label('sub_area','Sub Area(based on area) <span class="required"></span>:', ['class' => 'col-sm-4 advertis-label'], false) !!}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('sub_area') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::select('sub_area', [],null,array('id' => 'sub_area', 'class'=>'select2 form-control','placeholder'=>'Select One')) !!}
                                            {!! $errors->first('sub_area', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  road  -->
                            <div class="row form-group">
                                {!! Form::label('road','Road <span class="required">*</span>:', ['class' => 'col-sm-4 advertis-label'], false) !!}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('road') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('road', old('road'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Road','id'=>'road']) !!}
                                            {!! $errors->first('road', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  house  -->
                            <div class="row form-group">
                                {!! Form::label('house','House <span class="required">*</span>:', ['class' => 'col-sm-4 advertis-label'], false) !!}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('house') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('house', old('house'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'House','id'=>'house']) !!}
                                            {!! $errors->first('house', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  address  -->
                            <div class="row form-group">
                                {!! Form::label('address','Address <span class="required">*</span>:', ['class' => 'col-sm-4 advertis-label'], false) !!}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('address') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('address', old('address'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Address','id'=>'address']) !!}
                                            {!! $errors->first('address', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  condition  -->
                            <div class="row form-group {!! $errors->has('condition') ? 'error' : '' !!}">
                                {!! Form::label('condition','Condition <span class="required">*</span>:', ['class' => 'col-sm-4 advertis-label'], false) !!}
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="controls">
                                            {!! Form::select('condition', $property_conditions,null,array('class'=>'form-control', 'placeholder'=>'Select Condition','data-validation-required-message' => 'This field is required')) !!}
                                            {!! $errors->first('condition', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  title  -->
                            <div class="row form-group">
                                {!! Form::label('property_title','Property Title <span class="required">*</span>:', ['class' => 'col-sm-4 advertis-label'], false) !!}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('property_title') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('property_title', old('property_title'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Property Title']) !!}
                                            {!! $errors->first('property_title', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  Property Size & Price  -->
                            <div class="advertisment-title">
                                <h3>Property Size & Price</h3>
                            </div>

                            <div id="size_parent">
                                <div class="row no-gutters form-group size_child">
                                    <span class="floating_labels">Type-A</span>
                                    <div class="col-6 col-md-4  size_div">
                                        <div class="form-group {!! $errors->has('size') ? 'error' : '' !!}">
                                            {{-- <span class="advertis-label">Size</span> --}}
                                            <div class="controls">
                                                {!! Form::number('size[]', old('size[]'), ['id'=>'size', 'class' => 'form-control',  'placeholder' => 'Size in sft','data-validation-required-message' => 'This field is required']) !!}
                                                <span class="size_placeholder advertis-label"
                                                      style="opacity: 0.6;font-size: 12px"></span>
                                                {!! $errors->first('size', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4   bedroom_div">
                                        <div class="form-group {!! $errors->has('bedroom') ? 'error' : '' !!}">
                                            {{-- <span class="advertis-label">Bedroom</span> --}}
                                            <div class="controls">
                                                {!! Form::select('bedroom[]', $bed_room, old('bedroom[]') ?? null, array('class'=>'form-control', 'placeholder'=>'Select bedroom')) !!}
                                                <span class="bedroom_placeholder advertis-label"
                                                      style="opacity: 0.6;font-size: 12px"></span>
                                                {!! $errors->first('bedroom', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4  bathroom_div">
                                        <div class="form-group {!! $errors->has('bathroom') ? 'error' : '' !!}">
                                            {{-- <span class="advertis-label">Bathroom</span> --}}
                                            <div class="controls">
                                                {!! Form::select('bathroom[]', $bath_room, old('bathroom[]'), array('class'=>'form-control', 'placeholder'=>'Select bathroom')) !!}
                                                <span class="bathroom_placeholder advertis-label"
                                                      style="opacity: 0.6;font-size: 12px"></span>
                                                {!! $errors->first('bathroom', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4  mb-0 bathroom_div">
                                        <div class="form-group {!! $errors->has('balcony') ? 'error' : '' !!}">
                                            {{-- <span class="advertis-label">Balcony</span> --}}
                                            <div class="controls">
                                                {!! Form::select('balcony[]', $balcony, old('balcony[]'), array('class'=>'form-control', 'placeholder'=>'Select balcony')) !!}
                                                <span class="bathroom_placeholder advertis-label"
                                                      style="opacity: 0.6;font-size: 12px"></span>
                                                {!! $errors->first('balcony', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4 price_div">
                                        <div class="form-group mb-0 {!! $errors->has('car_parking') ? 'error' : '' !!}">
                                            {{-- <span class="advertis-label">Car Parking</span> --}}
                                            <div class="controls">
                                                {!! Form::select('car_parking[]',$car_parking, old('car_parking[]'), ['class' => 'form-control',  'placeholder' => 'Select parking','data-validation-required-message' => 'This field is required']) !!}
                                                <span class="price_placeholder advertis-label"
                                                      style="opacity: 0.6;font-size: 12px"></span>
                                                {!! $errors->first('car_parking', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4 price_div">
                                        <div class="form-group mb-0 {!! $errors->has('price') ? 'error' : '' !!}">
                                            {{-- <span class="advertis-label">Price</span> --}}
                                            <div class="controls">
                                                {!! Form::number('price[]', old('price[]'), ['class' => 'form-control',  'placeholder' => 'Price per sqft','data-validation-required-message' => 'This field is required']) !!}
                                                <span class="price_placeholder advertis-label"
                                                      style="opacity: 0.6;font-size: 12px"></span>
                                                {!! $errors->first('price', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-6 col-md-2 price_div">
                                        <div class="form-group mb-0 {!! $errors->has('land_area') ? 'error' : '' !!}">
                                            <span class="advertis-label">Land Area</span>
                                            <div class="controls">
                                                {!! Form::text('land_area[]', old('land_area[]'), ['class' => 'form-control',  'placeholder' => 'Land Area','data-validation-required-message' => 'This field is required']) !!}
                                                <span class="price_placeholder advertis-label"
                                                      style="opacity: 0.6;font-size: 12px"></span>
                                                {!! $errors->first('land_area', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-xs btn-danger float-right " id="add_btn" style="margin-right: 6px;">+ Add new size
                                    </button>
                                </div>
                            </div>

                            <!--  property price   -->
                            <div class="row form-group mt-2">
                                {{ Form::label('','Utility and others cost:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8 col-md-4">
                                    <div class="form-group {!! $errors->has('utility') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('utility', old('utility'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Utility and others cost']) !!}

                                            {!! $errors->first('utility', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('','Property price is:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('property_price') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::radio('property_price','1', old('property_price'),[ 'id' => 'fixed','data-validation-required-message' => 'This field is required']) !!}
                                            {{ Form::label('fixed','Fixed') }}
                                            {!! Form::radio('property_price','2', old('property_price'),[ 'id' => 'nagotiable']) !!}
                                            {{ Form::label('nagotiable','Nagotiable') }}
                                            {!! $errors->first('property_price', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('','Call for price:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('call_for_price') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::checkbox('call_for_price','1', old('call_for_price'),[ 'id' => 'call_price','data-validation-required-message' => 'This field is required']) !!}
                                            {{ Form::label('call_price','Yes') }}

                                            {!! $errors->first('call_for_price', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  Additional Infomation  -->
                            <div class="advertisment-title">
                                <h3>Additional Infomation</h3>
                            </div>
                            <div class="row form-group floor_div">
                                {{ Form::label('add_land_area','Land area:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('add_land_area') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('add_land_area', old('add_land_area'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Land area']) !!}
                                            {!! $errors->first('add_land_area', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group floor_div">
                                {{ Form::label('floor','Total Number Of Floor:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('floor') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::select('floor', $floor_lists,null,array('class'=>'form-control floor_select')) !!}
                                            {!! $errors->first('floor', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group floor_available_div">
                                {{ Form::label('','Floor Available:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('floor_available') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::select('floor_available[]', [] ,null,array('multiple'=>'multiple','class'=>'form-control floor_available_select')) !!}
                                            {!! $errors->first('floor_available', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                {{ Form::label('facing','Facing:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('facing') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::select('facing', $property_facing,null,array('class'=>'form-control', 'placeholder'=>'Select facing')) !!}
                                            {!! $errors->first('facing', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('datepicker','Handover Date:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('handover_date') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('handover_date', old('handover_date'), [ 'id'=>'datepicker','class' => 'form-control datetimepicker','placeholder' => 'Handover date','autocomplete' => 'off', 'tabindex' => 1]) !!}
                                            {!! $errors->first('handover_date', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('description','Descriptions:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('description') ? 'error' : '' !!}">

                                        <div class="controls">
                                            {!! Form::textarea('description', old('description'), [ 'id'=>'description','class' => 'msg-area form-control', 'placeholder' => 'Type here']) !!}
                                            {!! $errors->first('description', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  features  -->
                            <div class="advertisment-title">
                                <h3>Features</h3>
                            </div>
                            <div class="row form-group" style="margin-left: 20px; ">
                                <div class="col-lg-12">
                                        <div class="form-check form-check-inline {!! $errors->has('features') ? 'error' : '' !!}">
                                            <div class="controls">
                                                <input id="features30" class="form-check-input" name="select_all[]" type="checkbox" value="1">
                                                <label for="features30" class="form-check-label">Select All</label>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    @foreach($listing_features as $key => $list_feature)
                                        @php
                                            $icon = $admin_url.$list_feature->ICON;
                                        @endphp
                                        <div class="form-check form-check-inline {!! $errors->has('features') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::checkbox('features[]',$list_feature->id, old('features'),[ 'id' => 'features'.$list_feature->id,'class' =>'form-check-input features']) !!}
                                                {{ Form::label('features'.$list_feature->id,$list_feature->TITLE,['class' =>'form-check-label']) }}
                                                <img src="{{ fileExitRemote($icon) }}" alt="{{ $list_feature->TITLE }}" style="height: 40px;width: 40px">
                                            </div>
                                        </div>
                                    @endforeach
                                    {!! $errors->first('features', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                            <!--  facilities   -->
                            <div class="advertisment-title">
                                <h3>Facilities Within 1km</h3>
                            </div>
                            <div class="row form-group" style="margin-left: 20px; ">
                                <div class="col-lg-12">
                                    <div class="form-check form-check-inline {!! $errors->has('features') ? 'error' : '' !!}">
                                        <div class="controls">
                                            <input id="faciliti_all" class="form-check-input" name="select_all[]" type="checkbox" value="1">
                                            <label for="faciliti_all" class="form-check-label">Select All</label>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    @foreach($nearby as $key => $item)
                                    @php
                                        $icon = $admin_url.$item->ICON;
                                    @endphp
                                        <div
                                            class="form-check form-check-inline {!! $errors->has('nearby') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::checkbox('nearby[]',$item->id, old('nearby'),[ 'id' => 'nearby'.$item->id, 'class' =>'form-check-input faciliti']) !!}
                                                {{ Form::label('nearby'.$item->id,$item->TITLE) }}
                                                <img src="{{ fileExitRemote($icon) }}" alt="{{$item->TITLE}}" style="height: 40px;width: 40px">
                                            </div>
                                        </div>
                                    @endforeach
                                    {!! $errors->first('nearby', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>

                            <!--  image & video   -->
                            <div class="advertisment-title">
                                <h3>Image & Videos</h3>
                            </div>
                            <div class="row form-group {!! $errors->has('image') ? 'error' : '' !!}"
                                 style="align-items: center">
                                {{ Form::label(null,'Image',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="controls">
                                        <div id="imageFile" style="padding-top: .5rem;"></div>
                                    </div>
                                    {!! $errors->first('image', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>

                            <div class="row form-group {{--map--}}">
                                {{ Form::label('map_url','Google Map Embed Code:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('map_url') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('map_url', old('map_url'), [ 'id'=>'map_url','class' => 'form-control','placeholder'=>'Paste Your Location Map Embeded Code']) !!}
                                            {!! $errors->first('map_url', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row form-group {{--video-tag--}}">
                                {{ Form::label('videoURL','Youtube Embed Code:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('videoURL') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('videoURL', old('videoURL'), [ 'id'=>'videoURL','class' => 'form-control','placeholder'=>'Paste your youtube video embed code']) !!}
                                            {!! $errors->first('videoURL', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--   property owner   -->
                            <div class="advertisment-title">
                                <h3>Property Owner Details</h3>
                            </div>

                            <div class="row form-group">
                                {{ Form::label('contact_person','Contact Person:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('contact_person') ? 'error' : '' !!}">
                                        <div class="controls">
                                            <input id="contact_person" class="form-control" placeholder="Auto fill owner name except agent user" data-validation-required-message="This field is required" name="contact_person" value="{{Auth::user()->NAME}}" type="text">
                                            {!! $errors->first('contact_person', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                // dd(Auth::user());
                            @endphp



                        <div class="row form-group">
                            {{ Form::label('mobile','Mobile 1:',['class' => 'col-sm-4 advertis-label']) }}
                            <div class="col-sm-8">
                                <div class="form-group {!! $errors->has('mobile') ? 'error' : '' !!}">
                                    <div class="controls">
                                        <input id="mobile" class="form-control" placeholder="Property Owner Number" value="{{Auth::user()->MOBILE_NO}}" data-validation-required-message="This field is required" name="mobile" type="number">
                                        {!! $errors->first('mobile', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            {{ Form::label('mobile_2','Mobile 2:',['class' => 'col-sm-4 advertis-label']) }}
                            <div class="col-sm-8">
                                <div class="form-group {!! $errors->has('mobile_2') ? 'error' : '' !!}">
                                    <div class="controls">
                                        <input id="mobile_2" class="form-control" placeholder="Property Owner Number" value="{{old('mobile_2')}}" name="mobile_2" type="number">
                                        {!! $errors->first('mobile_2', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            {{ Form::label('mobile_3','Mobile 3:',['class' => 'col-sm-4 advertis-label']) }}
                            <div class="col-sm-8">
                                <div class="form-group {!! $errors->has('mobile') ? 'error' : '' !!}">
                                    <div class="controls">
                                        <input id="mobile_3" class="form-control" placeholder="Property Owner Number" value="{{old('mobile_3')}}" name="mobile_3" type="number">
                                        {!! $errors->first('mobile_3', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                            <!--  listing  type -->
                            <div class="advertisment-title">
                                <h3>Listing Type</h3>
                            </div>
                            <div class="listing-list mb-3 {!! $errors->has('listing_type') ? 'error' : '' !!}">
                                <div class="controls">
                                    @foreach($property_listing_types as $key => $item)
                                        {!! Form::radio('listing_type',$key, old('listing_type'),[ 'id' => 'listing_type'.$key,'data-validation-required-message' => 'This field is required']) !!}
                                        {{ Form::label('listing_type'.$key,$item) }}
                                    @endforeach
                                    {!! $errors->first('listing_type', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>

                            <!--  submit button  -->
                            <div class="advertisment-btn">
                                {!! Form::submit('submit', ['id'=>'submit']) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div><!-- container -->
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="{{asset('/assets/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('/assets/js/forms/validation/form-validation.js')}}"></script>
    <script src="{{asset('assets/js/forms/select/form-select2.min.js')}}"></script>
    <script src="{{asset('/assets/js/forms/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('/assets/js/forms/datepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('/assets/css/image_upload/image-uploader.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        //ck editor
        CKEDITOR.replace('description', {
      // Define the toolbar groups as it is a more accessible solution.
      toolbarGroups: [{
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "paragraph",
          "groups": ["list", "blocks"]
        },


      ],
      height: '100px',
      // Remove the redundant buttons from toolbar groups defined above.
      removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,PasteFromWord'
    });
    </script>
    <script>

        function autoAddress(){
            // Auto generate hobe (H+R+B+Area+City). Editable thakbe.
            var address = '';
            var city = $('#city').find(":selected").text();
            var area = $('#area').find(":selected").text();
            var area_id = $('#area').find(":selected").val();
            var sub_area = $('#sub_area').find(":selected").text();
            var sub_area_id = $('#sub_area').find(":selected").val();
            var road = $('#road').val();
            var house = $('#house').val();

            if(house){
                address +='H-'+house+', ';
            }

            if(road){
                address +='R-'+road+', ';
            }

            if(sub_area_id>0){
                address +=sub_area+', ';
            }

            if(area_id){
                address +=area+', ';
            }

            if(city){
                address +=city;
            }

            $('#address').val(address);
        }

        $('#road').on('input',function(){
            autoAddress();
        })

        $('#house').on('input',function(){
            autoAddress();
        })


        $('#imageFile').imageUploader();

        $('.datetimepicker').datetimepicker({
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            format: 'DD-MM-YYYY',
            debug: true
        });

        $(document).ready(function(){
            $('#features30').on('click',function(){
                var slect_all = ($(this).val());
                    if(this.checked){
                        $('.features').each(function(){
                            this.checked = true;
                        });
                    }else{
                        $('.features').each(function(){
                            this.checked = false;
                        });
                    }
            });
            $('.features').on('click',function(){
            if($('.features:checked').length == $('.features').length){
                $('#features30').prop('checked',true);
            }else{
                $('#features30').prop('checked',false);
            }
        });
        });
        $(document).ready(function(){
            $('#faciliti_all').on('click',function(){
                var slect_all = ($(this).val());
                    if(this.checked){
                        $('.faciliti').each(function(){
                            this.checked = true;
                        });
                    }else{
                        $('.faciliti').each(function(){
                            this.checked = false;
                        });
                    }
            });
            $('.faciliti').on('click',function(){
            if($('.faciliti:checked').length == $('.faciliti').length){
                $('#faciliti_all').prop('checked',true);
            }else{
                $('#faciliti_all').prop('checked',false);
            }
        });
        });
        var basepath = $('#base_url').val();

        $(document).on('change', '#sub_area', function () {
            autoAddress();
        })

        $(document).on('change', '#area', function () {
            autoAddress();
            let id = $(this).val();
            $('#sub_area').empty();
            $('#sub_area').append(new Option('Select One', 0));

            $.ajax({
                type: 'get',
                url: basepath + '/ajax-get-subarea/' + id,
                async: true,
                dataType: 'json',
                success: function (data) {
                    $.each(data, function(key, value) {
                        $('#sub_area').append('<option value="' + value.id + '">' + value.AREA_NAME + '</option>');

                    });
                },
                complete: function (data) {
                    $("body").css("cursor", "default");
                }
            });
        });

        $(document).on('change', '#city', function () {
            autoAddress();
            var id = $(this).val();
            if (id == '') {
                return false;
            }

            $("#area").empty();
            $('#sub_area').empty();
            $('#area').append(new Option('Select One', 0));
            $.ajax({
                type: 'get',
                url: basepath + '/ajax-get-area/' + id,
                async: true,
                dataType: 'json',
                beforeSend: function () {
                    $("body").css("cursor", "progress");
                },
                success: function (data) {
                    $.each(data, function(key, value) {
                        $('#area').append('<option value="' + value.id + '">' + value.AREA_NAME + '</option>');

                    });
                },
                complete: function (data) {
                    $("body").css("cursor", "default");

                }
            });
        });
        var noToAlp = {
            1:'A',
            2:'B',
            3:'C',
            4:'D',
            5:'E',
            6:'F',
            7:'G',
            8:'H',
            9:'I',
            10:'J',
            11:'K',
            12:'L',
            13:'M',
            14:'N',
            15:'O',
            16:'P',
            17:'Q',
            18:'R',
            19:'S',
            20:'T',
        };

        $(document).on('click', '#add_btn', function () {
            var property_type = $('#property_type').val();
            if (property_type == '') {
                alert('Please select property type at first');
            } else {
                $.ajax({
                    type: 'get',
                    data: {property_type: property_type},
                    url: basepath + '/ajax-add-listing-variant',
                    async: true,
                    dataType: 'json',
                    beforeSend: function () {
                        $("body").css("cursor", "progress");
                    },
                    success: function (response) {
                        $("#size_parent").append(response.html);
                        var new_floating_label = 'Type-B';
                        $(".floating_labels").each(function(index, el) {
                            var num = index+1;
                            $(this).text("Type-" + (noToAlp[num]));
                        });


                    },
                    complete: function (data) {
                        $("body").css("cursor", "default");


                    }
                });
            }

        });


        $(document).on("click", ".del_btn", function () {
            $(this).closest(".size_child").remove();
        });

        $(document).on('click', '#add_btn2', function () {
            $.ajax({
                type: 'get',
                url: basepath + '/ajax-add-listing-phone',
                async: true,
                dataType: 'json',
                beforeSend: function () {
                    $("body").css("cursor", "progress");
                },
                success: function (response) {
                    $("#multiplePhone").append(response.html);

                },
                complete: function (data) {
                    $("body").css("cursor", "default");


                }
            });
        });

        $(document).on("click", ".del_btn_phn", function () {
            $(this).closest(".size_child_phn").remove();
        });
        $(document).ready(function () {
            $(".floor_available_select").select2({
                placeholder: "Select one or more",
            });
        });

        $(".floor_select").on('change', function () {
            $.ajax({
                url: basepath + "/ajax-get-available-floor",
                type: 'GET',
                success: function (data) {
                    $(".floor_available_select").empty();
                    $.each(data, function (value, key) {
                        $(".floor_available_select").append($("<option></option>").attr("value", value).text(key));
                        return value < $(".floor_select").val();
                    });
                    $(".floor_available_select").select2(
                        {
                            placeholder: "Select Floors",
                        }
                    );
                }
            });
        });

        $("#property_type").on('change', function () {
            $.ajax({
                url: basepath + "/ajax-get-property-type/" + $(this).val(),
                type: 'GET',
                success: function (data) {
                    if (data == 'A') {
                        $("#p_type").val(data);
                        $(".bathroom_div").css('display', 'block');
                        $(".bedroom_div").css('display', 'block');
                        $(".floor_div").css('display', 'flex');
                        $(".floor_available_div").css('display', 'flex');
                        $("#size").attr('placeholder', 'Size In sft');
                    } else if (data == 'B') {
                        $("#p_type").val(data);
                        $(".bathroom_div").css('display', 'none');
                        $(".bedroom_div").css('display', 'none');
                        $(".floor_div").css('display', 'flex');
                        $(".floor_available_div").css('display', 'flex');
                        $("#size").attr('placeholder', 'Size In sft');
                    } else if (data == 'C') {
                        $("#p_type").val(data);
                        $(".bathroom_div").css('display', 'none');
                        $(".bedroom_div").css('display', 'none');
                        $(".floor_div").css('display', 'none');
                        $(".floor_available_div").css('display', 'none');
                        $("#size").attr('placeholder', 'Size In Katha');
                    }
                }
            });
        });
    </script>
@endpush
