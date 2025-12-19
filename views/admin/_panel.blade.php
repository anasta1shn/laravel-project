<!doctype html>
<html lang="ru">
<head>
    @include('layouts.styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>Панель администратора</title>
</head>
<body id="body-pd">
<header class="header" id="header">
    <div class="header_toggle"><i class='bx bx-menu' id="header-toggle"></i></div>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a class="nav_logo">
                <i class='fa-solid fa-unlock-keyhole nav_logo-icon'></i>
                <span class="nav_logo-name">Панель администратора</span>
            </a>

            <div class="nav_list">
                <a href="{{ route('users.index') }}" class="nav_link" id="users">
                    <i class='bx bx-user nav_icon'></i>
                    <span class="nav_name">Пользователи</span>
                </a>
                <a href="{{ route('orders.index') }}" class="nav_link" id="orders">
                    <i class='bx bx-money-withdraw nav_icon'></i>
                    <span class="nav_name">Заказы</span>
                </a>
                <a href="{{ route('products.index') }}" class="nav_link" id="products">
                    <i class='bx bx-cart nav_icon'></i>
                    <span class="nav_name">Продукция</span>
                </a>
                <a href="{{ route('categories.index') }}" class="nav_link" id="categories">
                    <i class='bx bx-category nav_icon'></i>
                    <span class="nav_name">Категории</span>
                </a>
            </div>
        </div>
        <a href="{{ route('index') }}" class="nav_link">
            <i class='bx bx-log-out nav_icon'></i>
            <span class="nav_name">Выйти</span>
        </a>
    </nav>
</div>
<!--Container Main start-->
<div class="height-100">
    @yield('content')
</div>
<!--Container Main end-->
</body>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {

        const showNavbar = (toggleId, navId, bodyId, headerId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId),
                headerpd = document.getElementById(headerId)

            // Validate that all variables exist
            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener('click', () => {
                    // show navbar
                    nav.classList.toggle('show')
                    // change icon
                    toggle.classList.toggle('bx-x')
                    // add padding to body
                    bodypd.classList.toggle('body-pd')
                    // add padding to header
                    headerpd.classList.toggle('body-pd')
                })
            }

            const currentCategory = document.getElementById(window.location.pathname.split('/')[2]);

            if (currentCategory) {
                currentCategory.classList.add('active')
            }

        }

        showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

        /*===== LINK ACTIVE =====*/
        // const linkColor = document.querySelectorAll('.nav_link')
        // const currentCategory = window.location.pathname.split('/').at(-1);
        // const activeCategory = document.getElementById(currentCategory)
        // console.log(currentCategory)
        //
        // function colorLink() {
        //     if (linkColor) {
        //         linkColor.forEach(l => l.classList.remove('active'))
        //         activeCategory.classList.add('active')
        //     }
        // }
        //
        // linkColor.forEach(l => l.addEventListener('click', colorLink))

        // Your code to run since DOM is loaded and ready
    });
</script>
</html>
