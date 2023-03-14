@extends('admin.layouts.master')

@section('Pages', 'menu-open')
@section('pages-category', 'active')

@section('title') Pages Category | Create @endsection
@section('page-name') Pages Category | Create @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Pages Category</li>
@endsection

@section('content')
    @dd($property_for);
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Crate pages category') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Crate pages category') }}</li>
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
                                    {{ __('Create Page Category') }}
                                    <a href="{{ route('admin.pages-category.list') }}"
                                        class="btn btn-success btn-sm float-right">
                                        Back
                                    </a>
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row  mb-2">
                                    <div class="col-12">
                                        {!! Form::open(['route' => 'admin.pages-category.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('category_name') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {!! Form::label('category_name','Category Name <span>*</span>', ['class' => 'label-title'], false) !!}
                                                        {!! Form::text('category_name', old('category_name'), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Category Name']) !!}
                                                        {!! $errors->first('category_name', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('order_id') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {!! Form::label('order_id','Order ID <span>*</span>', ['class' => 'label-title'], false) !!}
                                                        {!! Form::number('order_id', old('order_id'), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Order ID']) !!}
                                                        {!! $errors->first('order_id', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div
                                                    class="form-group {!! $errors->has('meta_keywords') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {!! Form::label('meta_keywords','Meta Keywords <span>*</span>', ['class' => 'label-title'], false) !!}
                                                        {!! Form::text('meta_keywords', old('meta_keywords'), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Meta Keywords']) !!}
                                                        {!! $errors->first('meta_keywords', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div
                                                    class="form-group {!! $errors->has('property_for') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {!! Form::label('property_for','Property For <span>*</span>', ['class' => 'label-title'], false) !!}
                                                        {!! Form::select('property_for', $property_for ?? [], old('property_for'), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Select Property For']) !!}
                                                        {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group {!! $errors->has('meta_description') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {!! Form::label('meta_description','Meta Description <span>*</span>', ['class' => 'label-title'], false) !!}
                                                        {!! Form::textarea('meta_description', old('meta_description'), ['class'=>'form-control','data-validation-required-message' => 'This field is required', 'placeholder'=>'Meta Description']) !!}
                                                        {!! $errors->first('meta_description', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group {!! $errors->has('status') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {!! Form::radio('status','1', true,[ 'id' => 'active','data-validation-required-message' => 'This field is required','checked'=>'checked']) !!}
                                                        {{ Form::label('active','Active') }}

                                                        {!! Form::radio('status','0', false,[ 'id' => 'inactive']) !!}
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
    </div>
@endsection
