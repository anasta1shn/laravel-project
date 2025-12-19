@extends('layouts._layout')

@section('title', 'Корзина')

@section('content')
<main class="main">
    <div class="container-fluid">
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <h2 class="section-title text-center">
                    <span>Товары в корзине</span>
                </h2>
            </div>
        </div>
    </div>
    <div class="container-fluid cart-inner">
        <div class="row">
            <div class="col-lg-8 mb-3">
                <div class="p-3 h-100 bg-white">
                    <div class="table-responsive">
                        <table class="table align-middle table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Фото</th>
                                    <th>Товар</th>
                                    <th>Цена</th>
                                    <th>Количество</th>
                                    <th>Общая стоимость</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="cart-list">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-3 ">
                <div class="cart-summary p-3 sidebar sticky-top-2">
                    <div class="d-flex justify-content-between my-3">
                        <h3>Итого</h3>
                        <h3 class="total-price"></h3>
                    </div>
                    <div class="d-grid">
                        <a href="{{ route('checkout') }}" class="btn btn-primary">Перейти к оформлению заказа</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@pushonce('scripts')
    <script>
        $(document).ready(function() {
            let cart = JSON.parse(localStorage.getItem('cart'));
            let output = ``;

            if (cart !== null && cart.length > 0) {
                cart.forEach(item => {
                    output += `
                    <tr class="cart-list-item">
                        <input type="hidden" name="product_id" value="${item.product_id}"/>
                        <td class="product-img-td">
                            <a href="/product/${item.product_id}">
                                <img src="${item.product_img}" alt="">
                            </a>
                        </td>
                        <td>
                            <a href="/product/${item.product_id}" class="cart-content-title">
                                ${item.product_title}
                            </a>
                        </td>
                        <td>
                            ${item.product_price} руб.
                        </td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-danger mb-1 sub-product-btn">
                                <span>-</span>
                            </button>

                            <span class="ms-md-2 me-md-2 product-count">${item.count}</span>

                            <button type="submit" class="btn btn-sm btn-primary mb-1 add-product-btn">
                                <span>+</span>
                            </button>
                        </td>
                        <td>
                            <span class="product-total-price">${(item.product_price * item.count).toFixed(2)}</span> руб.
                        </td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-dark mb-1 delete-product-btn">
                                <span>X</span>
                            </button>
                        </td>
                    </tr>
                `
                })

                $('.cart-list').html(output);

                function getCurrentProductTotalPrice(cart, productId) {
                    let currentProduct = Object.keys(cart).find(k => cart[k].product_id === productId);
                    return (cart[currentProduct].product_price * cart[currentProduct].count).toFixed(2);
                }

                $(document).on('click', '.delete-product-btn', function() {
                    let id = $(this).parents('.cart-list-item').find('input[name="product_id"]').val();
                    let cart = JSON.parse(localStorage.getItem('cart'));

                    cart = cart.filter(item => {
                        if (item.product_id !== id) {
                            return item;
                        }
                    })

                    $(this).parents('.cart-list-item').remove();

                    if (cart.length > 0) {
                        $('.products-count').text(cart.reduce((sum, item) => sum + item.count, 0));
                    } else {
                        $('.products-count').text('');
                        $('.cart-inner').html(`
                            <div class="text-center">
                                <h3>Ваша корзина пуста</h3>
                                <a type="submit" class="btn btn-lg btn-primary mb-4 mt-4" href="{{ route('index') }}">
                                    <span>За покупками</span>
                                </a>
                            </div>
                        `);
                    }

                    $('.total-price').text(getTotalPrice(cart).toFixed(2) + ' руб.');

                    localStorage.setItem('cart', JSON.stringify(cart));

                    setCookie('cart', JSON.stringify(delUnnecessaryKeys(cart,
                        ['product_title', 'product_price', 'product_img']
                    )));
                })

                $(document).on('click', '.add-product-btn', function() {
                    let id = $(this).parents('.cart-list-item').find('input[name="product_id"]').val();
                    let count = Number($(this).siblings('.product-count').text());
                    let cart = JSON.parse(localStorage.getItem('cart'));

                    $(this).siblings('.product-count').text(count + 1);

                    cart.map(item => {
                        if (item.product_id === id) {
                            return item.count += 1;
                        }
                    })

                    $('.products-count').text(cart.reduce((sum, item) => sum + item.count, 0));
                    $(this).parents('.cart-list-item').find('.product-total-price').text(getCurrentProductTotalPrice(cart, id));
                    $('.total-price').text(getTotalPrice(cart).toFixed(2) + ' руб.');

                    localStorage.setItem('cart', JSON.stringify(cart));

                    setCookie('cart', JSON.stringify(delUnnecessaryKeys(cart,
                        ['product_title', 'product_price', 'product_img']
                    )));
                })

                $(document).on('click', '.sub-product-btn', function() {
                    let id = $(this).parents('.cart-list-item').find('input[name="product_id"]').val();
                    let count = Number($(this).siblings('.product-count').text());
                    let cart = JSON.parse(localStorage.getItem('cart'));

                    if (count > 1) {
                        $(this).siblings('.product-count').text(count - 1);

                        cart.map(item => {
                            if (item.product_id === id) {
                                return item.count -= 1;
                            }
                        })

                        $('.products-count').text(cart.reduce((sum, item) => sum + item.count, 0));
                        $(this).parents('.cart-list-item').find('.product-total-price').text(getCurrentProductTotalPrice(cart, id));
                        $('.total-price').text(getTotalPrice(cart).toFixed(2) + ' руб.');

                        localStorage.setItem('cart', JSON.stringify(cart));

                        setCookie('cart', JSON.stringify(delUnnecessaryKeys(cart,
                            ['product_title', 'product_price', 'product_img']
                        )));
                    }
                })

                $('.total-price').text(getTotalPrice(cart).toFixed(2) + ' руб.');
            } else {
                $('.cart-inner').html(`
                    <div class="text-center">
                        <h3>Ваша корзина пуста</h3>
                        <a type="submit" class="btn btn-lg btn-primary mb-4 mt-4" href="{{ route('index') }}">
                            <span>За покупками</span>
                        </a>
                    </div>
                `);
            }
        })
    </script>
@endpushonce
