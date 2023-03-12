@extends('admin.layout.master')

@section('Sales Agent','open')
@section('agent_list','active')

@section('title') Agents | Create @endsection
@section('page-name') Create Agents @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Create Agents</li>
@endsection

<!--push from page-->
@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/image_upload/image-uploader.min.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/datepicker/bootstrap-datetimepicker.min.css')}}">
@endpush

@php($tabIndex = 0)

@section('content')
    <div class="card card-success min-height">
        <div class="card-header">
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">
                {!! Form::open([ 'route' => 'admin.agents.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                <label>Agent Name<span class="text-danger">*</span></label>
                                <div class="controls">
                                    {!! Form::text('name', old('name'),[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter Agent Name', 'tabIndex' => ++$tabIndex ]) !!}
                                    {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {!! $errors->has('phone') ? 'error' : '' !!}">
                                <label>Agent Mobile Number<span class="text-danger">*</span></label>
                                <div class="controls">
                                    {!! Form::text('phone', old('phone'),[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Agent Mobile Number', 'tabIndex' => ++$tabIndex ]) !!}
                                    {!! $errors->first('phone', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {!! $errors->has('email') ? 'error' : '' !!}">
                                <label>Agent Email Address</label>
                                <div class="controls">
                                    {!! Form::text('email', old('email'),[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Agent Email Address', 'tabIndex' => ++$tabIndex ]) !!}
                                    {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {!! $errors->has('pass') ? 'error' : '' !!}">
                                <label>@lang('agent.password')<span class="text-danger">*</span></label>
                                <div class="controls">
                                    {!! Form::password('pass',[ 'class' => 'form-control mb-1', 'placeholder' => 'Enter Password', 'data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex ]) !!}
                                    {!! $errors->first('pass', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                {!! Form::label('open_time', 'Open Time *', ['class' => 'label-title'], false) !!}--}}
{{--                                <div class="controls">--}}
{{--                                    {!! Form::text('open_time', old('open_time'), [ 'class' => 'form-control time', 'id' => 'open_time', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}--}}
{{--                                    {!! $errors->first('open_time', '<label class="help-block text-danger">:message</label>') !!}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                {!! Form::label('close_time', 'Close Time *', ['class' => 'label-title'], false) !!}--}}
{{--                                <div class="controls">--}}
{{--                                    {!! Form::text('close_time', old('close_time'), [ 'class' => 'form-control time', 'id' => 'close_time', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}--}}
{{--                                    {!! $errors->first('close_time', '<label class="help-block text-danger">:message</label>') !!}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-title">
                                <label>Image (300X300)</label>
                            </div>
                            <div
                                class="row form-group {!! $errors->has('image') ? 'error' : '' !!}">
                                <div class="col-sm-12">
                                    <div class="controls">
                                        <div id="imageFile" style="padding-top: .5rem;"></div>
                                    </div>
                                    {!! $errors->first('images.0', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {!! $errors->has('is_feature') ? 'error' : '' !!}">
                                <label>Is Feature<span class="text-danger">*</span></label>
                                <div class="controls">
                                    {!! Form::select('is_feature',['1'=>'Feature','0'=>'General'], old('is_feature'),[ 'class' => 'form-control mb-1', 'tabIndex' => ++$tabIndex ]) !!}
                                    {!! $errors->first('is_feature', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {!! $errors->has('status') ? 'status' : '' !!}">
                                <label>Status<span class="text-danger">*</span></label>
                                <div class="controls">
                                    {!! Form::select('status',['1'=>'Active','0'=>'Pending', '2' => 'Inactive', '3' => 'Deleted'], old('status'),[ 'class' => 'form-control mb-1', 'tabIndex' => ++$tabIndex ]) !!}
                                    {!! $errors->first('status', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="form-actions mt-10 mb-3 ml-2">
                <a href="{{ route('admin.agents.list')}}">
                    <button type="button" class="btn btn-warning mr-1">
                        <i class="ft-x"></i> Cancel
                    </button>
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> Save
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </div>
@endsection

<!--push from page-->
@push('custom_js')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
    <script src="{{asset('/assets/css/image_upload/image-uploader.min.js')}}"></script>

    <script src="{{asset('/assets/js/forms/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('/assets/js/forms/datepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <script>
        $('#imageFile').imageUploader();
        $('.time').datetimepicker({
            format: 'hh:mm'
        });
    </script>
@endpush
