@extends('layouts.app')
@section('contacted-properties','active')
@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
    <style>
        .help-block{
            text-align: left !important;
            display: block !important;
            font-size: 12px !important;
            font-family: 'Montserrat-Medium' !important;
        }
    </style>
@endpush

<?php

    $row = $data['row'] ?? [];
    $refund_reason = $data['reasons'] ?? [];

?>

@section('content')

    <div class="dashboard-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-3 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>

                <div class="col-sm-12 col-md-9">
                    <div class="refund-wrap text-center">
                        <h1>Hi, you are claiming amount for<br/> Property ID {{$row->listing->CODE}}</h1>
                        {!! Form::open([ 'route' => 'refund-request.store', 'method' => 'post', 'novalidate', 'autocomplete' => 'off']) !!}
                        {!! Form::hidden('id',$row->id,[]) !!}
                        <div class="row d-flex justify-content-center">
                            <div class="col-sm-7 col-md-6">
                                <div class="form-group {!! $errors->has('refund_reason') ? 'error' : '' !!}">
                                    <div class="controls">
                                        {!! Form::label('refund_reason','Claiming Reason <span class="required">*</span>:', ['class' => 'advertis-label'], false) !!}
                                        {!! Form::select('refund_reason', $refund_reason, old('refund_reason'), array('class'=>'form-control', 'placeholder'=>'Select Reason','data-validation-required-message' => 'This field is required')) !!}
                                        {!! $errors->first('refund_reason', '<label class="help-block text-danger text-left">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="form-group {!! $errors->has('comment') ? 'error' : '' !!}">
                                    {{ Form::label('comment','Your Comments <span class="required">*</span>',['class' => 'advertis-label'],false) }}
                                    <div class="controls">
                                        {!! Form::textarea('comment', old('comment'), [ 'id'=>'comment','class' => 'msg-area form-control', 'placeholder' => 'Type your comments','data-validation-required-message' => 'This field is required']) !!}
                                        {!! $errors->first('comment', '<label class="help-block text-danger text-left">:message</label>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3>Claiming Amount</h3>
                        <h2>BDT {{number_format($row->AMOUNT,2)}}</h2>
                        <div class="advertisment-btn mt-3">
                            {!! Form::submit('submit', ['id'=>'submit']) !!}
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
