@extends('admin.layouts.master')

@section('Property Owner', 'open')
@section('owner_list', 'active')

@section('title')
    Owner | Update
@endsection

@section('page-name')
    Update Owner Password
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            Dashboard
        </a>
    </li>
    <li class="breadcrumb-item active">
        Update Owner
    </li>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Owner recharge') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Owner recharge') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="card-body">
                {!! Form::open([
                    'route' => ['admin.owner.password.update', $data['row']->id],
                    'method' => 'post',
                    'class' => 'form-horizontal',
                    'files' => true,
                    'novalidate',
                ]) !!}
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::label('password', 'Password *', false) !!}
                        <div class="form-group">
                            <div class="controls">
                                {!! Form::password('password', [
                                    'class' => 'form-control',
                                    'data-validation-required-message' => 'This field is required',
                                    'placeholder' => 'Type password',
                                    'placeholder' => 'Password',
                                    'tabIndex' => 1,
                                ]) !!}
                                {!! $errors->first('password', '<label class="help-block text-danger">:message</label>') !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('admin.owner.list') }}">
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
@endsection
