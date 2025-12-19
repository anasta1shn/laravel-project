@extends('layouts._layout')

@section('title', $product->title)

@section('content')
    <main class="main">
        <div class="container-fluid">
            <input type="hidden" name="product_id" value="{{ $product->id }}"/>
            <div class="row pt-3">
                <div class="col-md-5 col-lg-4 mb-3">
                    <div class="bg-white">
                        <div class="product-thumb">
                            <a href="{{ route('product', $product->id) }}"><img src="{{ asset($product->image) }}" alt="{{ $product->title }}" class="product-img"></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-lg-8 mb-3">
                    <div class="bg-white product-content p-3 h-100">
                        <h1 class="section-title h3"><span class="ps-0 product-title">{{ $product->title }}</span></h1>
                        <p style="color: var(--accent-color)">{{ $product->category->title }}</p>

                        @isset($product->description)<p>Описание: {{ $product->description }}</p>@endisset

                        <p>Вес: {{ $product->weight }} г./шт.</p>

                        <div class="product-price">
                            <span class="price">{{ $product->price }}</span> руб.
                        </div>

                        <div class="product-add2cart">
                            <div class="input-group">
                                <button type="submit" class="btn btn-outline-secondary add-to-cart"><i class="fas fa-shopping-cart"></i> В корзину</button>
                            </div>
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
            $('.add-to-cart').on('click', function () {
                let id = $(this).parents('.container-fluid').find('input[name="product_id"]').val();
                let title = $(this).parents('.container-fluid').find('.product-title').text();
                let price = $(this).parents('.container-fluid').find('.price').text();
                let img = $(this).parents('.container-fluid').find('.product-img').attr('src');

                let product = {
                    product_id: id,
                    product_title: title,
                    product_price: price,
                    product_img: img,
                    count: 1,
                };

                let result;
                let cart = JSON.parse(localStorage.getItem('cart'));

                if (cart == null) {
                    result = [product];
                } else {
                    let match = false;

                    cart.map(item => {
                        if (item.product_id === product.product_id) {
                            match = true;
                            return item.count += 1;
                        }
                    })

                    if (match) {
                        result = cart;
                    } else {
                        result = [...cart, product]
                    }
                }

                $('.products-count').text(result.reduce((sum, item) => sum + item.count, 0));
                localStorage.setItem('cart', JSON.stringify(result));

                setCookie('cart', JSON.stringify(delUnnecessaryKeys(result,
                    ['product_title', 'product_price', 'product_img']
                )));
            })
        })
    </script>
@endpushonce
