@extends('admin.layout.master')

@section('pages-category','active')

@section('title') Pages Category | Edit @endsection
@section('page-name') Pages Category | Edit @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Pages Category</li>
@endsection

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/custom/css/custom.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/image_upload/image-uploader.min.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endpush

@push('custom_js')

    <!-- BEGIN: Data Table-->
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
    <!-- END: Data Table-->
    <script src="{{asset('/assets/css/image_upload/image-uploader.min.js')}}"></script>
    <script>
        $('#imageFile').imageUploader();
    </script>
@endpush

@php
    $roles = userRolePermissionArray();
$property_for = [
    'sell' => 'Sell',
    'rent' => 'Rent',
    'roommate' => 'Roommate'
];
@endphp

@section('content')
    <div class="content-body min-height">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-success">
                    <div class="card-content">
                        <div class="card-header">
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row  mb-2">
                                <div class="col-12">
                                    {!! Form::open(['route' => ['admin.pages-category.update', $data['category']->PK_NO], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {!! $errors->has('category_name') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::label('category_name','Category Name <span>*</span>', ['class' => 'label-title'], false) !!}
                                                    {!! Form::text('category_name', old('category_name', $data['category']->NAME), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Category Name']) !!}
                                                    {!! $errors->first('category_name', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {!! $errors->has('order_id') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::label('order_id','Order ID <span>*</span>', ['class' => 'label-title'], false) !!}
                                                    {!! Form::number('order_id', old('order_id', $data['category']->ORDER_ID), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Order ID']) !!}
                                                    {!! $errors->first('order_id', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {!! $errors->has('meta_keywords') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::label('meta_keywords','Meta Keywords <span>*</span>', ['class' => 'label-title'], false) !!}
                                                    {!! Form::text('meta_keywords', old('meta_keywords', $data['category']->META_KEYWARDS), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Meta Keywords']) !!}
                                                    {!! $errors->first('meta_keywords', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {!! $errors->has('property_for') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::label('property_for','Property For <span>*</span>', ['class' => 'label-title'], false) !!}
                                                    {!! Form::select('property_for', $property_for ?? [], old('property_for', $data['category']->PROPERTY_FOR), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Select Property For']) !!}
                                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {!! $errors->has('meta_description') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::label('meta_description','Meta Description <span>*</span>', ['class' => 'label-title'], false) !!}
                                                    {!! Form::textarea('meta_description', old('meta_description', $data['category']->META_DESCRIPTION), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Meta Description']) !!}
                                                    {!! $errors->first('meta_description', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group {!! $errors->has('status') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::radio('status','1', $data['category']->IS_ACTIVE == 1,[ 'id' => 'active','data-validation-required-message' => 'This field is required','checked'=>'checked']) !!}
                                                    {{ Form::label('active','Active') }}

                                                    {!! Form::radio('status','0', $data['category']->IS_ACTIVE == 0,[ 'id' => 'inactive']) !!}
                                                    {{ Form::label('inactive','Inactive') }}
                                                    {!! $errors->first('status', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <a href="{{ route('admin.pages-category.list')}}">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
