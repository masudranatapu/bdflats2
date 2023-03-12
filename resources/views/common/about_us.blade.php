@extends('layouts.app')
@php
    $about_us = $data['about_us'] ?? null;
    $team_members = $data['team_members'] ?? [];
    $testimonials = $data['testimonials'] ?? [];
@endphp
@section('content')
    <!--
    ============   page-header    ============
 -->
    @if($about_us)
        <div class="page-heading">
            <!-- container -->
            <div class="container">
                <div class="page-name">
                    <ul>
                        <li><a href="{{route('web.home')}}">Home <i class="fa fa-angle-double-right"></i></a></li>
                        <li>About</li>
                    </ul>
                    <h2>{{$about_us->TITLE ?? null}}</h2>
                </div>
            </div><!-- container -->
        </div>


        <!--
            ============   about    ============
        -->
        <div class="about-sec mb-5 mt-4">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="about-bx mb-4">
                            <img src="{{$about_us ? env('PANEL_PATH').$about_us->BANNER : null}}" class="w-100" alt="image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-info">
                            <h3>{{$about_us->SUB_TITLE ?? null}}</h3>
                            <p>{{$about_us->DESCRIPTION ?? null}}</p>
                        </div>
                    </div>
                </div><!-- row -->
            </div><!-- container -->
        </div>

        <!--
            ============   about article    ============
        -->
        <div class="about-approach">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="about-wrap">
                            <div class="about-article">
                                <h3>{{$about_us->MISSION_TITLE ?? null}}</h3>
                                <p>{{$about_us->MISSION_DESCRIPTION ?? null}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 text-center">
                        <div class="about-wrap">
                            <div class="about-article">
                                <h3>{{$about_us->APPROACH_TITLE ?? null}}</h3>
                                <p>{{$about_us->APPROACH_DESCRIPTION ?? null}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 text-center">
                        <div class="about-wrap">
                            <div class="about-article">
                                <h3>{{$about_us->VISION_TITLE ?? null}}</h3>
                                <p>{{$about_us->VISION_DESCRIPTION ?? null}}</p>
                            </div>
                        </div>
                    </div>

                </div><!-- row -->
            </div><!-- container -->
        </div>
    @endif

    <!--
        ============  team   ============
    -->
    @if($team_members->count()>0)
        <div class="team-sec {{!$about_us? "mt-2":""}}">
            <!-- container -->
            <div class="container">
                <div class="team-heading">
                    <h1>bdflats Team Member</h1>
                </div>
                <!-- row -->
                <div class="row">
                    <!-- team -->
                    @foreach($team_members as $item)
                        <div class="col-sm-6 col-md-3 text-center mb-5">
                            <div class="team-wrapper">
                                <div class="team-profile">
                                    <img src="{{env('PANEL_PATH').$item->IMAGE}}" class="w-100" alt="image">
                                    <div class="team-social">
                                        <ul class="social">
                                            <li><a href="{{$item->FB_URL ?? "#"}}"><i class="fa fa-facebook-square"></i></a></li>
                                            <li><a href="{{$item->TWITTER_URL ?? "#"}}"><i class="fa fa-twitter-square"></i></a></li>
                                            <li><a href="{{$item->LINKEDIN_URL ?? "#"}}"><i class="fa fa-linkedin-square"></i></a></li>
                                            <li><a href="{{$item->PRINTEREST_URL ?? "#"}}"><i class="fa fa-pinterest-square"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-info">
                                    <h3>{{$item->NAME ?? null}}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div><!-- row -->
            </div><!-- container -->
        </div>
    @endif

    <!--
        ============  testimonial   ============
    -->
    @if($testimonials->count()>0)
        <div class="testimonial-sec">
            <!-- container -->
            <div class="container">
                <div class="owl-carousel owl-theme">
                    <!-- review -->
                    @foreach($testimonials as $item)
                        <div class="item text-center">
                            <div class="testimonial-item">
                                <div class="client-review">
                                    <div class="client-profile">
                                        <img src="{{env('PANEL_PATH').$item->IMAGE}}" alt="image">
                                    </div>
                                    <div class="client-info">
                                        <h3>{{$item->NAME ?? null}}</h3>
                                        <h4>{{$item->DESIGNATION}}</h4>
                                        <p>“{{$item->DESCRIPTION}}”</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div><!-- container -->
        </div>
    @endif

@endsection

@push('custom_footer_script')

@endpush
