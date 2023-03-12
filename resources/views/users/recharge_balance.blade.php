@extends('layouts.app')

@push('custom_css')


@endpush

@section('content')
<!-- 
     ============   dashboard   ============
 -->
<!-- 
     ============   dashboard   ============
 -->
<div class="dashboard-sec">
  <!-- container -->
  <div class="container">
      <!-- row -->
      <div class="row">

          <div class="col-md-4 mb-5 d-none d-md-block">
              <div class="dashboard-wrapper">
                   @include('users._user_dashboard_menu')
              </div>
          </div>

          <div class="col-sm-12 col-md-8">
               <div class="recharre-balance text-center">
                     <h2>Recharge Balance</h2>
                     <form action="#">
                         <div class="row d-flex justify-content-center text-center">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label for="amount">Amount</label>
                                      <input type="number" class="form-control" id="amount" placeholder="$ 0.00">
                                  </div>
                                  <div class="form-group">
                                      <input type="submit" name="submit" value="Continue">
                                  </div>
                              </div>
                         </div>
                     </form>
               </div>
          </div>

      </div><!-- row -->
  </div><!-- container -->
</div>


@endsection

@push('custom_js')

@endpush
