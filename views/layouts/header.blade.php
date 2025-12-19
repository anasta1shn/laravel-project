<header class="header">
    <div class="header-top py-1">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-6 col-md-4">
                    <a href="{{ route('index') }}" class="header-logo h1"><img src="/img/bread_logo.svg" alt="Bread" class="bread-logo"/></a>
                </div>

                <div class="col-12 col-md-4 order-md-1 order-2 d-md-block d-flex justify-content-center mt-1 mt-md-0 mb-md-0 mb-1 p-0">
                    <form action="{{ route('search') }}">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Поиск" aria-label="Поиск" aria-describedby="button-search" value="{{ $_GET['search'] ?? '' }}">
                            <button class="btn btn-outline-secondary" type="submit" id="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-end order-md-2 order-1">
                    <div class="header-top-signbtns">
                        @guest
                            <a href="{{ route('user.login') }}">
                                <button type="button" class="btn btn-sm">
                                    Вход
                                </button>
                            </a>
                            <a href="{{ route('user.registration') }}">
                                <button type="button" class="btn btn-sm">
                                    Регистрация
                                </button>
                            </a>
                        @endguest
                        @auth

                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary-outline btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Аккаунт
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark z-4">
                                        <li class="dropdown-header" style="color: var(--accent-color)">{{ auth()->user()->username }}</li>
                                        <li><a class="dropdown-item" href="{{ route('user.userOrders') }}">Мои заказы</a></li>
                                        <li><a class="dropdown-item" href="{{ route('user.userSettings') }}">Настройки</a></li>

                                        @if(auth()->user()->isAdmin())
                                            <li><a class="dropdown-item" href="{{ route('users.index') }}">Панель администратора</a></li>
                                        @endif
                                    </ul>
                                </div>
                            <a href="{{ route('user.logout') }}">
                                <button type="button" class="btn btn-sm">
                                    Выйти
                                </button>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="header-top"></div> --}}
</header>

<div class="header-bottom sticky-top z-3">
    <nav class="navbar navbar-expand-sm bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-start" id="navbarNav" tabindex="-1" aria-labelledby="offcanvasLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title " id="offcanvasProductsLabel" style="color: var(--accent-color)">Наша продукция</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav m-auto">
                        @foreach($categories as $category)
                            <li class="nav-item">
                                <a {!!(isset($active_category) && $active_category === $category->id) ?
                                        'class="nav-link active" aria-current="page"' :
                                        'class="nav-link"'!!}
                                        href="{{ route('category', $category->id) }}">
                                    {{ $category->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div id="navbar-cart">
                <a href="{{ asset('cart') }}">
                    <button class="btn position-relative" type="button">
                        <i class="fa-solid fa-cart-shopping cart-shopping-navbar"></i>
                        <span class="position-absolute top-0 start-50 badge rounded-pill bg-danger products-count"></span>
                    </button>
                </a>
            </div>
        </div>
    </nav>
</div>
{{-- <div class="header-bottom"></div> --}}

 @if(session()->has('warning'))
     <p class="alert alert-danger text-center m-1">{{ session()->get('warning') }}</p>
 @endif

 @if(session()->has('success'))
     <p class="alert alert-success text-center m-1">{{ session()->get('success') }}</p>
 @endif

 @pushonce('scripts')
     <script>
         $(document).ready(function() {
             let cart = JSON.parse(localStorage.getItem('cart'));

             if (cart != null) {
                 if (cart.length > 0) {
                     $('.products-count').text(cart.reduce((sum, item) => sum + item.count, 0));
                 }
             }
         })
     </script>
 @endpushonce

