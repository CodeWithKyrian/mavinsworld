<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $title }} | {{ config('app.name') }}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}" />
    <script>
        var MARVINS = MARVINS || {};
    </script>
</head>

<body>
    <div class="screen-overlay"></div>
    <aside class="navbar-aside" id="offcanvas_aside">
        <div class="aside-top">
            <a href="index.html" class="brand-wrap">
                <img src="/img/mavinsworld.png" class="logo" alt="Marvins Wolrd" />
            </a>
            <div>
                <button class="btn btn-icon btn-aside-minimize"><i
                        class="text-muted material-icons md-menu_open"></i></button>
            </div>
        </div>
        <nav>
            <ul class="menu-aside">
                <li class="menu-item @route('admin.dashboard') active @endroute">
                    <a class="menu-link" href="{{ route('admin.dashboard') }}">
                        <i class="icon material-icons md-home"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="menu-item has-submenu @route('admin.product.*') active @endroute">
                    <a class="menu-link" href="">
                        <i class="icon material-icons md-shopping_bag"></i>
                        <span class="text">Products</span>
                    </a>
                    <div class="submenu">
                        <a href="{{ route('admin.product.index') }}">All Products</a>
                        <a href="{{ route('admin.product.create') }}">Add New Product</a>
                    </div>
                </li>
                <li class="menu-item has-submenu @route('admin.category.*') active @endroute">
                    <a class="menu-link" href="">
                        <i class="icon material-icons md-shopping_bag"></i>
                        <span class="text">Categories</span>
                    </a>
                    <div class="submenu">
                        <a href="{{ route('admin.category.index') }}">All Categories</a>
                        <a href="{{ route('admin.category.create') }}">Add New Category</a>
                    </div>
                </li>
                <li class="menu-item @route('admin.order.*') active @endroute">
                    <a class="menu-link" href="{{ route('admin.order.index') }}">
                        <i class="icon material-icons md-shopping_cart"></i>
                        <span class="text">Orders</span>
                    </a>
                </li>
                <li class="menu-item @route('admin.review.*') active @endroute">
                    <a class="menu-link" href="{{route('admin.review.index')}}">
                        <i class="icon material-icons md-comment"></i>
                        <span class="text">Reviews</span>
                    </a>
                </li>
                {{-- <li class="menu-item">
                    <a class="menu-link" disabled href="#">
                        <i class="icon material-icons md-pie_chart"></i>
                        <span class="text">Statistics</span>
                    </a>
                </li> --}}
            </ul>
            <hr />
            <ul class="menu-aside">
                <li class="menu-item has-submenu @route('admin.settings.*') active @endroute">
                    <a class="menu-link" href="#">
                        <i class="icon material-icons md-settings"></i>
                        <span class="text">Settings</span>
                    </a>
                    <div class="submenu">
                        <a href="{{route('admin.settings.general.index')}}">General Settings</a>
                        <a href="{{route('admin.settings.shipping.index')}}">Shipping Settings</a>
                    </div>
                </li>
            </ul>
            <br />
            <br />
        </nav>
    </aside>
    <main class="main-wrap">
        <header class="main-header navbar">
            <div class="col-search">
                <form class="searchform">
                    <div class="input-group">
                        <input list="search_terms" type="text" class="form-control" placeholder="Search term" />
                        <button class="btn btn-light bg" type="button"><i class="material-icons md-search"></i></button>
                    </div>
                    <datalist id="search_terms">
                        <option value="Products"></option>
                        <option value="New orders"></option>
                        <option value="Apple iphone"></option>
                        <option value="Ahmed Hassan"></option>
                    </datalist>
                </form>
            </div>
            <div class="col-nav">
                <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"><i
                        class="material-icons md-apps"></i></button>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link btn-icon" href="#">
                            <i class="material-icons md-notifications animation-shake"></i>
                            <span class="badge rounded-pill">3</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-icon darkmode" href="#">
                            <i class="material-icons md-nights_stay"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="requestfullscreen nav-link btn-icon">
                            <i class="material-icons md-cast"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-icon" href="{{route('home')}}" target="_blank">
                            <i class="material-icons md-public"></i>
                        </a>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount"
                            aria-expanded="false"> <img class="img-xs rounded-circle" src="/img/people/avatar-2.png"
                                alt="User" /></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                            <a class="dropdown-item" href="#"><i class="material-icons md-perm_identity"></i>Edit
                                Profile</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-settings"></i>Account
                                Settings</a>
                            <a class="dropdown-item" href="#"><i
                                    class="material-icons md-account_balance_wallet"></i>Wallet</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-receipt"></i>Billing</a>
                            <a class="dropdown-item" href="#"><i class="material-icons md-help_outline"></i>Help
                                center</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#"><i
                                    class="material-icons md-exit_to_app"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <section class="content-main">
            {{ $slot }}
        </section>
        <!-- content-main end// -->
        <footer class="main-footer font-xs">
            <div class="row pb-30 pt-15">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    &copy; Marvins World - Powered By CodeWithKyrian .
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end">All rights reserved</div>
                </div>
            </div>
        </footer>
    </main>
    <script src="/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/js/plugins/select2.min.js"></script>
    <script src="/js/plugins/perfect-scrollbar.js"></script>
    <script src="/js/plugins/jquery.fullscreen.min.js"></script>
    <script src="/js/plugins/chart.js"></script>
    <script src="/js/plugins/notify.js"></script>
    <script src="/js/plugins/prettify.js"></script>

    <!-- Main Script -->
    <script src="/js/admin/main.js" type="text/javascript"></script>
    <script src="/js/admin/custom-chart.js" type="text/javascript"></script>
    <script src="/js/app/marvins-core.js"></script>

    {!! app('Tightenco\Ziggy\BladeRouteGenerator')->generate() !!}

    <script>
        @foreach (session('flash_notification', collect())->toArray() as $message)
            MARVINS.plugins.notify('{{ $message['level'] }}', '{{ $message['message'] }}');
        @endforeach
    </script>

    @stack('inline-scripts')
</body>

</html>
