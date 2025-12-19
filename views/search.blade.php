@extends('layouts._layout')

@section('title', !empty($_GET['search']) ? $_GET['search'] : 'Пустой запрос')

@section('content')
    <main class="main">
        <div class="container-fluid">
            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <h2 class="section-title text-center">
                        <span>{{ !empty($_GET['search']) ? $_GET['search'] : 'Пустой запрос' }}</span>
                    </h2>
                </div>
            </div>

            <div class="row ">
                @if($products->isEmpty())
                    <span class="fs-3">Ничего не найдено по вашему запросу...</span>
                @else
                    @foreach($products as $product)
                        @include('product_card', [
                            'product_image' => $product->image,
                            'product_code' => $product->code,
                            'product_title' => $product->title,
                            'product_description' => $product->description,
                            'product_price' => $product->price,
                            'product_category' => $product->category->title
                        ])
                    @endforeach
                @endif
            </div>

            @if(!$products->isEmpty())
                {{ $products->links() }}
            @endif
        </div>
    </main>
@endsection
