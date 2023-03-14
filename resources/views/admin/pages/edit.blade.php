@extends('admin.layouts.master')

@section('pages-list','active')

@section('title') Pages | Edit @endsection
@section('page-name') Pages | Edit @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Pages | Edit</li>
@endsection

@push('style')

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/image_upload/image-uploader.min.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endpush

@push('script')

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

@endphp

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Pages') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Pages') }}</li>
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
                            <h5 class="m-0">{{ __('Pages Edit') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row  mb-2">
                                <div class="col-12">
                                    {!! Form::open(['route' => ['admin.pages.update', $data['page']->id], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div
                                                class="form-group {!! $errors->has('page_category') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::label('page_category','Page Category <span>*</span>', ['class' => 'label-title'], false) !!}
                                                    {!! Form::select('page_category', $data['page_categories'] ?? [], old('page_category', $data['page']->f_page_category_no), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Page Category']) !!}
                                                    {!! $errors->first('page_category', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {!! $errors->has('page_title') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::label('page_title','Page Title <span>*</span>', ['class' => 'label-title'], false) !!}
                                                    {!! Form::text('page_title', old('page_title', $data['page']->title), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Page Title']) !!}
                                                    {!! $errors->first('page_title', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div
                                                class="form-group {!! $errors->has('meta_keywords') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::label('meta_keywords','Meta Keywords <span>*</span>', ['class' => 'label-title'], false) !!}
                                                    {!! Form::text('meta_keywords', old('meta_keywords', $data['page']->meta_keywards), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Meta Keywords']) !!}
                                                    {!! $errors->first('meta_keywords', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {!! $errors->has('meta_description') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::label('meta_description','Meta Description <span>*</span>', ['class' => 'label-title'], false) !!}
                                                    {!! Form::textarea('meta_description', old('meta_description', $data['page']->meta_description), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Meta Description']) !!}
                                                    {!! $errors->first('meta_description', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('page_url','Page URL <span>*</span>', ['class' => 'label-title'], false) !!}
                                                <div
                                                    class="input-group {!! $errors->has('page_url') ? 'error' : '' !!}">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text" id="btnGroupAddon2">{{ URL('/') . '/page/' }}</div>
                                                        </div>
                                                    </div>
                                                    {!! Form::text('page_url', old('page_url', $data['page']->url_slug), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Page URL']) !!}
                                                    {!! $errors->first('page_url', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {!! $errors->has('search_url') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::label('search_url','Search URL <span>*</span>', ['class' => 'label-title'], false) !!}
                                                    {!! Form::text('search_url', old('search_url', $data['page']->search_url), ['class'=>'form-control', 'placeholder'=>'Search URL']) !!}
                                                    {!! $errors->first('search_url', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {!! $errors->has('order_id') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::label('order_id','Order ID <span>*</span>', ['class' => 'label-title'], false) !!}
                                                    {!! Form::number('order_id', old('order_id', $data['page']->order_id), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Order ID']) !!}
                                                    {!! $errors->first('order_id', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('images','Page Image <span>*</span>', ['class' => 'label-title'], false) !!}
                                                <img src="{{ asset($data['page']->image_path) }}" alt="" style="max-height: 100px;display: block">
                                                <div class="controls">
                                                    <div id="imageFile" style="padding-top: .5rem;"></div>
                                                </div>
                                                {!! $errors->first('images', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div
                                                class="form-group {!! $errors->has('view_on_bottom_list') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::checkbox('view_on_bottom_list', '1', $data['page']->is_bottom_view == 1, ['id' => 'view_on_bottom_list']) !!}
                                                    {!! Form::label('view_on_bottom_list','View On Bottom List', ['class' => 'label-title'], false) !!}
                                                    {!! $errors->first('view_on_bottom_list', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {!! $errors->has('status') ? 'error' : '' !!}">
                                                <div class="controls">
                                                    {!! Form::radio('status','1', $data['page']->is_active == 1,[ 'id' => 'active','data-validation-required-message' => 'This field is required','checked'=>'checked']) !!}
                                                    {{ Form::label('active','Active') }}

                                                    {!! Form::radio('status','0', $data['page']->is_active == 0,[ 'id' => 'inactive']) !!}
                                                    {{ Form::label('inactive','Inactive') }}
                                                    {!! $errors->first('status', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            {!! Form::hidden('update', '1') !!}
                                            <a href="{{ route('admin.pages.index')}}">
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
</div>
@endsection
