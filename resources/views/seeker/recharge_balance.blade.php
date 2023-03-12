@extends('layouts.app')


@section('recharge-balance','active')
@push('custom_css')


@endpush

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
                    <div class="recharre-balance text-center">
                        <h2>Recharge Balance</h2>
                        {!! Form::open([ 'route' => 'ssl.pay', 'id' => 'paymentForm', 'method' => 'post', 'class' => 'form-horizontal','files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                        <div class="row d-flex justify-content-center text-center">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <div class="controls">
                                        {!! Form::number('amount', null, ['class' => 'form-control', 'id' => 'amount', 'step' => '0.001', 'data-validation-required-message' => 'This field is required', 'placeholder' => '৳ 0.00']) !!}
                                        {!! $errors->first('amount', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
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
@endpush
