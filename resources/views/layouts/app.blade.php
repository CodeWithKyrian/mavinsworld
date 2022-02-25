<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{$title }} | {{config('app.name')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="/css/app/main.css" />
    <script>
        var MARVINS = MARVINS || {};
    </script>
</head>

<body>
    @include('frontend.partials._header')

    <main class="main" style="overflow-x: hidden">
        {{$slot}}
    </main>

    @include('frontend.partials._footer')

    <script src="/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/js/plugins/slick.js"></script>
    <script src="/js/plugins/jquery.syotimer.min.js"></script>
    <script src="/js/plugins/waypoints.js"></script>
    <script src="/js/plugins/wow.js"></script>
    <script src="/js/plugins/perfect-scrollbar.js"></script>
    <script src="/js/plugins/magnific-popup.js"></script>
    <script src="/js/plugins/select2.min.js"></script>
    <script src="/js/plugins/counterup.js"></script>
    <script src="/js/plugins/jquery.countdown.min.js"></script>
    <script src="/js/plugins/images-loaded.js"></script>
    <script src="/js/plugins/isotope.js"></script>
    <script src="/js/plugins/scrollup.js"></script>
    <script src="/js/plugins/jquery.vticker-min.js"></script>
    <script src="/js/plugins/jquery.theia.sticky.js"></script>
    <script src="/js/plugins/jquery.elevatezoom.js"></script>
    <script src="/js/plugins/notify.js"></script>
    <script src="/js/plugins/prettify.js"></script>
    <!-- Template  JS -->
    <script src="/js/app/main.js"></script>
    <script src="/js/app/marvins-core.js"></script>
    <script src="/js/app/shop.js"></script>

    {!! app('Tightenco\Ziggy\BladeRouteGenerator')->generate() !!}

    <script>
        @foreach (session('flash_notification', collect())->toArray() as $message)
            MARVINS.plugins.notify('{{ $message['level'] }}', '{{ $message['message'] }}');
        @endforeach
    </script>

    <script>
        function updateUiCart(view, count)
        {
            $('.cart-dropdown').html(view)
            $('.cart-count').html(count)
        }

        function addToCart(){
            $('#cart-add .loading-overlay').show()
            $('#cart-add #idle').addClass('invisible')
            $.ajax({
                type:"POST",
                url: route('cart.add'),
                data: $('#product-buy-form').serializeArray(),
                success: function(data){
                    MARVINS.plugins.notify('success', 'Item added to cart!')
                    updateUiCart(data.cart_view, data.cart_count);
                },
                complete: function () {
                    $('#cart-add .loading-overlay').hide()
                    $('#cart-add #idle').removeClass('invisible')
                }
            });
        }

        function removeFromCart(item_id)
        {
            $('.cart-dropdown .loading-overlay').show()
            $.ajax({
                type:"POST",
                url: route('cart.remove'),
                data: {
                    _token: MARVINS.data.csrf,
                    item_id: item_id,
                },
                success: function(data){
                    MARVINS.plugins.notify('success', 'Item removed from cart!')
                    updateUiCart(data.cart_view, data.cart_count);
                },
                complete: function(){
                    $('.cart-dropdown .loading-overlay').hide()
                }
            });
        }

        $('[data-product-id]').click(function (){
            $(this).children('.loading-overlay').eq(0).show()
            $(this).children('#idle').eq(0).addClass('invisible')

            const myObj = this;
            const product_id = $(this).data('product-id');
            
            $.ajax({
                type:"POST",
                url: route('cart.add'),
                data: {
                    _token: MARVINS.data.csrf,
                    quantity: 1,
                    product_id: product_id
                },
                success: function(data){
                    MARVINS.plugins.notify('success', 'Item added to cart!')
                    updateUiCart(data.cart_view, data.cart_count)
                },
                complete: function () {
                    $(myObj).children('.loading-overlay').eq(0).hide()
                    $(myObj).children('#idle').eq(0).removeClass('invisible')
                }
            });
        })
        
        function switchAction()
        {
            const action = $('#search-form-lg option:selected').data('action')
            $('#search-form-lg').attr('action', action)
        }
    </script>
    @stack('inline-scripts')
</body>

</html>