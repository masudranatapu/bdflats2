@extends('admin.layouts.master')
@section('dashboard', 'active')

@section('title') {{ $data['title'] ?? '' }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $data['title'] ?? 'Page Header' }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text">Total Listing ads</span>
                            <span class="info-box-number">00</span>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text">Total Industry</span>
                            <span class="info-box-number">00</span>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>

                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text">Total Location</span>
                            <span class="info-box-number">00</span>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text">Total Investment</span>
                            <span class="info-box-number">00</span>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text">Total Users</span>
                            <span class="info-box-number">00</span>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text">Verified Users</span>
                            <span class="info-box-number">00</span>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text">Total Blog Post</span>
                            <span class="info-box-number">00</span>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text">Total Custome Page</span>
                            <span class="info-box-number">00</span>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
