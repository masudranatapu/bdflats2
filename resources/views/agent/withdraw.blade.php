@extends('layouts.app')
@section('agent-earnings','active')
@push('custom_css')
    <style>
        .help-block {
            color: #d82b2a;
        }
    </style>
@endpush
<?php
$methods = [
    1 => 'bKash',
    2 => 'Nagad',
    3 => 'Bank',
    4 => 'Others'
];
?>
@section('content')
    <!-- ============   dashboard   ============ -->
    <div class="dashboard-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="account-details">
                        <!-- properties -->
                        <div class="property-wrapper">
                            <div class="new-property">
                                <div class="property-heading">
                                    <h3><a href="{{ route('agent-earnings') }}"><i class="fa fa-long-arrow-left"></i>My
                                            Earnings</a></h3>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 offset-md-3">
                                        <div class="card shadow mb-2">
                                            <div class="card-body text-center">
                                                <h2>Withdraw Credit</h2>
                                                <div class="my-2">
                                                    <p>Your Credit Balance</p>
                                                    <h3>BDT {{ number_format(Auth::user()->UNUSED_TOPUP,2) }}</h3>
                                                </div>
                                                {!! Form::open([ 'route' => 'agent-withdraw', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                                                <div class="form-group {!! $errors->has('amount') ? 'error' : '' !!}">
                                                    {{ Form::label('amount','Withdraw Amount') }}
                                                    <div class="controls">
                                                        {!! Form::number('amount', old('amount'), ['class'=>'form-control', 'placeholder'=>'0.00','data-validation-required-message' => 'This field is required']) !!}
                                                        {!! $errors->first('amount', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                                <div class="form-group {!! $errors->has('method') ? 'error' : '' !!}">
                                                    {{ Form::label('method','Withdraw Method') }}
                                                    <div class="controls">
                                                        {!! Form::select('method', $methods ?? [], old('method'), ['id' => 'method', 'class'=>'form-control', 'placeholder'=>'Select Method','data-validation-required-message' => 'This field is required']) !!}
                                                        {!! $errors->first('method', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                                <div
                                                    class="form-group bkash {!! $errors->has('bkash') ? 'error' : '' !!}">
                                                    {{ Form::label('bkash','bKash Number') }}
                                                    <div class="controls">
                                                        {!! Form::number('bkash', old('bkash'), ['class'=>'form-control', 'placeholder'=>'bKash Number']) !!}
                                                        {!! $errors->first('bkash', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                                <div
                                                    class="form-group nagad {!! $errors->has('nagad') ? 'error' : '' !!}">
                                                    {{ Form::label('nagad','Nagad Number') }}
                                                    <div class="controls">
                                                        {!! Form::number('nagad', old('nagad'), ['class'=>'form-control', 'placeholder'=>'Nagad Number']) !!}
                                                        {!! $errors->first('nagad', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                                <div
                                                    class="form-group bank {!! $errors->has('bank_name') ? 'error' : '' !!}">
                                                    {{ Form::label('bank_name','Bank Name') }}
                                                    <div class="controls">
                                                        {!! Form::text('bank_name', old('bank_name'), ['class'=>'form-control', 'placeholder'=>'Bank Name']) !!}
                                                        {!! $errors->first('bank_name', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                                <div
                                                    class="form-group bank {!! $errors->has('bank_acc_name') ? 'error' : '' !!}">
                                                    {{ Form::label('bank_acc_name','Bank Account Name') }}
                                                    <div class="controls">
                                                        {!! Form::text('bank_acc_name', old('bank_acc_name'), ['class'=>'form-control', 'placeholder'=>'Bank Account Name']) !!}
                                                        {!! $errors->first('bank_acc_name', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                                <div
                                                    class="form-group bank {!! $errors->has('bank_acc_no') ? 'error' : '' !!}">
                                                    {{ Form::label('bank_acc_no','Bank Account No.') }}
                                                    <div class="controls">
                                                        {!! Form::number('bank_acc_no', old('bank_acc_no'), ['class'=>'form-control', 'placeholder'=>'Bank Account Number']) !!}
                                                        {!! $errors->first('bank_acc_no', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                                <div class="form-group {!! $errors->has('note') ? 'error' : '' !!}">
                                                    {{ Form::label('note','Note') }}
                                                    <div class="controls">
                                                        {!! Form::textarea('note', old('note'), ['class'=>'form-control', 'placeholder'=>'Note', 'rows' => 2]) !!}
                                                        {!! $errors->first('note', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::submit('Submit', ['class' => 'btn btn-success btn-block']) !!}
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
            </div><!-- row -->
        </div><!-- container -->
    </div>


@endsection

@push('custom_js')
    <script src="{{asset('/assets/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('/assets/js/forms/validation/form-validation.js')}}"></script>
    <script>
        $(document).ready(function () {
            let method = $('#method');
            let bkash = $('.bkash');
            let nagad = $('.nagad');
            let bank = $('.bank');

            method.change(function () {
                changeMethod();
            })

            function changeMethod() {
                switch (parseInt(method.val())) {
                    case 1:
                        bkash.show();
                        nagad.hide();
                        bank.hide();
                        break;
                    case 2:
                        bkash.hide();
                        nagad.show();
                        bank.hide();
                        break;
                    case 3:
                        bkash.hide();
                        nagad.hide();
                        bank.show();
                        break;
                    default:
                        bkash.hide();
                        nagad.hide();
                        bank.hide();
                }
            }
            changeMethod();
        });
    </script>
@endpush
