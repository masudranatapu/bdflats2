@extends('admin.layouts.master')

@section('settings_menu','menu-open')
@section('payment_method','active')

@section('title')
    Payment Method
@endsection
@section('page-name')
    Payment Method
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"> Payment Method </a></li>
    <li class="breadcrumb-item active">Home Article</li>
@endsection
@push('style')

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/toastr.css')}}">
@endpush

<?php
$rows = $data['article'] ?? [];

?>
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Payment Method') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Payment Method') }}</li>
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
                                {{ __('Payment Method list') }}

                            </h5>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">Code</th>
                                    <th>Name</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(isset($data['rows']) && count($data['rows']) > 0 )
                                    @foreach( $data['rows'] as $key => $row )
                                        <tr>
                                            <td class="text-center">{{ $key+1 }}</td>
                                            <td class="text-center">{{ $row->code }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td class="text-center">{{ $row->is_active == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.payment_method.edit',['id' => $row->id]) }}">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('script')
    {{-- <script src="http://arocrm.com/app-assets/icheck/icheck.min.js"></script> --}}
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>

   <script>
        // $(document).ready(function () {
        //     $('.is_feature').iCheck({
        //         checkboxClass: 'icheckbox_square-yellow',
        //         radioClass: 'iradio_square-yellow',
        //         increaseArea: '20%'
        //     });
        //     $('.is_active').iCheck({
        //         checkboxClass: 'icheckbox_square-yellow',
        //         radioClass: 'iradio_square-yellow',
        //         increaseArea: '20%'
        //     });
        //     $('.is_feature').on('ifClicked', function (event) {
        //         id = $(this).data('id');
        //         $.ajax({
        //             type: 'POST',
        //             url: "{{ URL('web/article/featureStatus') }}",
        //             data: {
        //                 "_token": "{{ csrf_token() }}",
        //                 'id': id
        //             },
        //             success: function (data) {

        //                 toastr.success('Home article', 'Feature Status Updated')


        //             },
        //         });
        //     });
        //     $('.is_feature').on('ifToggled', function (event) {
        //         $(this).closest('tr').toggleClass('warning');
        //     });

        // });
    </script>
@endpush
