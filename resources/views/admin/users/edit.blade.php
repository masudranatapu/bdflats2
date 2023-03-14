@extends('admin.layouts.master')

@section('admin-user', 'active')
@section('title') Admin| User Update @endsection
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-fileupload.css') }}">
@endpush
<?php
$tabindex = 1;
?>
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Admin user update') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Admin user update') }}</li>
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
                                    {{ __('Admin user create') }}
                                    <span class="float-right">
                                        <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-arrow-left"></i>
                                            Back
                                        </a>
                                    </span>
                                </h5>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('admin.user.update', $user->id) }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->id }}" />
                                    <div class="mb-3">
                                        <div class="form-group {!! $errors->has('image') ? 'error' : '' !!}">
                                            <label class="active">image <span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <div class="fileupload @if (!empty($row->image)) {{ 'fileupload-exists' }} @else {{ 'fileupload-new' }} @endif "
                                                    data-provides="fileupload">
                                                    <span class="fileupload-preview fileupload-exists image"
                                                        style="max-width: 150px; max-height: 120px;">
                                                        @if (!empty($row->image))
                                                            <img src="{{ asset($row->image) }}" alt="image"
                                                                class="img-fluid" height="150px" width="120px" />
                                                        @endif
                                                    </span>
                                                    <span>
                                                        <label class="btn btn-primary btn-rounded btn-file btn-sm">
                                                            <span class="fileupload-new">
                                                                <i class="fa fa-file-image-o"></i> Select Image
                                                            </span>
                                                            <span class="fileupload-exists">
                                                                <i class="fa fa-reply"></i> Change
                                                            </span>
                                                            <input type="file" name="image" id="image"
                                                                class="form-control mb-1" placeholder="image"
                                                                tabindex="{{ $tabindex++ }}"> </label>
                                                        <a href="#"
                                                            class="btn fileupload-exists btn-default btn-rounded  btn-sm"
                                                            data-dismiss="fileupload" id="remove-image">
                                                            <i class="fa fa-times"></i> Remove
                                                        </a>
                                                    </span>
                                                </div>
                                                {!! $errors->first(
                                                    'image',
                                                    '<label class="help-block text-danger">:message</label>',
                                                ) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input value="{{ $user->name }}" type="text" class="form-control"
                                            name="name" placeholder="Name" required>

                                        @if ($errors->has('name'))
                                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input value="{{ $user->email }}" type="email" class="form-control"
                                            name="email" placeholder="Email address" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="role" class="form-label">Role</label>
                                                <select class="form-control" name="roles" required>
                                                    <option value="">Select role</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}"
                                                            {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                            {{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('role'))
                                                    <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">status</label>
                                                <select class="form-control" name="status" required>
                                                    <option value="">Select Status</option>
                                                    <option value="1" @if($user->status == 1) selected @endif>Active</option>
                                                    <option value="0" @if($user->status == 0) selected @endif>Inactive</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-actions text-center">
                                                <a href="{{ route('admin.dashboard') }}" class="btn btn-warning mr-1"><i
                                                        class="la la-times"></i> {{ __('Cancel') }}</a>
                                                <button type="submit" class="btn bg-primary bg-darken-1 text-white">
                                                    <i class="la la-check-square-o"></i> {{ __('Update') }} </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-fileupload.min.js') }}"></script>
@endpush
