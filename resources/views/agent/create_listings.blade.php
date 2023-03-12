@extends('layouts.app')
@section('agent-listings','active')

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/datepicker/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/image_upload/image-uploader.min.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,700|Montserrat:300,400,500,600,700|Source+Code+Pro&display=swap"
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
    </style>
@endpush
<?php
$property_types = $data['property_type'] ?? [];
$cities = $data['city'] ?? [];
$property_conditions = $data['property_condition'] ?? [];
$property_facing = $data['property_facing'] ?? [];
$property_listing_types = $data['property_listing_type'] ?? [];
$listing_features = $data['listing_feature'] ?? [];
$nearby = $data['nearby'] ?? [];
$floor_lists = $data['floor_list'] ?? [];
$bed_room = Config::get('static_array.bed_room') ?? [];
$bath_room = Config::get('static_array.bath_room') ?? [];

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
                    {{ $errors }}
                    {!! Form::open([ 'route' => 'agent.listings.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                    {!! Form::hidden('p_type',null,['id' => 'p_type']) !!}
                    <div class="advertisment-wrap">
                        <div class="advertis-seller d-lg-flex form-group {!! $errors->has('property_for') ? 'error' : '' !!}">
                            <h5>Advertisement Type:&nbsp; </h5>
                            <div class="controls">
                                {!! Form::radio('property_for','sale', old('property_for'),[ 'id' => 'sale','data-validation-required-message' => 'This field is required']) !!}
                                {{ Form::label('sale','Sale') }}

                                {!! Form::radio('property_for','rent', old('property_for'),[ 'id' => 'rent']) !!}
                                {{ Form::label('rent','Rent') }}

                                {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                {{ Form::label('roommate','Roommate') }}

                                {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                            </div>
                        </div>
                        <div class="advertisment-form">
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
                                            {!! Form::select('city', $cities ,null,array('id' => 'city', 'class'=>'select2 form-control', 'placeholder'=>'Select City','data-validation-required-message' => 'This field is required')) !!}
                                            {!! $errors->first('city', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  area  -->
                            <div class="row form-group">
                                {!! Form::label('area','Area(based on city) <span class="required">*</span>:', ['class' => 'col-sm-4 advertis-label'], false) !!}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('area') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::select('area', [],null,array('id' => 'area', 'class'=>'select2 form-control', 'placeholder'=>'Select Area','data-validation-required-message' => 'This field is required')) !!}
                                            {!! $errors->first('area', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                {!! Form::label('sub_area','Area(based on area) <span class="required">*</span>:', ['class' => 'col-sm-4 advertis-label'], false) !!}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('sub_area') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::select('sub_area', [],null,array('id' => 'sub_area', 'class'=>'select2 form-control', 'placeholder'=>'Select Area','data-validation-required-message' => 'This field is required')) !!}
                                            {!! $errors->first('sub_area', '<label class="help-block text-danger">:message</label>') !!}
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
                                            {!! Form::text('address', old('address'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Address']) !!}
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
                                <h3>Property Size & Price
                                    <button type="button" class="btn btn-xs btn-danger" id="add_btn">+ Add new size</button>
                                </h3>
                            </div>

                            <div id="size_parent">
                                <div class="row no-gutters form-group size_child">
                                    <div class="col-6 col-md-3 size_div">
                                        <div class="form-group mb-0 {!! $errors->has('size') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::number('size[]', old('size[]'), ['id'=>'size', 'class' => 'form-control',  'placeholder' => 'Size in sft','data-validation-required-message' => 'This field is required']) !!}
                                                <span class="size_placeholder advertis-label" style="opacity: 0.6;font-size: 12px"></span>
                                                {!! $errors->first('size', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3 bedroom_div">
                                        <div class="form-group mb-0 {!! $errors->has('bedroom') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::select('bedroom[]', $bed_room, old('bedroom[]') ?? null, array('class'=>'form-control', 'placeholder'=>'Bedroom')) !!}
                                                <span class="bedroom_placeholder advertis-label" style="opacity: 0.6;font-size: 12px"></span>
                                                {!! $errors->first('bedroom', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3 bathroom_div">
                                        <div class="form-group mb-0 {!! $errors->has('bathroom') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::select('bathroom[]', $bath_room, old('bathroom[]'), array('class'=>'form-control', 'placeholder'=>'Bathroom')) !!}
                                                <span class="bathroom_placeholder advertis-label" style="opacity: 0.6;font-size: 12px"></span>
                                                {!! $errors->first('bathroom', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3 price_div">
                                        <div class="form-group mb-0 {!! $errors->has('price') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::number('price[]', old('price[]'), ['class' => 'form-control',  'placeholder' => 'Price','data-validation-required-message' => 'This field is required']) !!}
                                                <span class="price_placeholder advertis-label" style="opacity: 0.6;font-size: 12px"></span>
                                                {!! $errors->first('price', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  property price   -->
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

                            <!--  Additional Infomation  -->
                            <div class="advertisment-title">
                                <h3>Additional Infomation</h3>
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
                            <div class="row form-group">
                                <div class="col-lg-12">
                                    @foreach($listing_features as $key => $listing_feature)
                                        <div class="form-check form-check-inline {!! $errors->has('features') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::checkbox('features[]',$key, old('features'),[ 'id' => 'features'.$key,'class' =>'form-check-input']) !!}
                                                {{ Form::label('features'.$key,$listing_feature,['class' =>'form-check-label']) }}
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
                            <div class="row form-group">
                                <div class="col-lg-12">
                                    @foreach($nearby as $key => $item)
                                        <div class="form-check form-check-inline {!! $errors->has('nearby') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::checkbox('nearby[]',$key, old('nearby'),[ 'id' => 'nearby'.$key]) !!}
                                                {{ Form::label('nearby'.$key,$item) }}
                                            </div>
                                        </div>
                                    @endforeach
                                    {!! $errors->first('nearby', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                            <!--  map   -->
                            <div class="advertisment-title">
                                <h3>Property Location on Map</h3>
                            </div>
                            <div class="property-map">
                                <div class="row no-gutters form-group">
                                    <div class="col-12">
                                        <div class="form-group {!! $errors->has('map_url') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::text('map_url', old('map_url'), [ 'class' => 'form-control',  'placeholder' => 'Paste Your Location Map URL']) !!}
                                                {!! $errors->first('map_url', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  image & video   -->
                            <div class="advertisment-title">
                                <h3>Image & Videos</h3>
                            </div>
                            <div class="row form-group {!! $errors->has('image') ? 'error' : '' !!}" style="align-items: center">
                                {{ Form::label(null,'Image',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="controls">
                                        <div id="imageFile" style="padding-top: .5rem;"></div>
                                    </div>
                                    {!! $errors->first('image', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>

                            <div class="row form-group {{--video-tag--}}">
                                {{ Form::label('videoURL','Video:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('videoURL') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('videoURL', old('videoURL'), [ 'id'=>'videoURL','class' => 'form-control','placeholder'=>'Paste your youtube video URL']) !!}
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
                                            {!! Form::text('contact_person', old('contact_person'), [ 'id'=>'contact_person','class' => 'form-control','placeholder'=>'Auto fill owner name except agent user','data-validation-required-message' => 'This field is required']) !!}
                                            {!! $errors->first('contact_person', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('mobile','Mobile:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('mobile') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::number('mobile', old('mobile'), [ 'id'=>'mobile','class' => 'form-control','placeholder'=>'Property Owner Number','data-validation-required-message' => 'This field is required']) !!}
                                            {!! $errors->first('mobile', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('contact_person_2','Second Contact Person:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('contact_person_2') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('contact_person_2', old('contact_person_2'), [ 'id'=>'contact_person_2','class' => 'form-control','placeholder'=>'Auto fill owner name except agent user','data-validation-required-message' => 'This field is required']) !!}
                                            {!! $errors->first('contact_person_2', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('mobile_2','Mobile:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('mobile_2') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::number('mobile_2', old('mobile_2'), [ 'id'=>'mobile_2','class' => 'form-control','placeholder'=>'Property Owner Number','data-validation-required-message' => 'This field is required']) !!}
                                            {!! $errors->first('mobile_2', '<label class="help-block text-danger">:message</label>') !!}
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
        CKEDITOR.replace('description');
    </script>
    <script>

        $('#imageFile').imageUploader();

        $('.datetimepicker').datetimepicker({
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            format: 'DD-MM-YYYY'
        });

        var basepath = $('#base_url').val();

        $(document).on('change', '#area', function () {
            let id = $(this).val();
            $('#sub_area').empty();
            $('#sub_area').append(new Option('Select Area', 0));

            $.ajax({
                type: 'get',
                url: '{{ route('get.area') }}?area=' + id,
                async: true,
                dataType: 'json',
                success: function (res) {
                    $.each(res.data, function (key, value) {
                        let option = new Option(value, key);
                        $('#sub_area').append(option);
                    })
                },
                complete: function (data) {
                    $("body").css("cursor", "default");
                }
            });
        });

        $(document).on('change', '#city', function () {
            var id = $(this).val();
            if (id == '') {
                return false;
            }
            $("#area").empty();
            $.ajax({
                type: 'get',
                url: basepath + '/ajax-get-area/' + id,
                async: true,
                dataType: 'json',
                beforeSend: function () {
                    $("body").css("cursor", "progress");
                },
                success: function (response) {
                    $.each(response.area, function (key, value) {
                        var option = new Option(value, key);
                        $("#area").append(option);
                    });
                },
                complete: function (data) {
                    $("body").css("cursor", "default");

                }
            });
        });

        $(document).on('click', '#add_btn', function () {
            var property_type = $('#property_type').val();
            if(property_type == ''){
                alert('Please select property type at first');
            }else{
                $.ajax({
                    type: 'get',
                    data:{property_type:property_type},
                    url: basepath + '/ajax-add-listing-variant',
                    async: true,
                    dataType: 'json',
                    beforeSend: function () {
                        $("body").css("cursor", "progress");
                    },
                    success: function (response) {
                        $("#size_parent").append(response.html);

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


        $(document).ready(function () {
            $(".floor_available_select").select2({
                placeholder: "Select Floors",
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
                    if (data == 'A'){
                        $("#p_type").val(data);
                        $(".bathroom_div").css('display','block');
                        $(".bedroom_div").css('display','block');
                        $(".floor_div").css('display','flex');
                        $(".floor_available_div").css('display','flex');
                        $("#size").attr('placeholder','Size In sft');
                    }else if (data == 'B'){
                        $("#p_type").val(data);
                        $(".bathroom_div").css('display','none');
                        $(".bedroom_div").css('display','none');
                        $(".floor_div").css('display','flex');
                        $(".floor_available_div").css('display','flex');
                        $("#size").attr('placeholder','Size In sft');
                    }else if(data == 'C'){
                        $("#p_type").val(data);
                        $(".bathroom_div").css('display','none');
                        $(".bedroom_div").css('display','none');
                        $(".floor_div").css('display','none');
                        $(".floor_available_div").css('display','none');
                        $("#size").attr('placeholder','Size In Katha');
                    }
                }
            });
        });
    </script>
@endpush
