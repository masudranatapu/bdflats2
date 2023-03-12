@extends('layouts.app')
@section('agent-earnings','active')
@push('custom_css')

@endpush
@section('content')
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
                    <div class="account-details">
                        <!-- properties -->
                        <div class="property-wrapper">
                            <div class="new-property">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-striped text-center">
                                            <thead>
                                            <tr>
                                                <th>Agent ID</th>
                                                <th>{{ Auth::user()->CODE }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Agent Name</td>
                                                <td>{{ Auth::user()->NAME }}</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile</td>
                                                <td>{{ Auth::user()->MOBILE_NO }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{ Auth::user()->EMAIL }}</td>
                                            </tr>

                                            <tr>
                                                <td>Create Date</td>
                                                <td>{{ date('M d, Y',strtotime(Auth::user()->CREATED_AT)) }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-5 offset-md-1">
                                        <div class="card bg-info">
                                            <div class="card-body text-center">
                                                <h2 class="text-white">Balance</h2>
                                                <h1 class="text-white font-weight-bold">BDT {{ number_format(Auth::user()->UNUSED_TOPUP,2) }}</h1>
                                                <a href="{{ route('agent-withdraw') }}" class="my-2 btn bg-white" @if(Auth::user()->UNUSED_TOPUP < 100 ) onclick="alert('You do not have enough balance for withdraw'); return false;" @endif >Withdraw Credit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- product -->
                                {{-- <h2>Earnings</h2>
                                <table class="table table-striped text-center"
                                       style="font-family: 'Montserrat-Medium';font-size: 14px">
                                    <thead>
                                    <tr>
                                        <th>Agent ID</th>
                                        <th>Date</th>
                                        <th>EID</th>
                                        <th>PID</th>
                                        <th>Earning</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{ Auth::user()->CODE }}</td>
                                        <td>Oct 12, 2021</td>
                                        <td>10001</td>
                                        <td>10001</td>
                                        <td>12,000</td>
                                        <td class="text-success">Added</td>
                                        <td>
                                            <a href="#" class="text-info">Edit</a>
                                            <a href="#" class="text-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ Auth::user()->CODE }}</td>
                                        <td>Oct 12, 2021</td>
                                        <td>10001</td>
                                        <td>10001</td>
                                        <td>11,000</td>
                                        <td class="text-danger">Refunded</td>
                                        <td>
                                            <a href="#" class="text-info">Edit</a>
                                            <a href="#" class="text-danger">Delete</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>


@endsection

@push('custom_js')

@endpush
