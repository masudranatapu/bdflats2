<div class="user-info text-center">
  <h1>Hello, <a href="my-dashboard.html">{{Auth::user()->NAME}}</a></h1>
  <h5>{{Auth::user()->EMAIL}}</h5>
</div>
<div class="dashboard-nav">
  <ul>
       <li><a href="{{route('my-account')}}" class="active">My Account</a></li>
       <li><a href="{{route('property-requirements')}}">Property Requirements</a></li>
       <li><a href="{{route('suggested-properties')}}">Suggested Properties</a></li>
       <li><a href="{{route('varified-properties')}}">Verified Properties</a></li>
       <li><a href="{{route('contacted-properties')}}">Contacted Properties</a></li>
       <li><a href="{{route('browsed-properties')}}">Browsed Properties</a></li>
       <li><a href="{{route('recharge-balance')}}">Recharge Balance</a></li>
  </ul>
</div>
