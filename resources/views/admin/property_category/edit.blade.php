@extends('admin.layouts.master')

@section('settings_menu','menu-open')
@section('propertycategory','active')

@section('title') Update Property Category @endsection
@section('page-name') Update Property Category @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin_role.breadcrumb_title')  </a></li>
    <li class="breadcrumb-item active">Update property category</li>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/fileupload/bootstrap-fileupload.css') }}">
@endpush

@php($tabIndex = 0)

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Update Property Category') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Update Property Category') }}</li>
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
                                {{ __('Update Property Category ') }}
                                <span class="float-right">
                                    <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary">
                                        + Create Role
                                    </a>
                                </span>
                            </h5>
                        </div>
                        <div class="card-body">
                            {!! Form::open([ 'route' => ['admin.propertycategory.update', $category->id], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                        <label class="text-uppercase">PROPERTY TYPE<span
                                                class="text-danger">*</span></label>
                                        <div class="controls">
                                            {!! Form::text('category_name', $category->property_type, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter category name', 'data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex ]) !!}
                                            {!! $errors->first('category_name', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                        <label class="text-uppercase">URL Slug</label>
                                        <div class="controls">
                                            {!! Form::text('url_slug', $category->url_slug, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter url slug', 'tabIndex' => ++$tabIndex,'readonly' ]) !!}
                                            {!! $errors->first('url_slug', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {!! $errors->has('meta_title') ? 'error' : '' !!}">
                                        <label>META TITLE<span class="text-danger">*</span></label>
                                        <div class="controls">
                                            {!! Form::text('meta_title', $category->meta_title, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter meta title', 'tabIndex' => ++$tabIndex]) !!}
                                            {!! $errors->first('meta_title', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group {!! $errors->has('meta_description') ? 'error' : '' !!}">
                                        <label>META DESCRIPTION<span class="text-danger">*</span></label>
                                        <div class="controls">
                                            {!! Form::textarea('meta_description', $category->meta_desc, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter meta description', 'tabIndex' => ++$tabIndex,'rows'=>'4','cols'=>'10' ]) !!}
                                            {!! $errors->first('meta_description', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group {!! $errors->has('body_description') ? 'error' : '' !!}">
                                        <label>BODY DESCRIPTION</label>
                                        <div class="controls">
                                            {!! Form::textarea('body_description', $category->body_desc, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter body description', 'tabIndex' => ++$tabIndex,'rows'=>'4','cols'=>'10' ]) !!}
                                            {!! $errors->first('body_description', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group {!! $errors->has('null') ? 'error' : '' !!}">
                                        <label>URL</label>
                                        <div class="controls">
                                            {!! Form::text('url', $category->category_url, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter url', 'tabIndex' => ++$tabIndex]) !!}
                                            {!! $errors->first('null', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group {!! $errors->has('order') ? 'error' : '' !!}">
                                        <label>ORDER<span class="text-danger">*</span></label>
                                        <div class="controls">
                                            {!! Form::text('order', $category->order_id, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter order', 'tabIndex' => ++$tabIndex]) !!}
                                            {!! $errors->first('order', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group {!! $errors->has('is_active') ? 'error' : '' !!}">
                                        <label class="active">UPLOAD IMAGE</label>
                                        <div class="controls">
                                            <div
                                                class="fileupload @if(!empty($category->img_path))  {{'fileupload-exists'}} @else {{'fileupload-new'}} @endif "
                                                data-provides="fileupload">
                                                        <span class="fileupload-preview fileupload-exists thumbnail"
                                                              style="max-width: 150px; max-height: 120px;">
                                                        @if(!empty($category->img_path))
                                                                <img src="{{asset($category->img_path)}}" alt="Photo"
                                                                     class="img-fluid" height="150px" width="120px"/>
                                                            @endif
                                                        </span>
                                                <span>
                                                        <label class="btn btn-primary btn-rounded btn-file btn-sm">
                                                        <span class="fileupload-new">
                                                        <i class="la la-file-image-o"></i> Select Image
                                                        </span>
                                                        <span class="fileupload-exists">
                                                        <i class="la la-reply"></i> Change
                                                        </span>
                                                        {!! Form::file('image', Null,[ 'class' => 'form-control mb-1', 'tabIndex' => ++$tabIndex]) !!}
                                                        </label>
                                                        <a href="#"
                                                           class="btn fileupload-exists btn-default btn-rounded  btn-sm"
                                                           data-dismiss="fileupload" id="remove-thumbnail">
                                                        <i class="la la-times"></i> Remove
                                                        </a>
                                                        </span>
                                                <br>
                                                <span class="MainToUpload edit-3-color"
                                                      style="font-size: 12px; color: #bf4c4c;">File types jpg, png.</span>
                                            </div>
                                            {!! $errors->first('image', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {!! $errors->has('is_active') ? 'error' : '' !!}">
                                        <label class="active">UPLOAD ICON</label>
                                        <div class="controls">
                                            <div
                                                class="fileupload @if(!empty($category->icon_path))  {{'fileupload-exists'}} @else {{'fileupload-new'}} @endif "
                                                data-provides="fileupload">
                                                        <span class="fileupload-preview fileupload-exists thumbnail"
                                                              style="max-width: 150px; max-height: 120px;">
                                                        @if(!empty($category->icon_path))
                                                                <img src="{{asset($category->icon_path)}}" alt="Photo"
                                                                     class="img-fluid" height="150px" width="120px"/>
                                                            @endif
                                                        </span>
                                                <span>
                                                        <label class="btn btn-primary btn-rounded btn-file btn-sm">
                                                        <span class="fileupload-new">
                                                        <i class="la la-file-image-o"></i> Select Image
                                                        </span>
                                                        <span class="fileupload-exists">
                                                        <i class="la la-reply"></i> Change
                                                        </span>
                                                        {!! Form::file('icon', Null,[ 'class' => 'form-control mb-1', 'tabIndex' => ++$tabIndex]) !!}
                                                        </label>
                                                        <a href="#"
                                                           class="btn fileupload-exists btn-default btn-rounded  btn-sm"
                                                           data-dismiss="fileupload" id="remove-thumbnail">
                                                        <i class="la la-times"></i> Remove
                                                        </a>
                                                        </span>
                                                <br>
                                                <span class="MainToUpload edit-3-color"
                                                      style="font-size: 12px; color: #bf4c4c;">File types jpg, png.</span>
                                            </div>
                                            {!! $errors->first('icon', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions text-center mt-3">
                                <a href="{{ route('admin.propertycategory.list') }}">
                                    <button type="button" class="btn btn-warning mr-1" title="Cancel">
                                        <i class="ft-x"></i> @lang('form.btn_cancle')
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-primary" title="Update">
                                    <i class="la la-check-square-o"></i> @lang('form.btn_update')
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
@endsection

@push('script')
    <script type="text/javascript"
            src="{{ asset('app-assets/vendors/fileupload/bootstrap-fileupload.min.js') }}"></script>
@endpush('script')
