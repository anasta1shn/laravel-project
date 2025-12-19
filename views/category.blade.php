@extends('layouts._layout', ['categories' => $categories, 'active_category' => $category->id])

@section('title', $category->title)

@section('content')
<main class="main">
    <div class="container-fluid">
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <h2 class="section-title text-center">
                    <span>{{ $category->title }}</span>
                </h2>
            </div>
        </div>

        <div class="row ">
            @if($products->isEmpty())
                <span class="fs-3">Пока что здесь пусто...</span>
            @else
                @foreach($products as $product)
                    @include('product_card', [
                        'product_code' => $product->code,
                        'product_image' => $product->image,
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
