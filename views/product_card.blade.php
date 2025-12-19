<div class="col-lg-3 col-md-4 col-sm-6 mb-3">
    <div class="product-card">
        <input type="hidden" name="product_id" value="{{ $product->id }}"/>
        <div class="product-thumb">
            <a href="{{ route('product', $product->id) }}"><img src="{{ $product->image }}" alt="{{ $product->title }}" class="product-img"></a>
        </div>
        <div class="product-details">
            <h4>
                <a href="{{ route('product', $product->id) }}" class="product-title">{{ $product->title }}</a>
            </h4>
            <p style="color: var(--accent-color)">{{ $product->category->title }}</p>
            <p class="product-excerpt">{{ $product->description }}</p>
            <div class="product-bottom-details d-flex justify-content-between">
                <div class="product-price">
                    <span class="price">{{ $product->price }}</span> руб.
                </div>

                <div class="product-links">
                    <button type="submit" class="btn btn-outline-secondary add-to-cart">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@pushonce('scripts')
    <script>
        $(document).ready(function() {
            $('.add-to-cart').on('click', function () {
                let id = $(this).parents('.product-card').find('input[name="product_id"]').val();
                let title = $(this).parents('.product-card').find('.product-title').text();
                let price = $(this).parents('.product-card').find('.price').text();
                let img = $(this).parents('.product-card').find('.product-img').attr('src');

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
