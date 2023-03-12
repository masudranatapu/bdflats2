@extends('admin.layouts.master')

@section('Sales Agent','open')
@section('agent_list','active')

@section('title') Agents | Update @endsection
@section('page-name') Update Agents @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Update Agents</li>
@endsection

<!--push from page-->
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/image_upload/image-uploader.min.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css"
          href="{{asset('/assets/css/forms/datepicker/bootstrap-datetimepicker.min.css')}}">
    <style>
        .show_img {
            height: 82px;
            width: 82px;
            object-fit: cover;
        }

        .del_img {
            background: #bbbbbb;
            padding: 2px 7px;
            border-radius: 77px;
            font-weight: bold;
            color: black;
            position: absolute;
            top: 5px;
            right: 20px;
        }
    </style>
@endpush

@php($tabIndex = 0)

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
                            <h5 class="m-0">{{ __('Admin roles list') }}</h5>
                            <span class="float-right">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-primary">All Users</a>
                                <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary">+ Create
                                    Role</a>
                            </span>
                        </div>
                        <div class="card-body">
                            {!! Form::open([ 'route' => ['admin.agents.update', $agent->id], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                            <label>Agent Name<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                {!! Form::text('name', old('name', $agent->name),[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter Agent Name', 'tabIndex' => ++$tabIndex ]) !!}
                                                {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group {!! $errors->has('phone') ? 'error' : '' !!}">
                                            <label>Agent Mobile Number<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                {!! Form::text('phone', old('phone', $agent->mobile_no),[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Agent Mobile Number', 'tabIndex' => ++$tabIndex ]) !!}
                                                {!! $errors->first('phone', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group {!! $errors->has('email') ? 'error' : '' !!}">
                                            <label>Agent Email Address</label>
                                            <div class="controls">
                                                {!! Form::text('email', old('email', $agent->email),[ 'class' => 'form-control mb-1', 'placeholder' => 'Agent Email Address', 'tabIndex' => ++$tabIndex ]) !!}
                                                {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group {!! $errors->has('pass') ? 'error' : '' !!}">
                                            <label>@lang('agent.password')<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                {!! Form::password('pass',[ 'class' => 'form-control mb-1', 'placeholder' => 'Enter Password', 'tabIndex' => ++$tabIndex ]) !!}
                                                {!! $errors->first('pass', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-title">
                                            <label>Image</label>
                                        </div>
                                        <div
                                            class="row form-group {!! $errors->has('image') ? 'error' : '' !!}">
                                            <div class="col-sm-12">

                                                @if($agent->profile_pic_url)
                                                    <img style="max-width: 150px" src="{{ asset($agent->profile_pic_url ?? '') }}" alt="">
                                                @endif
                                                <div class="controls">
                                                    <div id="imageFile" style="padding-top: .5rem;"></div>
                                                </div>
                                                {!! $errors->first('images.0', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group {!! $errors->has('is_feature') ? 'error' : '' !!}">
                                            <label>Is Feature<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                {!! Form::select('is_feature',['1'=>'Feature','0'=>'General'], old('is_feature', $agent->is_feature),[ 'class' => 'form-control mb-1', 'tabIndex' => ++$tabIndex ]) !!}
                                                {!! $errors->first('is_feature', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group {!! $errors->has('status') ? 'status' : '' !!}">
                                            <label>Status<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                {!! Form::select('status',['1'=>'Active','0'=>'Pending', '2' => 'Inactive', '3' => 'Deleted'], old('status', $agent->status),[ 'class' => 'form-control mb-1', 'placeholder' => 'Select Status', 'tabIndex' => ++$tabIndex ]) !!}
                                                {!! $errors->first('status', '<label class="help-block text-danger">:message</label>') !!}
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<!--push from page-->
@push('script')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
    <script src="{{asset('/assets/css/image_upload/image-uploader.min.js')}}"></script>

    <script src="{{asset('/assets/js/forms/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('/assets/js/forms/datepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <script>
        $('.time').datetimepicker({
            format: 'hh:mm'
        });
    </script>

    <script>
        var basepath = `{{\URL::to('/')}}`;

        $('#imageFile').imageUploader();

        $(".del_img").on('click', function () {
            var remove_img = '.remove_img' + $(this).data('id');
            $.ajax({
                url: basepath /*+ "/ajax-listings-delete_img/" + $(this).data('id')*/,
                type: 'GET',
                success: function (data) {
                    if (data.success) {
                        $(remove_img).remove();
                        toastr.success(data.success);
                    } else {
                        toastr.success(data.error);
                    }
                }
            });
        });
    </script>
@endpush('script')
