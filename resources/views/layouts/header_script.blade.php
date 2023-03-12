<?php
  $title = 'BDFlats | Welcome to BDFlats !';
  $meta_description = 'BDFlats';

  $meta = meta_info($data['seo'] ?? null);
?>
<head prefix="og: http://ogp.me/ns#">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, maximum-scale=1, user-scalable=0" />
<link rel="icon" type="image/png"  href="{{ asset('assets/img/favicon/favicon.png') }}">
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/favicon/android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
<meta name="theme-color" content="#ffffff">
<title>{{ $title }}</title>
<meta name="description" content="{{ $meta['description'] ?? '' }}" />
<meta property="og:title" content="{{ $meta['title'] ?? '' }}" />
<meta property="og:description" content="{{ $meta['description'] ?? '' }}" />
<meta name="twitter:title" content="{{ $meta['title'] ?? '' }}" />
<meta name="twitter:description" content="{{ $meta['description'] ?? '' }}" />
<meta property="og:image" content="{{ asset($meta['og_image'] ?? '') }}" />
<meta name="twitter:image" content="{{ asset($meta['og_image'] ?? '') }}" />
<meta name="keywords" content="{{ $meta['keywords'] ?? '' }}" />
<meta name="robots" content="index,follow">
<meta name="Developed By" content="BDFlats" />
<meta name="Developer" content="Md. Maidul Islam, Md. Rony" />
<meta property="fb:pages" content="351757248257846" />
<meta property="fb:app_id" content="276108213069474" />
<meta property="og:image:width" content="700" />
<meta property="og:image:height" content="400" />
<meta property="og:site_name" content="BDFLATS" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:type" content="WEBSITE" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@samakaltw" />
<meta name="twitter:creator" content="@samakaltw" />
<meta name="twitter:url" content="{{ url('/') }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="canonical" href="{{ url('/') }}" />

  <!--
    ============ css files ============
  -->
  <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css?v=0') }}">
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> --}}

  <!-- <link rel="stylesheet" href="{{asset('/assets/css/fastselect.css?v=0') }}"> -->
  <link rel="stylesheet" href="{{asset('/assets/css/owl.carousel.min.css?v=0') }}">
  <link rel="stylesheet" href="{{asset('/assets/css/normalize.css?v=0') }}">
  <link rel="stylesheet" href="{{asset('/assets/css/demo.css?v=0') }}">
  <link rel="stylesheet" href="{{asset('/assets/css/main.css?v=0') }}">
  <link rel="stylesheet" href="{{asset('/assets/css/responsive.css?v=0') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
  <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
  <meta name="theme-color" content="#fafafa">
  <input type="hidden" name="base_url" id="base_url" value="{{url('/')}}">
  <style type="text/css">
    #mobileErrorMsg{display: inline-block !important;}

    </style>
  @stack('custom_css')
</head>
