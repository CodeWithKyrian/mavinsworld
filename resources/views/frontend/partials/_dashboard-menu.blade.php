<div class="dashboard-menu">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link @route('account.dashboard') active @endroute" href="{{ route('account.dashboard') }}">
                <i class="fi-rs-settings-sliders mr-10"></i>Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @route('account.orders.*') active @endroute" href="{{ route('account.orders.index') }}">
                <i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('account.orders.track')}}">
                <i class="fi-rs-shopping-cart-check mr-10"></i>Track
                Your Order
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fi-rs-marker mr-10"></i>My Address
            </a>
        </li> --}}
        <li class="nav-item @route('account.details') active @endroute">
            <a class="nav-link" href="{{route('account.details')}}">
                <i class="fi-rs-user mr-10"></i>Account details
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)"
                onclick="document.getElementById('logout-form').submit();"><i
                    class="fi-rs-sign-out mr-10"></i>Logout</a>
        </li>
    </ul>
</div>