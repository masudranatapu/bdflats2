@extends('admin.layouts.master')

@section('Property Seekers','menu-open')
@section('seeker_list','active')

@section('title')Edit Property Seeker @endsection
@section('page-name')Edit Property Seeker @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Edit Property Seeker</li>
@endsection

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/custom/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/datepicker/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
    <style>
		.switch{position:relative;display:inline-block;width:46px;height:28px}
		.switch input{opacity:0;width:0;height:0}
		.slider{position:absolute;cursor:pointer;top:0;left:0;right:0;bottom:0;background-color:#ccc;-webkit-transition:.4s;transition:.4s}
		.slider:before{position:absolute;content:"";height:22px;width:22px;left:2px;bottom:3px;background-color:#fff;-webkit-transition:.4s;transition:.4s}input:checked+.slider{background-color:#4fd460}input:focus+.slider{box-shadow:0 0 1px #4fd460}input:checked+.slider:before{-webkit-transform:translateX(20px);-ms-transform:translateX(26px)}
		.slider.round{border-radius:24px}
		.slider.round:before{border-radius:50%}
		.select2-container--default .select2-selection--multiple .select2-selection__choice__remove{padding:0 0!important;left:-6px!important}
		.select2-container--default .select2-selection--multiple .select2-selection__choice{margin-bottom:3px!important}
		.select2-container .select2-selection--multiple .select2-selection__rendered{margin-bottom:0!important}
		.bedroom-select input[type=checkbox]{display:none}
		.bedroom-select label{font-size:14px;color:#555;position:relative;padding:0 17px 0 23px;cursor:pointer}
		.bedroom-select .checkmark{display:inline-block;width:15px;height:15px;background:#fff;border:2px solid #d9d7d7;position:absolute;left:0;top:0;border-radius:2px;transition:all .1s}
		.bedroom-select input:checked+.checkmark:after{content:"";position:absolute;height:7px;width:14px;border-left:3px solid #666ee8;border-bottom:3px solid #666ee8;top:-1px;left:1px;transform:rotate(-45deg)}
		.email-alert input[type=radio]{display:none}
		.email-alert input[type=radio]+label{font-size:14px;padding:0 17px 0 18px;position:relative;cursor:pointer}
		.email-alert input[type=radio]+label:after,.email-alert input[type=radio]+label:before{position:absolute;top:0;left:0;content:"";width:14px;height:14px;border-radius:50%;display:inline-block;background-color:transparent}
		.email-alert input[type=radio]+label:before{border:2px solid #666ee8}
		.email-alert input[type=radio]:checked+label:after{border:5px solid #666ee8}
		/* .row {align-items: baseline;} */
		.show_img{height:82px;width:82px;object-fit:cover}
		.del_img{background:#bbb;padding:2px 7px;border-radius:77px;font-weight:700;color:#000;position:absolute;top:5px;right:20px}.del_btn{border-radius:75%;height:26px;width:26px;position:absolute;right:-8px;top:8px}
		.select2{width:100%!important}
		a.ui-state-default{background-color:red!important}
		.ctm{min-width: 140px; display: inline-block;}
</style>

@endpush

@push('custom_js')
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>

@endpush

@php
	$property_types = $data['property_types'] ?? [];
	$user 			= $data['user'];
    $cities         = $data['city'] ?? [];
    $row            = $data['row'] ?? [];
    $user_status    = \Config::get('static_array.user_status');

    if (!empty($row->bedroom)) {
        $bedrooms = json_decode($row->bedroom) ?? [];
    } else {
        $bedrooms = [];
    }

    if (!empty($row->f_property_condition)) {
        $prop_cond = json_decode($row->f_property_condition) ?? [];
    } else {
        $prop_cond = [];
    }
    $tabIndex = 0;
    $areas = $data['areas'] ?? [];

@endphp


@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Seeker Edit') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Seeker Edit') }}</li>
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
                            <h5 class="m-0">{{ __('Seeker Edit list') }}</h5>
                            <span class="float-right">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-primary">All Users</a>
                                <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary">+ Create
                                    Role</a>
                            </span>
                        </div>

                        <div class="card-body">
                            {!! Form::open([ 'route' => 'admin.seeker.update', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}

                            {!! Form::hidden('pk_no', $row->id ?? null) !!}
                            {!! Form::hidden('user_id', $user->id ?? null) !!}

                            <div class="form-body">
                                <h2 class="mb-2">Seeker Information</h2>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>User ID: <strong>{{$user->code}}</strong></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Created Date: <strong>{{date('M d, Y',strtotime($user->created_at))}}</strong></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Name:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::text('name', $user->name ?? old('name'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Name', 'tabIndex' => ++$tabIndex]) !!}
                                                {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Email:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('email') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::text('email',$user->email ?? old('email'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Email', 'tabIndex' => ++$tabIndex]) !!}
                                                {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Address:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('address') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::text('address', $user->address ?? old('address'), [ 'class' => 'form-control', 'placeholder' => 'Address', 'tabIndex' => ++$tabIndex]) !!}
                                                {!! $errors->first('address', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Mobile:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('mobile') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::text('mobile', $user->mobile_no ?? old('address'), [ 'class' => 'form-control', 'placeholder' => 'Mobile Number', 'tabIndex' => ++$tabIndex]) !!}
                                                {!! $errors->first('mobile', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h2 class="mb-2 mt-2">Property Requirements</h2>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>City/Division:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('city') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::select('city', $cities, $row->f_city_no ?? null,['class'=>'form-control select2','id'=>'cities', 'placeholder'=>'Select Area','data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex]) !!}
                                                {!! $errors->first('city', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Area (Based on City):</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {!! $errors->has('area') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::select('area[]', $areas ?? [], json_decode($row->f_areas ?? null),array('class'=>'form-control select2','id' => 'area','data-validation-required-message' => 'This field is required', 'multiple', 'tabIndex' => ++$tabIndex)) !!}
                                                {!! $errors->first('area', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Looking Property For:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {!! $errors->has('itemCon') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::radio('itemCon','sale', !empty($row)?$row->property_for=='sale'?true:false:old('itemCon'),[ 'id' => 'sell','data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex]) !!}
                                                {{ Form::label('sell','Buy') }}
                                                &emsp;
                                                {!! Form::radio('itemCon','rent', !empty($row)?$row->property_for=='rent'?true:false:old('itemCon'),[ 'id' => 'roommate', 'tabIndex' => ++$tabIndex]) !!}
                                                {{ Form::label('roommate','Rent') }}

                                                {!! $errors->first('itemCon', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Property Type:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('property_type') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::select('property_type', $property_types,!empty($row)?$row->f_property_type_no:null,['id'=>'property-type','class'=>'form-control', 'placeholder'=>'Select property type','data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex]) !!}
                                                {!! $errors->first('property_type', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Property Size (Sqft):</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('minimum_size') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::number('minimum_size', !empty($row)?$row->min_size:old('minimum_size'), ['id'=>'minimum_size', 'class' => 'form-control',  'placeholder' => 'Minimum Size','data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex]) !!}
                                                {!! $errors->first('minimum_size', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    To
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('maximum_size') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::number('maximum_size',!empty($row)?$row->max_size:old('maximum_size'), ['id'=>'maximum_size', 'class' => 'form-control',  'placeholder' => 'Maximum Size','data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex]) !!}
                                                {!! $errors->first('maximum_size', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Property Budget (BDT):</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('minimum_budget') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::number('minimum_budget',!empty($row)?$row->min_budget:old('minimum_budget'), ['id'=>'minimum_budget','max'=>'', 'data-validation-max-message'=>'Minimum Budget may not be greater than Maximum Budget', 'tabIndex' => ++$tabIndex, 'class' => 'form-control',  'placeholder' => 'Minimum Budget','data-validation-required-message' => 'This field is required']) !!}
                                                {!! $errors->first('minimum_budget', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    To
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('maximum_budget') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::number('maximum_budget', !empty($row)?$row->max_budget:old('maximum_budget'), ['id'=>'maximum_budget', 'class' => 'form-control',  'placeholder' => 'Maximum Budget','data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex]) !!}
                                                {!! $errors->first('maximum_budget', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row bedroom-select">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <h6>Bedroom:</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group {!! $errors->has('minimum_budget') ? 'error' : '' !!}">
                                            <div class="controls">
                                                <label for="any">
                                                    {!! Form::checkbox('rooms[]','any',!empty($bedrooms)? in_array('any',$bedrooms)?true:false:old('rooms'),[ 'id' => 'any','class' =>'form-check-input', 'tabIndex' => ++$tabIndex]) !!}
                                                    Any
                                                    <span class="checkmark"></span>
                                                </label>

                                                <label for="1bed">
                                                    {!! Form::checkbox('rooms[]','1', !empty($bedrooms)? in_array('1',$bedrooms)?true:false:old('rooms'),[ 'id' => '1bed','class' =>'form-check-input', 'tabIndex' => ++$tabIndex]) !!}
                                                    1
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label for="2bed">
                                                    {!! Form::checkbox('rooms[]','2', !empty($bedrooms)? in_array('2',$bedrooms)?true:false:old('rooms'),[ 'id' => '2bed','class' =>'form-check-input', 'tabIndex' => ++$tabIndex]) !!}
                                                    2
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label for="3bed">
                                                    {!! Form::checkbox('rooms[]','3', !empty($bedrooms)? in_array('3',$bedrooms)?true:false:old('rooms'),[ 'id' => '3bed','class' =>'form-check-input', 'tabIndex' => ++$tabIndex]) !!}
                                                    3
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label for="4plus">
                                                    {!! Form::checkbox('rooms[]','4', !empty($bedrooms)? in_array('4',$bedrooms)?true:false:old('rooms'),[ 'id' => '4plus' ,'class' =>'form-check-input', 'tabIndex' => ++$tabIndex]) !!}
                                                    4 +
                                                    <span class="checkmark"></span>
                                                </label>
                                                {!! $errors->first('rooms', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row bedroom-select">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <h6>Property Condition (Only Buy):</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
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
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Requirement Details:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {!! $errors->has('requirement_details') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::textarea('requirement_details', !empty($row)?$row->requirement_details:old('requirement_details'), ['rows'=>'6', 'maxlength'=>'1000', 'data-validation-maxlength-message'=>'Requirement Details may not be greater than 1000 characters', 'id'=>'requirement_details','class' => 'form-control', 'placeholder' => 'Type Here', 'tabIndex' => ++$tabIndex]) !!}
                                                {!! $errors->first('requirement_details', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Preferred Time to Contact:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('time') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::text('time', !empty($row)?$row->prep_cont_time:old('time'), ['id'=>'time', 'class' => 'form-control datetimepicker',  'data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex]) !!}
                                                {!! $errors->first('time', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Sharing Permission (Max):</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                {!! Form::number('max_sharing_permission', !empty($row)?$row->max_sharing_permission:old('max_sharing_permission'), ['id'=>'max_sharing_permission', 'class' => 'form-control',  'data-validation-required-message' => 'This field is required', 'placeholder' => 'Max Sharing Permission', 'tabIndex' => ++$tabIndex]) !!}
                                                {!! $errors->first('max_sharing_permission', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Lead Price:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                {!! Form::number('lead_price', !empty($row)?$row->lead_price :old('lead_price'), ['id'=>'lead_price', 'class' => 'form-control',  'data-validation-required-message' => 'This field is required', 'placeholder' => 'Max Sharing Permission', 'tabIndex' => ++$tabIndex]) !!}
                                                {!! $errors->first('lead_price', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row email-alert">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Email Alert:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::radio('alert','daily',!empty($row)? $row->email_alert=='daily'?true:false:old('alert'),[ 'id' => 'daily','data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex]) !!}
                                                {{ Form::label('daily','Daily') }}

                                                {!! Form::radio('alert','weekly', !empty($row)? $row->email_alert=='weekly'?true:false:old('alert'),[ 'id' => 'weekly','data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex]) !!}
                                                {{ Form::label('weekly','Weekly') }}

                                                {!! Form::radio('alert','monthly', !empty($row)? $row->email_alert=='monthly'?true:false:old('alert'),[ 'id' => 'monthly','data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex]) !!}
                                                {{ Form::label('monthly','Monthly') }}
                                                {!! $errors->first('alert', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row email-alert">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Verification Status:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group {!! $errors->has('v_status') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::radio('v_status','0', !empty($row)? $row->is_verified==0?true:false:old('alert'),[ 'id' => 'pending','data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex]) !!}
                                                {{ Form::label('pending','Pending') }}
                                                {!! Form::radio('v_status','1',!empty($row)? $row->is_verified==1?true:false:old('alert'),[ 'id' => 'verified','data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex]) !!}
                                                {{ Form::label('verified','Valid') }}
                                                {!! Form::radio('v_status','2', !empty($row)? $row->is_verified==2?true:false:old('alert'),[ 'id' => 'invalid','data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex]) !!}
                                                {{ Form::label('invalid','Invalid') }}

                                                 {!! Form::radio('v_status','3', !empty($row)? $row->is_verified==3?true:false:old('alert'),[ 'id' => 'updated','data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex]) !!}
                                                {{ Form::label('updated','Updated by Seeker') }}

                                                {!! $errors->first('alert', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Account Status:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('acc_status') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::select('acc_status', $user_status, $user->status ?? null,['class'=>'form-control','id'=>'acc_status', 'placeholder'=>'Select','data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex]) !!}
                                                {!! $errors->first('acc_status', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-actions mt-10 mb-3 ml-2 text-left">
                                    <a href="{{route('admin.seeker.list')}}">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="ft-x"></i> Cancel
                                        </button>
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Save
                                    </button>
                                </div>
                            </div>

                            {!! Form::close() !!}
                        </div>

                        <div class="card-body">
                            {!! Form::open([ 'route' => 'admin.listing_lead_price.update', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                            <div class="form-body">
                                <h2 class="mb-2 mt-2">Send Force Lead</h2>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Owner Type:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::radio('property_for','individual', old('property_for'),[ 'id' => 'individual','data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex]) !!}
                                                {{ Form::label('individual','Individual') }}
                                                &emsp;
                                                {!! Form::radio('property_for','developer', old('property_for'),[ 'id' => 'developer', 'tabIndex' => ++$tabIndex]) !!}
                                                {{ Form::label('developer','Developer') }}
                                                &emsp;
                                                {!! Form::radio('property_for','agency', old('property_for'),[ 'id' => 'agency', 'tabIndex' => ++$tabIndex]) !!}
                                                {{ Form::label('agency','Agency') }}

                                                {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Select Owner:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::select('area', [],null,array('class'=>'form-control', 'placeholder'=>'Search & Select','data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex)) !!}
                                                {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="la la-paper-plane"></i> Send
                                        </button>
                                    </div>
                                </div>
                            </div>
                              {!! Form::close() !!}
                        </div>

                        <div class="card-body">
                            <h2 class="mb-2 mt-2">Mobile Number Viewed</h2>
                            <div class="table-responsive ">
                                <table class="table table-striped table-bordered table-sm text-center">
                                    <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>User Type</th>
                                        <th>Property ID</th>
                                        <th>Property For</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Payment</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <span>10001</span>
                                        </td>
                                        <td>
                                            <span>Agent</span>
                                        </td>
                                        <td>
                                            <span>10001</span>
                                        </td>
                                        <td>
                                            <span>Sale</span>
                                        </td>
                                        <td>
                                            <span>Property Titles</span>
                                        </td>
                                        <td>
                                            <span>Oct 12, 2020</span>
                                        </td>
                                        <td>
                                            <span class="text-success">Paid</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span>10001</span>
                                        </td>
                                        <td>
                                            <span>Agent</span>
                                        </td>
                                        <td>
                                            <span>10002</span>
                                        </td>
                                        <td>
                                            <span>Rent</span>
                                        </td>
                                        <td>
                                            <span>Property Titles</span>
                                        </td>
                                        <td>
                                            <span>Oct 12, 2020</span>
                                        </td>
                                        <td>
                                            <span class="text-danger">Pending</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <h2 class="mb-2 mt-2">Lead Purchased</h2>
                            <div class="table-responsive ">
                                <table class="table table-striped table-bordered table-sm text-center">
                                    <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>User Type</th>
                                        <th>User Name</th>
                                        <th>Date</th>
                                        <th>Payment Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <span>10001</span>
                                        </td>
                                        <td>
                                            <span>Owner</span>
                                        </td>
                                        <td>
                                            <span>Md Eusuf</span>
                                        </td>
                                        <td>
                                            <span>Oct 12, 2020</span>
                                        </td>
                                        <td>
                                            <span class="text-success">Paid</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <span>10001</span>
                                        </td>
                                        <td>
                                            <span>Builder</span>
                                        </td>
                                        <td>
                                            <span>Navana Real Estate</span>
                                        </td>
                                        <td>
                                            <span>Oct 12, 2020</span>
                                        </td>
                                        <td>
                                            <span class="text-info">Pending</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h2 class="mb-2 mt-2">Requirement Updates</h2>
                                    <div class="table-responsive ">
                                        <table class="table table-striped table-bordered table-sm text-center" {{--id="process_data_table"--}}>
                                            <thead>
                                            <tr>
                                                <th>Req ID</th>
                                                <th>Last Update</th>
                                                <th>Verified By</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <span>10001</span>
                                                </td>
                                                <td>
                                                    <span>Oct 12, 2020</span>
                                                </td>
                                                <td>
                                                    <span class="text-success">Admin user</span>
                                                </td>
                                                <td>
                                                    <a href="#">View</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <span>10001</span>
                                                </td>
                                                <td>
                                                    <span>Oct 12, 2020</span>
                                                </td>
                                                <td>
                                                    <span class="text-danger">Pending</span>
                                                </td>
                                                <td>
                                                    <a href="#">View</a>
                                                </td>
                                            </tr>
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


@push('custom_js')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
    <script src="{{asset('/assets/js/forms/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('/assets/js/forms/datepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        //ck editor
        CKEDITOR.replace('requirement_details');

        $('#time').datetimepicker({
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            format: 'hh:mm'
        });

        let acc_status = $('#acc_status');
        let v_status = $('input:radio[name=v_status]');

        v_status.click(function () {
            if (parseInt($(this).val()) === 1) {
                if (parseInt(acc_status.val()) !== 1) {
                    $(this).prop('checked', false)
                    alert('Account should be active!')
                }
            }
        });

        acc_status.change(function () {
            console.log($(this).val())
            if (parseInt($(this).val()) !== 1) {
                $('input#verified').prop('checked', false)
            }
        })
    </script>
    <script>
        $('.select2').select2();
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

            var baseurl = `{{\Illuminate\Support\Facades\URL::to('/')}}`;
            $.ajax({
                url: baseurl + "/seeker/get_area/" + dis.val(),
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


    </script>
@endpush
