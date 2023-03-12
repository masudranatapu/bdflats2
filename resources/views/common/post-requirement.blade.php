@extends('layouts.app')
@section('property-requirements','active')
@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('/assets/css/forms/datepicker/bootstrap-datetimepicker.min.css')}}">
@endpush

<?php
$property_types = $data['property_type'] ?? [];
$row = $data['row'] ?? [];
$cities = $data['city'] ?? [];

if (!empty($data['row']->BEDROOM)) {
    $bedrooms = json_decode($data['row']->BEDROOM) ?? [];
} else {
    $bedrooms = [];
}

if (!empty($data['row']->PROPERTY_CONDITION)) {
    $prop_cond = json_decode($data['row']->PROPERTY_CONDITION) ?? [];
} else {
    $prop_cond = [];
}

?>

@section('content')
    <!--
     ============   dashboard   ============
 -->
    <div class="dashboard-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="requirement">
                        <div class="property-title mb-2">
                            <h3>Post Property Requirements</h3>
                        </div>
                        {!! Form::open([ 'route' => ['store-requirement'], 'id' => 'requirement_form', 'method' => 'post', 'novalidate', 'autocomplete' => 'off']) !!}

                        {!! Form::hidden('f_city_id',1,[ 'id' => 'f_city_id','data-validation-required-message' => 'This field is required']) !!}
                        {!! Form::hidden('f_area_id',null,[ 'id' => 'f_area_id','data-validation-required-message' => 'This field is required']) !!}


                        <div class="row form-group {!! $errors->has('f_city_id') ? 'error' : '' !!}">
                            {{ Form::label('city', 'Select location:', ['class' => 'col-md-4 label-title']) }}
                            <div class="col-md-8" style="margin-left: -5px">
                                <div class="controls">
                                    {!! Form::select('city', $cities, null, ['class' => 'form-control', 'id' => 'cities', 'data-validation-required-message' => 'Location is required']) !!}
                                    {!! $errors->first('f_city_id', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="row form-group {!! $errors->has('f_area_id') ? 'error' : '' !!}">
                            {{ Form::label('city', 'Select areas:', ['class' => 'col-md-4 label-title']) }}
                            <div class="col-md-8" style="margin-left: -5px">
                                <div class="controls">
                                    {!! Form::select('area[]', $data['areas'] ?? [], null, ['class' => 'select2 form-control', 'id' => 'area', 'data-validation-required-message' => 'Area is required', 'multiple']) !!}
                                    {!! $errors->first('f_area_id', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                        <!-- Looking property for -->
                        <div class="row form-group {!! $errors->has('area') ? 'error' : '' !!}">
                            {{ Form::label(null,'Looking property for:',['class' => 'col-md-4 label-title']) }}
                            <div class="col-md-8 property-looking" style="margin-left: -6px">
                                <div class="controls">
                                    {!! Form::radio('itemCon','buy', !empty($row)?$row->PROPERTY_FOR=='buy'?true:false:old('itemCon'),[ 'id' => 'buy','data-validation-required-message' => 'This field is required']) !!}
                                    {{ Form::label('buy','Buy') }}
                                    {!! Form::radio('itemCon','rent', !empty($row)?$row->PROPERTY_FOR=='rent'?true:false:old('itemCon'),[ 'id' => 'rent','data-validation-required-message' => 'This field is required']) !!}
                                    {{ Form::label('rent','Rent') }}
                                    {!! $errors->first('itemCon', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <!--  property type -->
                        <div class="row form-group property-type {!! $errors->has('property_type') ? 'error' : '' !!}">
                            {{ Form::label('property_type','Property Type:',['class' => 'col-sm-4 label-title']) }}
                            <div class="col-md-8" style="margin-left: -6px; padding-right: 0">
                                <div class="controls">
                                    {!! Form::select('property_type', $property_types,!empty($row)?$row->F_PROPERTY_TYPE_NO:null,['id'=>'property-type','class'=>'form-control', 'placeholder'=>'Select property type','data-validation-required-message' => 'This field is required']) !!}
                                    {!! $errors->first('property_type', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <!-- property size -->
                        <div class="row form-group property-size">
                            {{ Form::label(null,'Property Size:',['class' => 'col-sm-4 label-title']) }}
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="property-form {!! $errors->has('minimum_size') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::number('minimum_size', old('minimum_size'), ['id'=>'minimum_size','max'=>'', 'data-validation-max-message'=>'Minimum Size may not be greater than Maximum Size', 'class' => 'form-control',  'placeholder' => 'Minimum Size','data-validation-required-message' => 'This field is required']) !!}
                                                {!! $errors->first('minimum_size', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="size-middle text-center">
                                            <span>To</span>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="property-form {!! $errors->has('maximum_size') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::number('maximum_size', old('maximum_size'), ['id'=>'maximum_size', 'class' => 'form-control',  'placeholder' => 'Maximum Size','data-validation-required-message' => 'This field is required']) !!}
                                                {!! $errors->first('maximum_size', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- property budget -->
                        <div class="row form-group property-size">
                            {{ Form::label(null,'Property Budget:',['class' => 'col-sm-4 label-title']) }}
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="property-form">
                                            <div class="controls">
                                                {!! Form::number('minimum_budget',!empty($row)?$row->MIN_BUDGET:old('minimum_budget'), ['id'=>'minimum_budget','max'=>'', 'data-validation-max-message'=>'Minimum Budget may not be greater than Maximum Budget', 'class' => 'form-control',  'placeholder' => 'Minimum Budget','data-validation-required-message' => 'This field is required']) !!}
                                                {!! $errors->first('minimum_budget', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="size-middle text-center">
                                            <span>To</span>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="property-form">
                                            <div class="controls">
                                                {!! Form::number('maximum_budget', !empty($row)?$row->MAX_BUDGET:old('maximum_budget'), ['id'=>'maximum_budget', 'class' => 'form-control',  'placeholder' => 'Maximum Budget','data-validation-required-message' => 'This field is required']) !!}
                                                {!! $errors->first('maximum_budget', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bedroom  -->
                        <div class="row bedroom-select">
                            <div class="col-md-4">
                                <h4>Bedroom</h4>
                            </div>
                            <div class="col-md-8 {!! $errors->has('rooms') ? 'error' : '' !!}">
                                <div class="controls">
                                    <label for="any">
                                        {!! Form::checkbox('rooms[]','any',!empty($bedrooms)? in_array('any',$bedrooms)?true:false:old('rooms'),[ 'id' => 'any','class' =>'form-check-input']) !!}
                                        Any
                                        <span class="checkmark"></span>
                                    </label>

                                    <label for="1bed">
                                        {!! Form::checkbox('rooms[]','1bed', !empty($bedrooms)? in_array('1bed',$bedrooms)?true:false:old('rooms'),[ 'id' => '1bed','class' =>'form-check-input']) !!}
                                        1
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="2bed">
                                        {!! Form::checkbox('rooms[]','2bed', !empty($bedrooms)? in_array('2bed',$bedrooms)?true:false:old('rooms'),[ 'id' => '2bed','class' =>'form-check-input']) !!}
                                        2
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="3bed">
                                        {!! Form::checkbox('rooms[]','3bed', !empty($bedrooms)? in_array('3bed',$bedrooms)?true:false:old('rooms'),[ 'id' => '3bed','class' =>'form-check-input']) !!}
                                        3
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="4plus">
                                        {!! Form::checkbox('rooms[]','4plus', !empty($bedrooms)? in_array('4plus',$bedrooms)?true:false:old('rooms'),[ 'id' => '4plus' ,'class' =>'form-check-input']) !!}
                                        4 +
                                        <span class="checkmark"></span>
                                    </label>
                                    {!! $errors->first('rooms', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <!-- Looking property for -->
                        <div class="row form-group property-condition">
                            {{ Form::label(null,'Property Condition (Only Buy):',['class' => 'col-sm-4 label-title']) }}
                            <div class="col-md-8 property-checkbox {!! $errors->has('condition') ? 'error' : '' !!}">
                                <div class="controls">
                                    <label for="ready">
                                        {!! Form::checkbox('condition[]','ready', !empty($bedrooms)? in_array('ready',$prop_cond)?true:false:old('condition'),[ 'id' => 'ready' ,'class' =>'form-check-input']) !!}
                                        Ready
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="semi">
                                        {!! Form::checkbox('condition[]','semi', !empty($bedrooms)? in_array('semi',$prop_cond)?true:false:old('condition'),[ 'id' => 'semi' ,'class' =>'form-check-input']) !!}
                                        Semi Ready
                                        <span class="checkmark"></span>
                                    </label>

                                    <label for="ongoing">
                                        {!! Form::checkbox('condition[]','ongoing', !empty($bedrooms)? in_array('ongoing',$prop_cond)?true:false:old('condition'),[ 'id' => 'ongoing' ,'class' =>'form-check-input']) !!}
                                        Ongoing
                                        <span class="checkmark"></span>
                                    </label>

                                    <label for="used">
                                        {!! Form::checkbox('condition[]','used', !empty($bedrooms)? in_array('used',$prop_cond)?true:false:old('condition'),[ 'id' => 'used' ,'class' =>'form-check-input']) !!}
                                        Used
                                        <span class="checkmark"></span>
                                    </label>
                                    {!! $errors->first('condition', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <!-- requirement details -->
                        <div class="row form-group requirement-detail">
                            {{ Form::label(null,'Requirement Details',['class' => 'col-sm-4 label-title']) }}
                            <div class="col-md-8">
                                <div class="controls">
                                    {!! Form::textarea('requirement_details', !empty($row)?$row->REQUIREMENT_DETAILS:old('requirement_details'), ['rows'=>'6', 'maxlength'=>'1000', 'data-validation-maxlength-message'=>'Requirement Details may not be greater than 1000 characters', 'id'=>'requirement_details','class' => 'form-control', 'placeholder' => 'Type Here']) !!}
                                    {!! $errors->first('requirement_details', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <!-- preferred time -->
                        <div class="row form-group perferred-time">
                            <label class="col-md-4 label-title">Preferred time to contact:</label>
                            <div class="col-md-8">
                                <div class="size-form {!! $errors->has('time') ? 'error' : '' !!}">
                                    <div class="controls">
                                        {!! Form::time('time', !empty($row)?$row->PREP_CONT_TIME:old('time'), ['id'=>'time', 'class' => 'form-control',  'data-validation-required-message' => 'This field is required']) !!}
                                        {!! $errors->first('time', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- email alert -->
                        <div class="row form-group email-alert">
                            <label class="col-md-4 label-title">Email Alert</label>
                            <div class="col-md-8 {!! $errors->has('alert') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::radio('alert','daily',!empty($row)? $row->EMAIL_ALERT=='daily'?true:false:old('alert'),[ 'id' => 'daily','data-validation-required-message' => 'This field is required']) !!}
                                    {{ Form::label('daily','Daily') }}

                                    {!! Form::radio('alert','weekly', !empty($row)? $row->EMAIL_ALERT=='weekly'?true:false:old('alert'),[ 'id' => 'weekly','data-validation-required-message' => 'This field is required']) !!}
                                    {{ Form::label('weekly','Weekly') }}

                                    {!! Form::radio('alert','monthly', !empty($row)? $row->EMAIL_ALERT=='monthly'?true:false:old('alert'),[ 'id' => 'monthly','data-validation-required-message' => 'This field is required']) !!}
                                    {{ Form::label('monthly','Monthly') }}
                                    {!! $errors->first('alert', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                            <div class="row form-group" style="box-shadow: inset 0 20px 20px rgb(255 255 255 / 57%);background: #f9f3f4; margin-bottom: 0; padding-bottom: 20px; padding-top: 20px">
                                <label for="email" class="col-md-4 label-title">Email</label>
                                <div class="col-md-4 {!! $errors->has('email') ? 'error' : '' !!}">
                                    <div class="controls">
                                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Email Address']) !!}
                                        {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group" style="box-shadow: inset 0 -20px 20px rgb(255 255 255 / 57%); padding-bottom: 20px; background: #f9f3f4">
                                <label for="password" class="col-md-4 label-title">Password</label>
                                <div class="col-md-4 {!! $errors->has('password') ? 'error' : '' !!}">
                                    <div class="controls">
                                        {!! Form::password('password', ['class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Password', 'minlength' => 6, 'data-validation-minlength-message' => 'Password must be a minimum of 6 characters']) !!}
                                        {!! $errors->first('password', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>

                        <div class="submit_btn">
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-8">
                                    {{--                                        <input type="submit" name="submit" value="Submit">--}}
                                    {!! Form::submit('submit', ['id'=>'submit']) !!}
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>

            </div><!-- row -->
        </div><!-- container -->
    </div>

@endsection

@push('custom_js')
    <script src="{{asset('/assets/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('/assets/js/forms/validation/form-validation.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        //ck editor
        CKEDITOR.replace('requirement_details');
    </script>
    <script>
        $('.done_button').on('click', function () {
            let area = $('#area').val();
            if (area.length) {
                $('#area_selected').val(area.length);
                $('#location-error').hide(100);
            } else {
                $('#area_selected').val('')
                $('#location-error').show(100);
            }
        });
    </script>
    <script>
        var base_url = $('#base_url').val();
        $("#any").on('click', function () {
            if ($(this).prop("checked") == true) {
                $("#1bed").prop("checked", false);
                $("#1bed").attr("disabled", true);

                $("#2bed").prop("checked", false);
                $("#2bed").attr("disabled", true);

                $("#3bed").prop("checked", false);
                $("#3bed").attr("disabled", true);

                $("#4plus").prop("checked", false);
                $("#4plus").attr("disabled", true);
            } else {
                $("#1bed").attr("disabled", false);
                $("#2bed").attr("disabled", false);
                $("#3bed").attr("disabled", false);
                $("#4plus").attr("disabled", false);
            }

        });

        var max_size = $("#maximum_size");
        var min_size = $("#minimum_size");

        var max_budget = $("#maximum_budget");
        var min_budget = $("#minimum_budget");

        $(document).ready(function () {
            min_size.attr('max', max_size.val());
            min_budget.attr('max', max_budget.val());
        });


        min_size.on('keyup', function () {
            max_size.val('');
            min_size.attr('max', max_size.val());
        });

        min_budget.on('keyup', function () {
            max_budget.val('');
            min_budget.attr('max', max_budget.val());
        });

        $("#cities").on("change", function () {
            let dis = $(this);
            $("#f_city_id").val(dis.val());
            let area = $('#area');
            area.empty();
            $('.select2').select2();

            $.ajax({
                url: "property-requirements/get_area/" + dis.val(),
                method: "GET",
                success: function (data) {
                    if (data.status == 'success') {
                        $.each(data.html, function (key, value) {
                            let option = new Option(value, key);
                            area.append(option);
                        });
                    } else {
                        alert('Something wrong');
                    }
                }
            });
        });

        $(".city_id").on('click', function () {
            var id = $(this).data('id');
            $("#f_city_id").val(id);
            $(".city_id").removeClass('active');
            $(this).addClass('active');

            $("#show_cityArea").text($(this).text());
            $.ajax({
                url: "property-requirements/get_area/" + id,
                method: 'GET',
                success: function (data) {
                    $("#area_title").css('display', 'block');
                    $("#show_areas").html(data.html);
                }
            });
        });

        $("#all_bd").on('click', function () {
            $("#show_cityArea").text('Select location / City');
        });

        $(document).on("click", ".area_select", function (event) {
            var old_text = $("#show_cityArea").text();
            $("#show_cityArea").text(old_text + ' > ' + $(this).text());
            $(this).addClass('active');
            $("#f_area_id").val($(this).data('id'));
            $(".close").trigger("click");
        });
    </script>

    <script>
        // modal control
        $(document).on('click', '.modalcategory .nav-link', function () {
            var id = $(this).data('id');
            $('.modalcategory').hide();
            $('.modalsubcategory').show();
            $('.backcategory').show();
            $('#city_title').text($(this).text());
            $("#area").empty();
            $('.select2').select2();

            $.ajax({
                type: 'GET',
                headers: {},
                data: {},
                url: base_url + "/property-requirements/get_area/" + id,
                async: true,
                beforeSend: function () {
                    $("body").css("cursor", "progress");
                },
                success: function (data) {
                    if (data.status == 'success') {
                        $.each(data.html, function (key, value) {
                            var option = new Option(value, key);
                            $("#area").append(option);
                        });
                    } else {
                        alert('Something wrong');
                    }
                },
                complete: function (data) {

                    $("body").css("cursor", "default");


                }
            });


        });

        $(document).on('click', '.backcategory', function () {
            $('.select2').select2();
            // $('.fstChoiceRemove').trigger('click');
            $('.modalsubcategory').hide();
            $('.modalcategory').show();
        });


        $('.select2').select2();
    </script>
@endpush
