@extends('layouts._layout')

@section('title', 'Подтверждение заказа')

@section('content')
    <main class="main">
        <div class="container-fluid">
            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <h2 class="section-title text-center h3">
                        <span>Подтверждение заказа</span>
                    </h2>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <form action="{{ route('confirmOrder') }}" method="POST" class="needs-validation" novalidate>
                                <div class="mb-3">
                                    <label for="cartInputAddress" class="form-label required">Адрес доставки</label>
                                    <input type="text" class="form-control mt-1 @error('address') is-invalid @enderror"
                                           id="cartInputAddress" name="address" placeholder="г. Екатеринбург, ул. Крауля, д. 168, к. 2, кв. 111" value="{{ old('address') ?? $address ?? '' }}">

                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="cartInputPhone" class="form-label required">Номер телефона</label>
                                    <input type="text" class="form-control mt-1 @error('phone') is-invalid @enderror"
                                           id="cartInputPhone" name="phone" placeholder="Введите номер телефона (+7 | 8)" value="@if($phone && !old('phone'))+@endif{{ old('phone') ?? $phone ?? '' }}">

                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 cart-summary">
                                    <h3>Итого: <span class="total-price"></span> руб.</h3>
                                </div>
                                @csrf
                                <button type="submit" class="btn btn-primary" onclick="setCookie('cart', JSON.stringify(JSON.parse(localStorage.getItem('cart'))));
                                    localStorage.clear();">Оформить заказ</button>
                            </form>
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

            if (cart === null) {
                cart = JSON.parse(getCookie('cart'));
                console.log(cart);
                localStorage.setItem('cart', JSON.stringify(cart));
            }

            $('.total-price').text(getTotalPrice(cart).toFixed(2));
        })
    </script>
@endpushonce

