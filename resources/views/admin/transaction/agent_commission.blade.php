@extends('admin.layouts.master')

@section('Payment', 'menu-open')
@section('agent_commission', 'active')

@section('title') Agent Commission @endsection
@section('page-name') Agent Commission @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Agent Commission</li>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Agent Commission') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Agent Commission') }}</li>
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
                                <h5 class="m-0">{{ __('Agent Commission') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-block mb-1">
                                            <div class="controls">
                                                {!! Form::radio('type', 'pending', old('type') == 'pending', ['id' => 'pending']) !!}
                                                {{ Form::label('pending', 'Pending') }}
                                                &emsp;
                                                {!! Form::radio('type', 'approved', old('type') == 'approved', ['id' => 'approved']) !!}
                                                {{ Form::label('approved', 'Approved') }}
                                                &emsp;
                                                {!! Form::radio('type', 'rejected', old('type') == 'rejected', ['id' => 'rejected']) !!}
                                                {{ Form::label('rejected', 'Rejected') }}
                                            </div>
                                        </div>
                                        <div class="row form-group" style="align-items: center">
                                            <div class="col-md-6">
                                                {!! Form::text('search', null, [
                                                    'class' => 'form-control',
                                                    'style' => 'border-radius: 40px !important',
                                                    'placeholder' => 'Search by User ID',
                                                ]) !!}
                                            </div>
                                            <div class="col-md-6">
                                                {!! Form::submit('Search', ['class' => 'btn btn-success']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <table class="table table-striped table-bordered text-center">
                                            <thead>
                                                <tr>
                                                    <th>USER ID</th>
                                                    <th>Date</th>
                                                    <th>Name</th>
                                                    <th>Mobile</th>
                                                    <th>Amount</th>
                                                    <th>Payment Method</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>10001</td>
                                                    <td>Oct 12, 2020</td>
                                                    <td>name</td>
                                                    <td>Mobile NO</td>
                                                    <td>100</td>
                                                    <td>bKash - 0170000000</td>
                                                    <td class="text-success">Approved</td>
                                                    <td>
                                                        <a href="#">Edit</a> |
                                                        <a href="#">Delete</a>
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
@endsection
