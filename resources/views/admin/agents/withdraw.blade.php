@extends('admin.layouts.master')

@section('BDFLAT_Agents', 'menu-open')

@section('agent_list', 'active')


@section('title')
    Withdraw Credit
@endsection
@section('page-name')
    Withdraw Credit
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Withdraw Credit</li>
@endsection

@section('content')
    @php
        $payment_methods = $data['payment_method'] ?? [];
        $tabIndex = 0;
    @endphp
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Withdraw Credit') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Withdraw Credit') }}</li>
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
                                <h5 class="m-0">{{ __('Withdraw Credit') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <p class="font-weight-bold">Your Credit Balance</p>
                                            <h3 class="font-weight-bold">BDT 15000</h3>
                                        </div>
                                        {!! Form::open([
                                            'route' => 'agent-withdraw',
                                            'method' => 'post',
                                            'class' => 'form-horizontal',
                                            'files' => true,
                                            'novalidate',
                                            'autocomplete' => 'off',
                                        ]) !!}
                                        <div class="form-group {!! $errors->has('amount') ? 'error' : '' !!}">
                                            {{ Form::label('amount', 'Withdraw Amount') }}
                                            <div class="controls">
                                                {!! Form::number('amount', old('amount'), [
                                                    'class' => 'form-control',
                                                    'placeholder' => '0.00',
                                                    'data-validation-required-message' => 'This field is required',
                                                    'tabIndex' => ++$tabIndex,
                                                ]) !!}
                                                {!! $errors->first('amount', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group {!! $errors->has('method') ? 'error' : '' !!}">
                                            {{ Form::label('method', 'Withdraw Method') }}
                                            <div class="controls">
                                                {!! Form::select('method', $payment_methods ?? [], old('method'), [
                                                    'id' => 'method',
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Select Method',
                                                    'tabIndex' => ++$tabIndex,
                                                    'data-validation-required-message' => 'This field is required',
                                                ]) !!}
                                                {!! $errors->first('method', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group bkash {!! $errors->has('bkash') ? 'error' : '' !!}">
                                            {{ Form::label('bkash', 'bKash Number') }}
                                            <div class="controls">
                                                {!! Form::number('bkash', old('bkash'), [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'bKash Number',
                                                    'tabIndex' => ++$tabIndex,
                                                ]) !!}
                                                {!! $errors->first('bkash', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group nagad {!! $errors->has('nagad') ? 'error' : '' !!}">
                                            {{ Form::label('nagad', 'Nagad Number') }}
                                            <div class="controls">
                                                {!! Form::number('nagad', old('nagad'), [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Nagad Number',
                                                    'tabIndex' => ++$tabIndex,
                                                ]) !!}
                                                {!! $errors->first('nagad', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group bank {!! $errors->has('bank_name') ? 'error' : '' !!}">
                                            {{ Form::label('bank_name', 'Bank Name') }}
                                            <div class="controls">
                                                {!! Form::text('bank_name', old('bank_name'), [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Bank Name',
                                                    'tabIndex' => ++$tabIndex,
                                                ]) !!}
                                                {!! $errors->first('bank_name', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group bank {!! $errors->has('bank_acc_name') ? 'error' : '' !!}">
                                            {{ Form::label('bank_acc_name', 'Bank Account Name') }}
                                            <div class="controls">
                                                {!! Form::text('bank_acc_name', old('bank_acc_name'), [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Bank Account Name',
                                                    'tabIndex' => ++$tabIndex,
                                                ]) !!}
                                                {!! $errors->first('bank_acc_name', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group bank {!! $errors->has('bank_acc_no') ? 'error' : '' !!}">
                                            {{ Form::label('bank_acc_no', 'Bank Account No.') }}
                                            <div class="controls">
                                                {!! Form::number('bank_acc_no', old('bank_acc_no'), [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Bank Account Number',
                                                    'tabIndex' => ++$tabIndex,
                                                ]) !!}
                                                {!! $errors->first('bank_acc_no', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group {!! $errors->has('note') ? 'error' : '' !!}">
                                            {{ Form::label('note', 'Note') }}
                                            <div class="controls">
                                                {!! Form::textarea('note', old('note'), [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Note',
                                                    'rows' => 4,
                                                    'tabIndex' => ++$tabIndex,
                                                ]) !!}
                                                {!! $errors->first('note', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{ url()->previous() }}">
                                                        <button type="button" class="btn btn-warning mr-1">
                                                            <i class="ft-x"></i> Cancel
                                                        </button>
                                                    </a>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> Save
                                                    </button>
                                                </div>
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

@push('script')
    <script src="{{ asset('/assets/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('/assets/js/forms/validation/form-validation.js') }}"></script>
@endpush
