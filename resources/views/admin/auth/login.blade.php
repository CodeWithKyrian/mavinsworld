<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Administrator Login | Marvins World</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />
    <!-- Template CSS -->
    <link href="/css/admin/main.css?v=1.1" rel="stylesheet" type="text/css" />
</head>

<body>
    <main class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh">
        <section class="content-main ">
            <div class="card mx-auto card-login">
                <div class="card-body">
                    <h4 class="card-title mb-4">Sign in</h4>
                    <form method="POST" action="{{route('admin.login')}}">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control" placeholder="Email" type="email" name="email" required/>
                        </div>
                        <!-- form-group// -->
                        <div class="mb-3">
                            <input class="form-control" placeholder="Password" type="password" name="password" required/>
                        </div>
                        <!-- form-group// -->
                        <div class="mb-3">
                            <a href="#" class="float-end font-sm text-muted">Forgot password?</a>
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" />
                                <span class="form-check-label">Remember</span>
                            </label>
                        </div>
                        <!-- form-group form-check .// -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </div>
                        <!-- form-group// -->
                    </form>
                    {{-- <p class="text-center mb-4">Don't have account? <a href="#">Sign up</a></p> --}}
                </div>
            </div>
        </section>
        <footer class="text-center">
            <p class="font-xs">
                <script>
                    document.write(new Date().getFullYear());
                </script>
                &copy; Marvins World . All Rights Reserved
            </p>
            <p class="font-xs mb-30">Powered By CodeWithKyrian</p>
        </footer>
    </main>
    <script src="/js/vendors/bootstrap.bundle.min.js"></script>
</body>

</html>