@extends('layouts._layout')

@section('title', 'Мои заказы')

@section('content')
    <main class="main">
        <div class="container-fluid">
            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <h2 class="section-title text-center">
                        <span>Мои заказы</span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            @if(!($orders->all()))
                <span class="fs-3">Вы пока не совершали заказов...</span>
            @else
            <div class="row">
                <div class="col-lg-8 mb-3">
                    <div class="p-3 h-100 bg-white">
{{--                        cart-content--}}
                        @foreach($orders as $order)
                            <span>Заказ № {{ str_pad($order->id, 10, '0', STR_PAD_LEFT) }}</span>
                            <br>
                            <span>Дата оформления: {{ \Carbon\Carbon::parse($order->date)->setTimezone('Asia/Yekaterinburg')->format('d.m.Y, H:i') }}</span>
                            <br>
                            <span>Адрес доставки: {{ $order->client_address }}</span>
                            <br>
                            <span>Сумма заказа: {{ $order->price }} руб.</span>
                            <br>
                            <span>Статус: <strong>{{ STATUSES[$order->status] }}</strong></span>
                            <br>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$order->id}}" aria-expanded="false" aria-controls="collapse-{{$order->id}}">
                                Состав заказа
                            </button>
                            <br>
                            <br>
                            <div class="table-responsive collapse" id="collapse-{{$order->id}}">
                                <table class="table align-middle table-hover">
                                    <thead class="table-dark">
                                    <tr>
                                        <th>Фото</th>
                                        <th>Товар</th>
                                        <th>Цена</th>
                                        <th>Количество</th>
                                        <th>Общая стоимость</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->products as $product)
                                            <tr>
                                                <td class="product-img-td">
                                                    <a href="{{ route('product', $product->id) }}">
                                                        <img src="{{ $product->image }}" alt="">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('product', $product->id) }}" class="cart-content-title">
                                                        {{ $product->title }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $product->price }} руб.
                                                </td>
                                                <td>
                                                    <span class="ms-md-2 me-md-2">{{ $product->pivot->quantity }}</span>
                                                </td>
                                                <td>
                                                    {{ number_format($product->getTotalPrice(), 2) }} руб.
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </main>
@endsection
