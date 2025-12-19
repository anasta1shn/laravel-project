<!doctype html>
<html lang="ru">
<head>
    @include('layouts.styles')
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div class="wrapper">
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')
</div>

@include('layouts.scripts')
@stack('scripts')

<script>
    if (getCookie('cart') === undefined) {
        let cart = JSON.parse(localStorage.getItem('cart'));

        if (cart !== null) {
            setCookie('cart', JSON.stringify(delUnnecessaryKeys(cart,
                ['product_title', 'product_price', 'product_img']
            )));
        }
    }
</script>
</body>
</html>

