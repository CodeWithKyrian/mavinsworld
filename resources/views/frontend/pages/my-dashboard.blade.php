<x-app-layout title="My Account">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb light">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> My Account <span></span> Dashboard
            </div>
        </div>
    </div>
    <div class="page-content pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            @include('frontend.partials._dashboard-menu')
                        </div>
                        <div class="col-md-9">
                            <div class="account dashboard-content lg-pl-50">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Hello {{ auth()->user()->firstname }}!</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            From your account dashboard. you can easily check &amp; view your <a
                                                href="{{route('account.orders.index')}}">recent orders</a> and <a
                                                href="{{route('account.details')}}">edit your password and account details.</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
