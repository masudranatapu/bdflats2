@extends('layouts.app')


@section('payment-history','active')
@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/datepicker/bootstrap-datetimepicker.min.css')}}">

    <style>
        .profile_photo {
            width: 35px;
            height: 35px;
            position: absolute;
            top: 8px;
            border-radius: 5px;
            object-fit: cover;
            margin-left: 5px;
        }
    </style>
@endpush

@php
    $payment_method = Config::get('static_array.payment_methods') ?? [];
    $bkash = $data['bkash'] ?? [];
    $rocket = $data['rocket'] ?? [];
    //dd($payment_method)
@endphp

@section('content')
    <!--
     ============   dashboard   ============
 -->
    <!--
         ============   dashboard   ============
     -->
    <div class="dashboard-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-3 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>

                <div class="col-sm-12 col-md-9">
                    <div class="recharre-balance">
                        <h2 class="text-center">Recharge Request</h2>
                        {!! Form::open([ 'route' => 'recharge-request', 'id' => 'paymentForm', 'method' => 'post', 'class' => 'form-horizontal','files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                        <div class="row d-flex ">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="amount">Payment Method <span class="text-danger">*</span></label>
                                    <div class="controls">
                                        {!! Form::select('payment_method', $payment_method,2,['class'=>'form-control','id'=>'payment_method', 'data-validation-required-message' => 'This field is required']) !!}
                                        {!! $errors->first('payment_method', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group" id="bkash">
                                    <label for="amount">Mobile Number <span class="text-danger">*</span></label>
                                    <div class="controls">
                                        {!! Form::select('bkash_no',$bkash,null,['class'=>'form-control','id'=>'bkash_no', 'data-validation-required-message' => 'This field is required']) !!}
                                        {!! $errors->first('bkash_no', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="form-group" id="rocket" style="display: none">
                                    <label for="amount">Mobile Number <span class="text-danger">*</span></label>
                                    <div class="controls">
                                        {!! Form::select('rocket_no',$rocket,null,['class'=>'form-control','id'=>'rocket_no',  'data-validation-required-message' => 'This field is required']) !!}
                                        {!! $errors->first('rocket_no', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="recharged_mobile_no">Recharge From Mobile Number <span class="text-danger">*</span></label>
                                    <div class="controls">
                                        {!! Form::text('recharged_mobile_no', old('recharged_mobile_no'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter Recharged Mobile Number']) !!}
                                        {!! $errors->first('recharged_mobile_no', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="recharge_date">Recharge Date <span class="text-danger">*</span></label>
                                    <div class="controls">
                                        {!! Form::text('recharge_date', old('recharge_date'), [ 'class' => 'form-control datetimepicker', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Recharged Date', 'onkeydown' => 'return false']) !!}
                                        {!! $errors->first('recharge_date', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="amount">Amount <span class="text-danger">*</span></label>
                                    <div class="controls">
                                        {!! Form::text('amount', old('amount'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter Amount']) !!}
                                        {!! $errors->first('amount', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="txn_id">Transaction Id <span class="text-danger">*</span></label>
                                    <div class="controls">
                                        {!! Form::text('txn_id', old('txn_id'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Transaction Id']) !!}
                                        {!! $errors->first('txn_id', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="note">Note (optional)</label>
                                    <div class="controls">
                                        {!! Form::textarea('note', old('note'), [ 'id'=>'note','class' => 'msg-area form-control', 'placeholder' => 'Type here']) !!}
                                        {!! $errors->first('note', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Image (optional)</label>
                                    <label class="upload-image" for="upload-image-one">
                                        {!! Form::file('image', [ 'id' => 'upload-image-one']) !!}
                                        {!! $errors->first('image', '<label class="help-block text-danger">:message</label>') !!}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Continue">
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div><!-- row -->
        </div><!-- container -->
    </div>


@endsection

@push('custom_js')
    <script src="{{asset('/assets/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('/assets/js/forms/validation/form-validation.js')}}"></script>
    <script src="{{asset('/assets/js/forms/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('/assets/js/forms/datepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <script>

        $('.datetimepicker').datetimepicker({
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            format: 'DD-MM-YYYY'
        });

        $('#payment_method').on('change',function () {
            if ($(this).val() == 2){
                $('#rocket').slideUp().css('display','none');
                $('#bkash').slideDown().css('display','block');

            }else {

                $('#bkash').slideUp().css('display','none');
                $('#rocket').slideDown().css('display','block');

            }

        });
    </script>
@endpush
