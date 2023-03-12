@extends('layouts.app')

@push('custom_css')
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
<link href="{{ URL::asset('assets/fileupload/bootstrap-fileupload.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

@endpush
<?php 
$city_combo = $data['city_combo'] ?? array();
$seller_type_combo = Config::get('static_arrays.seller_type') ?? array();


?>

@section('content')
<!-- myads-page -->
<section id="main" class="clearfix myads-page">
  <div class="container">

    <div class="breadcrumb-section">
      <!-- breadcrumb -->
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}">Home</a></li>
        <li>Create Shop</li>
      </ol><!-- breadcrumb -->            
    </div><!-- banner -->
    <div class="ads-info profile">
      <div class="row">
        <div class="col-md-4 text-center">
          <!-- header -->
          @include('users._user_dashboard_menu')
          <!-- end header -->
        </div>
        <!-- recommended-cta-->
        <div class="col-md-8">
          <div class="user-pro-section">
            <div class="profile-details section createshopform">
              <h2>Create Shop</h2>
              <div class="form">
                {!! Form::open([ 'route' => 'store-shop', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                <div class="form-group">
                  <label>Shop Name<span class="required">*</span></label>
                  <div class="controls">
                  {!! Form::text('name', null, [ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter shop name', 'tabindex' => 1]) !!}
                  {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                  </div>
                </div>

                <div class="form-group">
                  <label>Shop Open Schedule<span class="required">*</span></label>
                  <div class="controls">
                  {!! Form::text('open', null, [ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter shop time', 'tabindex' => 1]) !!}
                  {!! $errors->first('open', '<label class="help-block text-danger">:message</label>') !!}
                  </div>
                </div>

                <div class="form-group">
                  <label for="name-three">Shop Address<span class="required">*</span></label>
                  <div class="controls">
                  {!! Form::text('address', null, [ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter shop address', 'tabindex' => 1]) !!}
                  {!! $errors->first('address', '<label class="help-block text-danger">:message</label>') !!}
                  </div>
                </div>

                <div class="form-group">
                  <label>Contact No.<span class="required">*</span></label>
                    <div class="controls">
                     {!! Form::text('contact', null, [ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter contact no.', 'tabindex' => 1]) !!}
                  {!! $errors->first('contact', '<label class="help-block text-danger">:message</label>') !!}
                    </div>
                </div> 
                <div class="form-group">
                  <label>About Your Shop<span class="required">*</span></label>
                    <div class="controls">
                     {!! Form::textarea('about', null, [ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter shop details', 'tabindex' => 1]) !!}
                  {!! $errors->first('about', '<label class="help-block text-danger">:message</label>') !!}
                    </div>
                </div> 
                <div class="form-group">
                  <label>Shop Banner (Optional) Banner size should be 1200X400 px.</label>
                    <div class="controls">
                      <div class="row">
                         <div class="col-md-3">
                            <div class="imgbox">
                               <div style="margin-bottom: 0px; text-align: center;" class="fileupload  fileupload-new" data-provides="fileupload" >
                                  <span class="fileupload-preview fileupload-exists thumbnail" style="max-width: 120px; max-height: 150px;">
                                  </span>
                                  <span>
                                  <label class="btn btn-rounded btn-file btn-sm">
                                  <span class="fileupload-new">
                                  <i class="fa fa-picture-o"></i><br> <span class="fs-14">Select Image</span>
                                  </span>
                                  <span class="fileupload-exists">
                                  <i class="fa fa-picture-o"></i> Change
                                  </span>
                                  <input type="file" name="banner">
                                  </label>
                                  <a href="#" class="btn fileupload-exists btn-default btn-rounded  btn-sm" data-dismiss="fileupload" id="remove-company_logo">
                                  <i class="fa fa-times"></i> Remove
                                  </a>
                                  </span>
                               </div>
                            </div>
                         </div>
                         
                      </div>
                  </div>
                </div>
                <button style="padding: 4px 29px 9px;" type="submit" class="btn btn-primary">Create Shop</button>
                {!! Form::close() !!}
              </div>
            </div>
          </div><!-- user-pro-edit -->
        </div><!-- profile -->
      </div><!-- row -->
    </div><!-- row -->
  </div><!-- container -->
</section><!-- myads-page -->

@endsection

@push('custom_js')
<script src="{{asset('/assets/js/forms/validation/jqBootstrapValidation.js')}}"></script>
<script src="{{ URL::asset('assets/fileupload/bootstrap-fileupload.min.js') }}"></script>
<script src="{{asset('/assets/js/forms/validation/form-validation.js')}}"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

{!! Toastr::message() !!}
@endpush
