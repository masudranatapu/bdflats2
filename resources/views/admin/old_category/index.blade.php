@extends('admin.layout.master')

@section('Product Management','open')
@section('product category','active')

@section('title') Product Category @endsection
@section('page-name') Product Category @endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
  <li class="breadcrumb-item active">Category</li>
@endsection

@php
    $roles = userRolePermissionArray()
@endphp
@push('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@push('custom_js')
<!-- BEGIN: Data Table-->
<script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
<!-- END: Data Table-->
@endpush

@section('content')
<div class="content-body min-height">
  <section id="pagination">
    <div class="row">
      <div class="col-12">
        <div class="card card-sm card-success">
          <div class="card-header pl-2">
            <div class="form-group">
              @if(hasAccessAbility('new_category', $roles))
              <a class="text-white btn btn-sm btn-primary" href="{{ route('product.category.create')}}" title="Create new category"><i class="ft-plus text-white"></i> Create Category</a>
              @endif

            </div>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="card-content collapse show">
            <div class="card-body card-dashboard">
              <div class="table-responsive">
                <table class="table table-striped table-bordered alt-pagination table-sm" id="indextable">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 50px;">Sl.</th>
                      <th class="" style="min-width: 100px;">IS Dalal Category</th>
                      <th class="" style="">Category Name</th>
                      <th class="" style="">Thumbnail</th>
                      <th class="" style="">Banner </th>
                      <th class="" style="">Icon </th>
                      <th class="" style="width: 200px;">Subcategory</th>

                      <th class="text-center" style="width: 200px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($rows as $row)
                    <tr>
                      <td class="text-center" style="width: 50px;">{{ $loop->index + 1 }}</td>
                      <td class="">{{ $row->IS_DALAL_CATEGORY == 1 ? 'YES' : 'NO' }}</td>
                      <td class="" style="">{{ $row->NAME }}</td>
                      <td class="" style=""><img src="{{asset($row->THUMBNAIL_PATH ?? 'app-assets/images/no_image.jpg')}}" width="50"></td>
                      <td class="" style=""><img src="{{asset($row->BANNER_PATH ?? 'app-assets/images/no_image.jpg')}}" width="50"></td>
                      <td class="" style=""><img src="{{asset($row->ICON ?? 'app-assets/images/no_image.jpg')}}" width="50"></td>
                      <td style="width: 200px;">
                        @if($row->subcategory && $row->subcategory->count() > 0 )
                        <ul class="list-group" style="min-width: 400px;">
                          @foreach($row->subcategory as $key => $scat)
                          @if($key < 2)
                          <li class="list-group-item list-group-item-sm list-group-parent">
                            <div class="float-right" style="display: inline-block; min-width: 50px;">
                              <span class="float-right child-action">

                                @if(hasAccessAbility('edit_sub_category', $roles))
                                <button class="btn btn-xs btn-info mr-0 editSubcategory" data-toggle="modal" data-target="#addEditSubcategory" title="EDIT SUBCATEGORY" data-url="{{ route('admin.sub_category.update', [$scat->PK_NO]) }}" data-category_id="{{$row->PK_NO}}" data-category_name="{{$row->NAME}}" data-subcat_id="{{$scat->PK_NO}}" data-subcat_name="{{$scat->NAME}}" data-subcat_code="{{$scat->CODE}}" data-type="edit"><i class="la la-edit"></i></button>
                                @endif
                                 @if(hasAccessAbility('delete_sub_category', $roles))
                                <a href="{{ route('admin.sub_category.delete', [$scat->PK_NO]) }}" class="btn btn-xs btn-danger" title="DELETE SUBCATEGORY" onclick="return confirm('Are you sure you want to delete?')"><i class="la la-trash"></i>
                                  </a>
                                  @endif
                                </span>
                              </div>
                              <span> {{$key+1}} . </span>
                              <span title="Size name">{{$scat->NAME}}</span> {{ $scat->IS_DALAL_CATEGORY == 1 ? '(DALAL)' : '' }} &nbsp;
                              {{-- <span title="Size code">({{$scat->CODE}})</span> --}}
                            </li>
                            @endif
                            @endforeach()

                          </ul>
                          @endif

                          @if($row->subcategory && $row->subcategory->count() > 2 )
                          <div class="card collapse-icon default-collapse  accordion-icon-rotate card-sm" style="min-width: 400px;">
                            <a id="headingCollapse51" class="card-header border-primary primary collapsed" data-toggle="collapse" href="#collapseSubCat_{{$row->PK_NO}}" aria-expanded="false" aria-controls="collapseSubCat_{{$row->PK_NO}}" style="padding: 5px;">
                              <div class="card-title lead primary">More Sub Category</div>
                            </a>
                            <div id="collapseSubCat_{{$row->PK_NO}}" role="tabpanel" aria-labelledby="headingCollapse51" class="card-collapse collapse" aria-expanded="true" style="">
                              <div class="card-content">
                                <div class="card-body p-0">
                                  <ul class="list-group ">
                                    @foreach($row->subcategory as $key => $scat)
                                    @if($key > 1)
                                    <li class="list-group-item list-group-item-sm list-group-parent">
                                      <span class=" float-right child-action">

                                        @if(hasAccessAbility('edit_sub_category', $roles))
                                        <button class="btn btn-xs btn-info mr-0 editSubcategory" data-toggle="modal" data-target="#addEditSubcategory" title="EDIT SUBCATEGORY" data-url="{{ route('admin.sub_category.update', [$scat->PK_NO]) }}" data-category_id="{{$row->PK_NO}}" data-category_name="{{$row->NAME}}" data-subcat_id="{{$scat->PK_NO}}" data-subcat_name="{{$scat->NAME}}" data-subcat_code="{{$scat->CODE}}" data-type="edit"><i class="la la-edit"></i></button>
                                        @endif

                                        @if(hasAccessAbility('delete_sub_category', $roles))
                                        <a href="{{ route('admin.sub_category.delete', [$scat->PK_NO]) }}" class="btn btn-xs btn-danger mr-0" title="DELETE" onclick="return confirm('Are you sure you want to delete?')"><i class="la la-trash"></i>
                                        </a>
                                        @endif
                                      </span>
                                      <span> {{$key+1}} . </span>
                                      <span title="Model name">{{$scat->NAME}}</span> {{ $scat->IS_DALAL_CATEGORY == 1 ? '(DALAL)' : '' }} &nbsp;

                                    </li>
                                    @endif
                                    @endforeach()

                                  </ul>

                                </div>
                              </div>
                            </div>
                          </div>
                          @endif
                        </td>

                        <td class="text-center" style="width: 200px;">
                          @if(hasAccessAbility('edit_category', $roles))
                          <a href="{{ route('product.category.edit', [$row->PK_NO]) }}" title="EDIT" class="btn btn-xs btn-info  mb-1"><i class="la la-edit"></i></a>
                          @endif
                          @if(hasAccessAbility('delete_category', $roles))
                          <a href="{{ route('product.category.delete', [$row->PK_NO]) }}" onclick="return confirm('Are you sure you want to delete product category?')" title="DELETE" class="btn btn-xs btn-danger mb-1"><i class="la la-trash"></i></a>
                          @endif
                          @if(hasAccessAbility('new_sub_category', $roles))
                          <a href="javascript:void(0)" class="btn btn-xs btn-success addSubcategory mb-1" title="ADD SUBCATEGORY" data-toggle="modal" data-target="#addEditSubcategory"  data-url="{{ route('admin.sub_category.store') }}" data-category_id="{{$row->PK_NO}}" data-category_name="{{$row->NAME}}" data-subcat_id="" data-subcat_name="" data-subcat_code="" data-type="add">&nbsp;+ SC&nbsp;</a>
                          @endif

                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


@include('admin.category._subcategory_add_edit_modal')

@endsection


@push('custom_js')

<!--script only for brand page-->
<script type="text/javascript" src="{{ asset('app-assets/pages/category.js')}}"></script>


@endpush('custom_js')
