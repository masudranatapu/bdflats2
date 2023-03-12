@extends('layouts.app')
@section('agent-payments','active')
@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
    <style>
        .help-block{text-align:left!important;display:block!important;font-size:12px!important;font-family:Montserrat-Medium,serif!important}.table-responsive{display:inline-table!important}@media (max-width:768px){.table-responsive{display:block!important}}
    </style>
@endpush

<?php

?>

@section('content')
    <!--============   dashboard   ============-->
    <div class="dashboard-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>
                <div class="col-sm-12 col-md-9">
                    <div class="account-details">
                        <div class="transaction-balance mb-2">
                            <div class="row">
                                <div class="col-8">
                                    <div class="transaction-amount">
                                        <h3>Balance</h3>
                                        <h1>BDT {{ number_format(Auth::user()->UNUSED_TOPUP,2) }}</h1>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="rec-balance">
                                        {{-- <a href="{{ route('recharge-balance') }}" class="btn btn-success">Recharge
                                            Balance</a> --}}
                                            <a href="{{ route('agent-withdraw') }}" class="btn btn-success" @if(Auth::user()->UNUSED_TOPUP < 100 ) onclick="alert('You do not have enough balance for withdraw'); return false;" @endif >Withdraw Credit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="transaction-info">
                            <h3>Transaction History</h3>
                        </div>
                        <table id="transactionTable" class="table table-responsive">
                            <thead>
                            <tr>
                                <th>Tran. ID</th>
                                <th>Tran. Type</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Amount</th>
                                <th>Amount</th>
                                <th>Note</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($data['payments']) && count($data['payments']))
                                @foreach($data['payments'] as $payment)
                                <tr>
                                    <td>{{ $payment->SLIP_NUMBER }}</td>
                                    <td>Lead Pay</td>
                                    <td>{{ \Carbon\Carbon::parse($payment->PAYMENT_DATE)->format('d/m/Y') }}</td>
                                    <td>10001</td>
                                    <td>{{ number_format($payment->AMOUNT, 2) }}</td>
                                    <td class="text-success">Added</td>
                                    <td>
                                        <a href="#" class="text-info">Edit</a>
                                        <a href="#" class="text-danger">Delete</a>
                                    </td>
                                </tr>

                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="5">No transaction yet!</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('custom_js')
    <script src="{{asset('/assets/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('/assets/js/forms/validation/form-validation.js')}}"></script>
@endpush
