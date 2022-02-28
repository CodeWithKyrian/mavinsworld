<x-app-layout title="Account Login">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb light">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                 <span></span> Login
            </div>
        </div>
    </div>
    <div class="page-content pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 pr-30 d-none d-lg-block">
                            <img class="border-radius-15" src="{{asset('img/about/about-marvins-one.jpg')}}" alt="" />
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h1 class="heading-1 mb-5">Login</h1>
                                        <p class="mb-30">Don't have an account? <a href="{{route('auth.register')}}">Create
                                                here</a></p>
                                    </div>
                                    <form method="POST" action="{{route('auth.login')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" required name="email"
                                                placeholder="Email *" />
                                                @error('email')
                                                <p class="font-sm text-red">{{$message}}</p>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input required type="password" name="password"
                                                placeholder="Your password *" />
                                        </div>
                                        <div class="login_footer form-group mb-50">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="remember" checked autocomplete="off"
                                                        id="exampleCheckbox1"/>
                                                    <label class="form-check-label"
                                                        for="exampleCheckbox1"><span>Remember me</span></label>
                                                </div>
                                            </div>
                                            <a class="text-muted" href="{{route('auth.password.request')}}">Forgot password?</a>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-heading btn-block hover-up"
                                                name="login">Log in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>