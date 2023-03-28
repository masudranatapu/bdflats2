@extends('admin.layout.master')

@section('Product Management','open')
@section('product category','active')

@section('title')
   Product Category
@endsection
@section('page-name')
    Product Category
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin_role.breadcrumb_title')  </a></li>
    <li class="breadcrumb-item active">Update product category</li>
@endsection
@push('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/fileupload/bootstrap-fileupload.css') }}">
@endpush('custom_css')

@section('content')

<section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card card-success min-height">
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        {!! Form::open([ 'route' => ['product.category.update', $category->PK_NO], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}


                                        <div class="row">
                                            <div class="col-md-4">
                                               <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                                  <label class="text-uppercase">@lang('form.name')<span class="text-danger">*</span></label>
                                                  <div class="controls">
                                                     {!! Form::text('name', $category->NAME, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter category name', 'data-validation-required-message' => 'This field is required', 'tabindex' => 1 ]) !!}
                                                     {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="col-md-4">
                                               <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                                  <label class="text-uppercase">URL Slug</label>
                                                  <div class="controls">
                                                     {!! Form::text('url_slug', $category->URL_SLUG, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter url slug', 'tabindex' => 2,'readonly' ]) !!}
                                                     {!! $errors->first('url_slug', '<label class="help-block text-danger">:message</label>') !!}
                                                  </div>
                                               </div>
                                            </div>
                                         </div>
                                         <div class="row">
                                            <div class="col-md-4">
                                               <div class="form-group {!! $errors->has('is_active') ? 'error' : '' !!}">
                                                   <label>IS ACTIVE <span class="text-danger">*</span></label>
                                                   <div class="controls">
                                                       {!! Form::select('is_active', ['1'=> 'YES','0'=> 'NO'], $category->IS_ACTIVE,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'tabindex' => 3]) !!}
                                                       {!! $errors->first('is_active', '<label class="help-block text-danger">:message</label>') !!}
                                                   </div>
                                               </div>
                                           </div>

                                           <div class="col-md-4">
                                            <div class="form-group {!! $errors->has('is_feature') ? 'error' : '' !!}">
                                                <label>IS FEATURE <span class="text-danger">*</span></label>
                                                <div class="controls">
                                                    {!! Form::select('is_feature', ['1'=> 'YES','0'=> 'NO'], $category->IS_FEATURE,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'tabindex' => 4]) !!}
                                                    {!! $errors->first('is_feature', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                            </div>
                                            {{--
                                            <div class="col-md-4">
                                               <div class="form-group {!! $errors->has('comment') ? 'error' : '' !!}">
                                                  <label>COMMENTS</label>
                                                  <div class="controls">
                                                     {!! Form::textarea('comment', null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter hs prefix', 'data-validation-required-message' => 'This field is required', 'tabindex' => 1 ]) !!}
                                                     {!! $errors->first('comment', '<label class="help-block text-danger">:message</label>') !!}
                                                  </div>
                                               </div>
                                            </div>
                                            --}}
                                         </div>
                                         <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group {!! $errors->has('meta_title') ? 'error' : '' !!}">
                                                   <label>META TITLE</label>
                                                   <div class="controls">
                                                      {!! Form::text('meta_title', $category->META_TITLE, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter meta title', 'tabindex' => 5]) !!}
                                                      {!! $errors->first('meta_title', '<label class="help-block text-danger">:message</label>') !!}
                                                   </div>
                                                </div>
                                             </div>
                                            <div class="col-md-12">
                                                <div class="form-group {!! $errors->has('meta_keywards') ? 'error' : '' !!}">
                                                   <label>META KEYWARDS</label>
                                                   <div class="controls">
                                                      {!! Form::textarea('meta_keywards', $category->META_KEYWARDS, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter meta keyward', 'tabindex' => 6,'rows'=>'4','cols'=>'10' ]) !!}
                                                      {!! $errors->first('meta_keywards', '<label class="help-block text-danger">:message</label>') !!}
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-12">
                                                <div class="form-group {!! $errors->has('meta_description') ? 'error' : '' !!}">
                                                   <label>META DESCRIPTION</label>
                                                   <div class="controls">
                                                      {!! Form::textarea('meta_description', $category->META_DESCRIPTION, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter meta description', 'tabindex' => 7,'rows'=>'4','cols'=>'10' ]) !!}
                                                      {!! $errors->first('meta_description', '<label class="help-block text-danger">:message</label>') !!}
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                         <div class="row">
                                            <div class="col-md-4">
                                               <div class="form-group {!! $errors->has('is_active') ? 'error' : '' !!}">
                                                  <label class="active">THUMBNAIL IMAGE</label>
                                                  <div class="controls">
                                                     <div class="fileupload @if(!empty($category->THUMBNAIL_PATH))  {{'fileupload-exists'}} @else {{'fileupload-new'}} @endif " data-provides="fileupload" >
                                                        <span class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 120px;">
                                                        @if(!empty($category->THUMBNAIL_PATH))
                                                        <img src="{{asset($category->THUMBNAIL_PATH)}}" alt="Photo" class="img-fluid" height="150px" width="120px"/>
                                                        @endif
                                                        </span>
                                                        <span>
                                                        <label class="btn btn-primary btn-rounded btn-file btn-sm">
                                                        <span class="fileupload-new">
                                                        <i class="la la-file-image-o"></i> Select Image
                                                        </span>
                                                        <span class="fileupload-exists">
                                                        <i class="la la-reply"></i> Change
                                                        </span>
                                                        {!! Form::file('thumbnail_image', Null,[ 'class' => 'form-control mb-1', 'tabindex' => 8]) !!}
                                                        </label>
                                                        <a href="#" class="btn fileupload-exists btn-default btn-rounded  btn-sm" data-dismiss="fileupload" id="remove-thumbnail">
                                                        <i class="la la-times"></i> Remove
                                                        </a>
                                                        </span>
                                                        <br>
                                                        <span class="MainToUpload edit-3-color" style="font-size: 12px; color: #bf4c4c;">File types jpg, png.</span>
                                                     </div>
                                                     {!! $errors->first('feature_image', '<label class="help-block text-danger">:message</label>') !!}
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="col-md-4">
                                               <div class="form-group {!! $errors->has('is_active') ? 'error' : '' !!}">
                                                  <label class="active">BANNER IMAGE</label>
                                                  <div class="controls">
                                                     <div class="fileupload @if(!empty($category->BANNER_PATH))  {{'fileupload-exists'}} @else {{'fileupload-new'}} @endif " data-provides="fileupload" >
                                                        <span class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 120px;">
                                                        @if(!empty($category->BANNER_PATH))
                                                        <img src="{{asset($category->BANNER_PATH)}}" alt="Photo" class="img-fluid" height="150px" width="120px"/>
                                                        @endif
                                                        </span>
                                                        <span>
                                                        <label class="btn btn-primary btn-rounded btn-file btn-sm">
                                                        <span class="fileupload-new">
                                                        <i class="la la-file-image-o"></i> Select Image
                                                        </span>
                                                        <span class="fileupload-exists">
                                                        <i class="la la-reply"></i> Change
                                                        </span>
                                                        {!! Form::file('banner_image', Null,[ 'class' => 'form-control mb-1', 'tabindex' => 9]) !!}
                                                        </label>
                                                        <a href="#" class="btn fileupload-exists btn-default btn-rounded  btn-sm" data-dismiss="fileupload" id="remove-thumbnail">
                                                        <i class="la la-times"></i> Remove
                                                        </a>
                                                        </span>
                                                        <br>
                                                        <span class="MainToUpload edit-3-color" style="font-size: 12px; color: #bf4c4c;">File types jpg, png.</span>
                                                     </div>
                                                     {!! $errors->first('feature_image', '<label class="help-block text-danger">:message</label>') !!}
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="col-md-4">
                                               <div class="form-group {!! $errors->has('is_active') ? 'error' : '' !!}">
                                                  <label class="active">ICON IMAGE</label>
                                                  <div class="controls">
                                                     <div class="fileupload @if(!empty($category->ICON))  {{'fileupload-exists'}} @else {{'fileupload-new'}} @endif " data-provides="fileupload" >
                                                        <span class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 120px;">
                                                        @if(!empty($category->ICON))
                                                        <img src="{{asset($category->ICON)}}" alt="Photo" class="img-fluid" height="150px" width="120px"/>
                                                        @endif
                                                        </span>
                                                        <span>
                                                        <label class="btn btn-primary btn-rounded btn-file btn-sm">
                                                        <span class="fileupload-new">
                                                        <i class="la la-file-image-o"></i> Select Image
                                                        </span>
                                                        <span class="fileupload-exists">
                                                        <i class="la la-reply"></i> Change
                                                        </span>
                                                        {!! Form::file('icon', Null,[ 'class' => 'form-control mb-1', 'tabindex' => 10]) !!}
                                                        </label>
                                                        <a href="#" class="btn fileupload-exists btn-default btn-rounded  btn-sm" data-dismiss="fileupload" id="remove-thumbnail">
                                                        <i class="la la-times"></i> Remove
                                                        </a>
                                                        </span>
                                                        <br>
                                                        <span class="MainToUpload edit-3-color" style="font-size: 12px; color: #bf4c4c;">File types jpg, png.</span>
                                                     </div>
                                                     {!! $errors->first('feature_image', '<label class="help-block text-danger">:message</label>') !!}
                                                  </div>
                                               </div>
                                            </div>
                                         </div>
                                         <div class="form-actions text-center mt-3">
                                            <a href="{{ route('product.category.list') }}">
                                            <button type="button" class="btn btn-warning mr-1" title="Cancel">
                                            <i class="ft-x"></i> @lang('form.btn_cancle')
                                            </button>
                                            </a>
                                            <button type="submit" class="btn btn-primary" title="Update">
                                            <i class="la la-check-square-o"></i> @lang('form.btn_update')
                                            </button>
                                         </div>
                                        {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                </section>
                @push('custom_js')
                <script type="text/javascript" src="{{ asset('app-assets/vendors/fileupload/bootstrap-fileupload.min.js') }}"></script>
                @endpush('custom_js')
@endsection
