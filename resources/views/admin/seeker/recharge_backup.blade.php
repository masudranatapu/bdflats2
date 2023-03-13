@extends('admin.layouts.master')

@section('Property Seekers','menu-open')
@section('seeker_list','active')


@section('title') Recharge Balance @endsection
@section('page-name') Recharge Balance @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Recharge Balance</li>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/custom/css/custom.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
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
    $roles = userRolePermissionArray();
    $payment_methods = $data['paymentMethods'] ?? [];
    $payment_type = [1 => 'Customer Payment', 2 => 'Bonus Payment'];
@endphp

@section('content')
    <div class="content-body min-height">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <p class="font-weight-bold">Credit Balance</p>
                                        <h3 class="font-weight-bold">
                                            BDT {{ number_format($data['seeker']->UNUSED_TOPUP ?? 0, 2) }}</h3>
                                    </div>
                                    {!! Form::open(['route' => ['admin.seeker.recharge', $data['seeker']->PK_NO],'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                                    <div class="form-group">
                                        {{ Form::label('amount','Recharge Amount') }}
                                        <div class="controls">
                                            {!! Form::number('amount', old('amount'), ['class'=>'form-control', 'placeholder'=>'0.00','data-validation-required-message' => 'This field is required']) !!}
                                            {!! $errors->first('amount', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('note','Payment Type') }}
                                        <div class="controls">
                                            {!! Form::select('payment_type', $payment_type ?? [], old('payment_type'), ['id' => 'paymentType', 'class'=>'form-control', 'placeholder'=>'Payment Type', 'rows' => 4]) !!}
                                            {!! $errors->first('payment_type', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                    <div class="bonus form-group">
                                        {{ Form::label('method','Payment Method') }}
                                        <div class="controls">
                                            {!! Form::select('method', $payment_methods ?? [], old('method'), ['id' => 'method', 'class'=>'form-control', 'placeholder'=>'Select Method']) !!}
                                            {!! $errors->first('method', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>

                                    <div class="bonus form-group">
                                        {{ Form::label('payment_account','Payment Account') }}
                                        <div class="controls">
                                            {!! Form::select('payment_account', [], old('payment_account'), ['id' => 'payment_account', 'class'=>'form-control', 'placeholder'=>'Select Method']) !!}
                                            {!! $errors->first('payment_account', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
{{--                                    <div--}}
{{--                                        class="bonus bkash form-group bkash">--}}
{{--                                        {{ Form::label('bkash','Bkash/Nagad/Rocket Number') }}--}}
{{--                                        <div class="controls">--}}
{{--                                            {!! Form::number('bkash', old('bkash'), ['class'=>'form-control', 'placeholder'=>'bKash/Nagad/Rocket Number']) !!}--}}
{{--                                            {!! $errors->first('bkash', '<label class="help-block text-danger">:message</label>') !!}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div--}}
{{--                                        class="bonus bank form-group bank">--}}
{{--                                        {{ Form::label('bank_name','Bank Name') }}--}}
{{--                                        <div class="controls">--}}
{{--                                            {!! Form::text('bank_name', old('bank_name'), ['class'=>'form-control', 'placeholder'=>'Bank Name']) !!}--}}
{{--                                            {!! $errors->first('bank_name', '<label class="help-block text-danger">:message</label>') !!}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div--}}
{{--                                        class="bonus bank form-group bank">--}}
{{--                                        {{ Form::label('bank_acc_name','Bank Account Name') }}--}}
{{--                                        <div class="controls">--}}
{{--                                            {!! Form::text('bank_acc_name', old('bank_acc_name'), ['class'=>'form-control', 'placeholder'=>'Bank Account Name']) !!}--}}
{{--                                            {!! $errors->first('bank_acc_name', '<label class="help-block text-danger">:message</label>') !!}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div--}}
{{--                                        class="bonus bank form-group bank">--}}
{{--                                        {{ Form::label('bank_acc_no','Bank Account No.') }}--}}
{{--                                        <div class="controls">--}}
{{--                                            {!! Form::number('bank_acc_no', old('bank_acc_no'), ['class'=>'form-control', 'placeholder'=>'Bank Account Number']) !!}--}}
{{--                                            {!! $errors->first('bank_acc_no', '<label class="help-block text-danger">:message</label>') !!}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div
                                        class=" form-group ">
                                        {{ Form::label('slip_number','Slip Number') }}
                                        <div class="controls">
                                            {!! Form::text('slip_number', old('slip_number'), ['class'=>'form-control', 'placeholder'=>'Slip Number']) !!}
                                            {!! $errors->first('slip_number', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                    <div class="bonus form-group">
                                        {{ Form::label('attachment','Attachment (optional)') }}
                                        <div class="controls">
                                            <div id="imageFile" style="padding-top: .5rem;"></div>
                                        </div>
                                        {!! $errors->first('images', '<label class="help-block text-danger">:message</label>') !!}
                                        {!! $errors->first('images.0', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('note','Note') }}
                                        <div class="controls">
                                            {!! Form::textarea('note', old('note'), ['class'=>'form-control', 'placeholder'=>'Note', 'rows' => 4]) !!}
                                            {!! $errors->first('note', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="{{ route('admin.seeker.payment', request()->route('id')) }}"
                                                   class="btn btn-info">Cancel</a>
                                                {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
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
@endsection

@push('script')
    <script src="{{asset('/assets/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('/assets/js/forms/validation/form-validation.js')}}"></script>

    <script>
        $(document).ready(function () {
            let paymentType = $('#paymentType');
            let bonus = $('.bonus');
            let method = $('#method');
            let bkash = $('.bkash');
            let bank = $('.bank');

            setTimeout(() => {
                if (parseInt(paymentType.val()) === 4) {
                    bonus.hide();
                } else {
                    bonus.show();
                }

                if (parseInt(method.val()) === 4) {
                    getPaymentAccounts(4);
                    bank.show();
                    bkash.hide();
                } else if (parseInt(method.val()) !== 6) {
                    bkash.show();
                    bank.hide();
                }
            }, 100);

            paymentType.change(function () {
                if (parseInt($(this).val()) === 2) {
                    bonus.hide(100);
                } else {
                    bonus.show(100);
                }
                bank.hide();
                bkash.hide();
            });

            method.change(function () {
                getPaymentAccounts(parseInt($(this).val()));
                if (parseInt($(this).val()) === 4) {
                    bank.show(100);
                    bkash.hide(100);
                } else {
                    bank.hide(100);
                    bkash.show(100);
                }
            });

            function getPaymentAccounts(method_id) {
                $.ajax('{{ route('ajax.payment-account.list') . '?query=' }}' + method_id)
                    .done(res => {
                        $('#payment_account').html(res);
                    })
                    .fail(err => {
                        console.log(err)
                    });
            }
        });
    </script>
@endpush
