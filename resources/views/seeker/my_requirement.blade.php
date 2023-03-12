@extends('layouts.app')
@section('property-requirements','active')
@push('custom_css')

    <link rel="stylesheet" type="text/css" href="{{asset('/assets/ghp/css/glyphicons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('/assets/css/forms/datepicker/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            float: right;
            margin-left: 0;
            padding-right: 3px;
            border-right: none;
            margin-top: 3px;
        }
        ul.color-hints li {
            display: inline-block;
            font-size: 12px;
            padding-left: 3px;
        }
    </style>
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
    $prop_cond = json_decode($data['row']->F_PROPERTY_CONDITION) ?? [];
} else {
    $prop_cond = [];
}
if (isset($row->F_AREAS) && $row->F_AREAS != '') {
    $old_areas = json_decode($row->F_AREAS);
} else {
    $old_areas = [];
}

$req_ststus = '';
if (isset($data['row'])) {
    if($data['row']->IS_VERIFIED == 0){$req_ststus = 'pending';}
    elseif($data['row']->IS_VERIFIED == 1){$req_ststus = 'valid';}
    elseif($data['row']->IS_VERIFIED == 2){$req_ststus = 'invalid';}
    elseif($data['row']->IS_VERIFIED == 3){$req_ststus = 'updatedbyuser';}
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

                <div class="col-md-3 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>

                <div class="col-sm-12 col-md-9">
                    <div class="requirement">
                        <div class="property-title mb-2">
                          @if (Session::has('success'))
                          <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <b>{{ Session::get('success') }}</b>
                          </div>
                          @endif
                            <h3>Property Requirements <span class="status {{ $req_ststus }}"><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <span class="pull-right">
                                    <ul class="color-hints">
                                        <span class="status"><i class="fa fa-circle "></i></span><li>Empty</li>
                                        <span class="status pending"><i class="fa fa-circle "></i></span><li>Pending</li>
                                        <span class="status valid"><i class="fa fa-circle"></i></span><li>Valid</li>
                                        <span class="status invalid"><i class="fa fa-circle"></i></span><li >Invalid</li>
                                        <span class="status updatedbyuser"><i class="fa fa-circle "></i></span><li>Updated by User</li>
                                    </ul>
                                </span>
                            </h3>
                        </div>
                        {!! Form::open([ 'route' => ['property-requirements.store_or_update'], 'id' => 'requirement_form', 'method' => 'post', 'novalidate', 'autocomplete' => 'off']) !!}

                        <div class="row form-group {!! $errors->has('city') ? 'error' : '' !!}">
                            {{ Form::label('city', 'Select location:', ['class' => 'col-md-4 label-title']) }}
                            <div class="col-md-8">
                                <div class="controls">
                                    {!! Form::select('city', $cities, !empty($row)?$row->F_CITY_NO:old('city'), ['class' => 'select2 form-control', 'id' => 'cities', 'data-validation-required-message' => 'Location is required', 'placeholder' => 'Select city']) !!}
                                    {!! $errors->first('city', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="row form-group {!! $errors->has('area') ? 'error' : '' !!}">
                            {{ Form::label('city', 'Select areas:', ['class' => 'col-md-4 label-title']) }}
                            <div class="col-md-8">
                                <div class="controls">
                                    {!! Form::select('area[]', $data['areas'] ?? [], $old_areas, ['class' => 'select2 form-control', 'id' => 'area', 'data-validation-required-message' => 'Area is required', 'multiple','placeholder' => 'Select are based on city']) !!}
                                    {!! $errors->first('area', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                        <!-- Looking property for -->
                        <div class="row form-group {!! $errors->has('itemCon') ? 'error' : '' !!}">
                            {{ Form::label(null,'Looking property for:',['class' => 'col-md-4 label-title']) }}
                            <div class="col-md-8 property-looking">
                                <div class="controls">
                                    {!! Form::radio('itemCon','sale', !empty($row)?$row->PROPERTY_FOR=='sale'?true:false:old('itemCon'),[ 'id' => 'buy','data-validation-required-message' => 'This field is required']) !!}
                                    {{ Form::label('buy','Buy') }}
                                    {!! Form::radio('itemCon','rent', !empty($row)?$row->PROPERTY_FOR=='rent'?true:false:old('itemCon'),[ 'id' => 'rent','data-validation-required-message' => 'This field is required']) !!}
                                    {{ Form::label('rent','Rent') }}
                                    {!! $errors->first('itemCon', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <!--  property type -->
                        <div class="row form-group {!! $errors->has('property_type') ? 'error' : '' !!}">
                            {{ Form::label('property_type','Property Type:',['class' => 'col-sm-4 label-title']) }}
                            <div class="col-md-8">
                                <div class="controls">
                                    {!! Form::select('property_type', $property_types,!empty($row)?$row->F_PROPERTY_TYPE_NO:null,['id'=>'property-type','class'=>'form-control', 'placeholder'=>'Select property type','data-validation-required-message' => 'This field is required','style="height: 39px;"']) !!}
                                    {!! $errors->first('property_type', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <!-- property size -->
                        <div class="row form-group property-size">
                            {{ Form::label(null,'Property Size (Sqft):',['class' => 'col-sm-4 label-title']) }}
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="property-form {!! $errors->has('minimum_size') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::number('minimum_size', !empty($row)?$row->MIN_SIZE:old('minimum_size'), ['id'=>'minimum_size', 'class' => 'form-control',  'placeholder' => 'Minimum Size','data-validation-required-message' => 'This field is required']) !!}
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
                                                {!! Form::number('maximum_size',!empty($row)?$row->MAX_SIZE:old('maximum_size'), ['id'=>'maximum_size', 'class' => 'form-control',  'placeholder' => 'Maximum Size','data-validation-required-message' => 'This field is required']) !!}
                                                {!! $errors->first('maximum_size', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- property budget -->
                        <div class="row form-group property-size">
                            {{ Form::label(null,'Property Budget (BDT):',['class' => 'col-sm-4 label-title']) }}
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
                                        {!! Form::checkbox('rooms[]','1', !empty($bedrooms)? in_array('1',$bedrooms)?true:false:old('rooms'),[ 'id' => '1bed','class' =>'form-check-input']) !!}
                                        1
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="2bed">
                                        {!! Form::checkbox('rooms[]','2', !empty($bedrooms)? in_array('2',$bedrooms)?true:false:old('rooms'),[ 'id' => '2bed','class' =>'form-check-input']) !!}
                                        2
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="3bed">
                                        {!! Form::checkbox('rooms[]','3', !empty($bedrooms)? in_array('3',$bedrooms)?true:false:old('rooms'),[ 'id' => '3bed','class' =>'form-check-input']) !!}
                                        3
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="4plus">
                                        {!! Form::checkbox('rooms[]','4', !empty($bedrooms)? in_array('4',$bedrooms)?true:false:old('rooms'),[ 'id' => '4plus' ,'class' =>'form-check-input']) !!}
                                        4 +
                                        <span class="checkmark"></span>
                                    </label>
                                    {!! $errors->first('rooms', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
.
                        <!-- Looking property for -->
                        <div class="row form-group property-condition">
                            {{ Form::label(null,'Property Condition (Only Buy):',['class' => 'col-sm-4 label-title']) }}
                            <div class="col-md-8 property-checkbox {!! $errors->has('condition') ? 'error' : '' !!}">
                                <div class="controls">
                                    @foreach($data['cond'] as $key => $cond)
                                        <label for="{{ str_replace(' ', '-', strtolower($cond)) }}">
                                            {!! Form::checkbox('condition[]', $key . ',' . $cond, !empty($bedrooms)? in_array($key, $prop_cond) : old('condition'),[ 'id' => str_replace(' ', '-', strtolower($cond)) ,'class' =>'form-check-input']) !!}
                                            {{ $cond }}
                                            <span class="checkmark"></span>
                                        </label>
                                    @endforeach
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
                                        {!! Form::text('time', !empty($row)?$row->PREP_CONT_TIME:old('time'), ['id'=>'time', 'class' => 'form-control',  'data-validation-required-message' => 'This field is required']) !!}
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


                        <div class="city-location">
                            {{--                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"--}}
                            {{--                                 aria-hidden="true">--}}
                            {{--                                <div class="modal-dialog">--}}
                            {{--                                    <div class="modal-content">--}}
                            {{--                                        <div class="modal-header">--}}
                            {{--                                            <h5 class="modal-title" id="exampleModalLabel">--}}
                            {{--                                                Select City or Division | <a href="#">All of Bangladesh</a>--}}
                            {{--                                            </h5>--}}
                            {{--                                            <button type="button" class="close done_button" data-dismiss="modal" aria-label="Close">--}}
                            {{--                                                <span aria-hidden="true">&times;</span>--}}
                            {{--                                            </button>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="modal-body">--}}
                            {{--                                            <div class="row">--}}
                            {{--                                                <div class="col-12">--}}
                            {{--                                                    <div class="nav modalcategory flex-column nav-pills"--}}
                            {{--                                                         id="v-pills-tab" role="tablist" aria-orientation="vertical">--}}

                            {{--                                                        <div class="city_title">--}}
                            {{--                                                            <h3><i class="fa fa-tags"></i>Cities</h3>--}}
                            {{--                                                        </div>--}}
                            {{--                                                        @foreach($cities as $item)--}}
                            {{--                                                            <a class="nav-link city_id" id="v-pills-dhaka-tab"--}}
                            {{--                                                               data-toggle="pill" data-id="{{$item->id}}"--}}
                            {{--                                                               href="#v-pills-{{$item->id}}" role="tab"--}}
                            {{--                                                               aria-controls="v-pills-dhaka"--}}
                            {{--                                                               aria-selected="true">{{$item->CITY_NAME}}<i--}}
                            {{--                                                                    class="fa fa-angle-right float-right"></i></a>--}}
                            {{--                                                        @endforeach--}}
                            {{--                                                    </div>--}}
                            {{--                                                </div>--}}

                            {{--                                                <div class="col-12">--}}
                            {{--                                                    <div class="tab-content modalsubcategory" id="v-pills-tabContent">--}}
                            {{--                                                        <div class="backcategory">--}}
                            {{--                                                            <h4><i class="fa fa-long-arrow-left"></i>Back</h4>--}}
                            {{--                                                        </div>--}}
                            {{--                                                        <div id="show_area">--}}
                            {{--                                                            <div class="tab-pane fade show" id="v-pills-1"--}}
                            {{--                                                                 role="tabpanel" aria-labelledby="v-pills-dhaka-tab">--}}
                            {{--                                                                <div class="city-wrap">--}}
                            {{--                                                                    <div class="city-list">--}}
                            {{--                                                                        <h3><i class="fa fa-map-marker"></i><span--}}
                            {{--                                                                                id="city_title"></span></h3>--}}
                            {{--                                                                        <select class="select2 form-control" data-validation- multiple--}}
                            {{--                                                                                name="area[]" id="area">--}}

                            {{--                                                                        </select>--}}
                            {{--                                                                        --}}{{--                                                                        {!! Form::select('area', [],null,array('id' =>'area', 'class'=>'select2 form-control', 'placeholder'=>'Select Area','data-validation-required-message' => 'This field is required')) !!}--}}
                            {{--                                                                    </div>--}}
                            {{--                                                                </div>--}}
                            {{--                                                            </div>--}}
                            {{--                                                        </div>--}}
                            {{--                                                    </div>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="modal-footer" style="border-top: unset">--}}
                            {{--                                            <button type="button" id="done_button" class="btn btn-primary done_button" data-dismiss="modal" aria-label="Done">Done</button>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
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
    <script src="{{asset('/assets/js/forms/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('/assets/js/forms/datepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <script>


        //ck editor
        $('#time').datetimepicker({
            format: 'hh:mm',
        })
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

        let max_size = $("#maximum_size");
        let min_size = $("#minimum_size");

        let max_budget = $("#maximum_budget");
        let min_budget = $("#minimum_budget");

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

        // $('#requirement_form').submit(function (e) {
        //     e.preventDefault();
        //     if ($('#area').val().length && $('#f_city_id').val()) {
        //         $('#requirement_form').submit();
        //     } else {
        //         toastr.error('Location is required')
        //     }
        // });


        $('.select2').select2();
    </script>
@endpush
