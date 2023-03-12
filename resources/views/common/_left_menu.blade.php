@if(Auth::user()->USER_TYPE == 1)
<div class="dashboard-wrapper">
    <div class="user-info text-center">
        <h1>Hello, <a href="{{ route('my-account') }}">{{ Auth::user()->NAME }}</a></h1>
        <h5>{{ Auth::user()->EMAIL }}</h5>
    </div>
    <div class="dashboard-nav">
        <ul>
            <li><a href="{{route('my-account')}}" class="@yield('my-account')">My Account</a></li>
            <li><a href="{{route('property-requirements')}}"  class="@yield('property-requirements')">Property Requirements</a></li>
            <li><a href="{{route('suggested-properties')}}"  class="@yield('suggested-properties')">Suggested Properties</a></li>
            <li><a href="{{route('contacted-properties')}}"  class="@yield('contacted-properties')">Contacted Properties</a></li>
            <li><a href="{{route('browsed-properties')}}"  class="@yield('browsed-properties')">Browsed Properties</a></li>
            <li><a href="{{route('recharge-balance')}}"  class="@yield('recharge-balance')">Recharge Balance</a></li>
            <li><a href="{{route('payment-history')}}"  class="@yield('payment-history')">Payment History</a></li>
        </ul>
        <div class="logout-btn mt-3">
            <a class="nav-link"  href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>
@endif

@if(Auth::user()->USER_TYPE == 2)
<div class="dashboard-wrapper">
    <div class="user-info text-center">
        <h1>Hello, <a href="{{ route('my-account') }}">{{ Auth::user()->NAME }}</a></h1>
        <h5>{{ Auth::user()->EMAIL }}</h5>
    </div>
    <div class="dashboard-nav">
        <ul>
            <li><a href="{{route('my-account')}}" class="@yield('my-account')">My Account</a></li>
            <li><a href="{{route('buy-leads')}}" class="@yield('buy-leads')">Suggested Leads</a></li>
            <li><a href="{{ route('owner-listings') }}"  class="@yield('owner-listings')">My Properties</a></li>
            <li><a href="{{ route('owner-leads') }}" class="@yield('owner-leads')">Leads</a></li>
            <li><a href="{{route('recharge-balance')}}"  class="@yield('recharge-balance')">Recharge Balance</a></li>
            <li><a href="{{route('payment-history')}}"  class="@yield('payment-history')">Payment History</a></li>
        </ul>
        <div class="logout-btn mt-3 text-center">
            <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>
    </div>
</div>
@endif

@if(Auth::user()->USER_TYPE == 3)
<div class="dashboard-wrapper">
    <div class="user-info text-center">
        <h1>Hello, <a href="{{ route('my-account') }}">{{ Auth::user()->NAME }}</a></h1>
        <h5>{{ Auth::user()->EMAIL }}</h5>
    </div>
    <div class="dashboard-nav">
        <ul>
            <li><a href="{{route('my-account')}}" class="@yield('my-account')">Dashboard</a></li>
            <li><a href="{{ route('developer-listings') }}"  class="@yield('developer-listings')">Properties</a></li>
            <li><a href="{{ route('developer-leads') }}" class="@yield('developer-leads')">Leads</a></li>
            <li><a href="{{ route('developer-buy-leads') }}" class="@yield('developer-buy-leads')">Suggested Leads</a></li>
            <li><a href="{{route('recharge-balance')}}"  class="@yield('recharge-balance')">Recharge Balance</a></li>
            <li><a href="{{ route('developer-payments') }}" class="@yield('developer-payments')">Payments</a></li>
        </ul>
        <div class="logout-btn mt-3">
            <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>
    </div>
</div>
@endif

@if(Auth::user()->USER_TYPE == 4)
<div class="dashboard-wrapper">
    <div class="user-info text-center">
        <h1>Hello, <a href="{{ route('my-account') }}">{{ Auth::user()->NAME }}</a></h1>
        <h5>{{ Auth::user()->EMAIL }}</h5>
    </div>
    <div class="dashboard-nav">
        <ul>
            <li><a href="{{route('my-account')}}" class="@yield('my-account')">Dashboard</a></li>
            <li><a href="{{ route('agency-listings') }}"  class="@yield('agency-listings')">Properties</a></li>
            <li><a href="{{ route('agency-leads') }}" class="@yield('agency-leads')">Leads</a></li>
            <li><a href="{{ route('agency-buy-leads') }}" class="@yield('agency-buy-leads')">Suggested Leads</a></li>
            <li><a href="{{route('recharge-balance')}}"  class="@yield('recharge-balance')">Recharge Balance</a></li>
            <li><a href="{{ route('agency-payments') }}" class="@yield('agency-payments')">Payments</a></li>
        </ul>
        <div class="logout-btn mt-3">
            <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>
    </div>
</div>
@endif

@if(Auth::user()->USER_TYPE == 5)
<div class="dashboard-wrapper">
    <div class="user-info text-center">
        <h1>Hello, <a href="{{ route('my-account') }}">{{ Auth::user()->NAME }}</a></h1>
        <h5>{{ Auth::user()->EMAIL }}</h5>
    </div>
    <div class="dashboard-nav">
        <ul>
            <li><a href="{{route('my-account')}}" class="@yield('my-account')">Dashboard</a></li>
            <li><a href="{{ route('agent-listings') }}"  class="@yield('agent-listings')">Properties</a></li>
            <li><a href="{{ route('agent-leads') }}" class="@yield('agent-leads')">Leads</a></li>
            <li><a href="{{ route('agent-buy-leads') }}" class="@yield('agent-buy-leads')">Suggested Leads</a></li>
            <li><a href="{{ route('agent-payments') }}" class="@yield('agent-payments')">Payments</a></li>
            <li><a href="{{ route('agent-earnings') }}" class="@yield('agent-earnings')">Earnings</a></li>
        </ul>
        <div class="logout-btn mt-3">
            <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>
    </div>
</div>
@endif



