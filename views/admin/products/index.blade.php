@extends('admin._panel')

@section('content')
    <h4>Продукция</h4>
    <div class="table-responsive">
        <table class="table align-middle table-hover">
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Изображение</th>
                <th class="col-sm-2">Описание</th>
                <th>Вес</th>
                <th>Цена</th>
                <th>Категория</th>
                <th class="text-center">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        {{ $product->id }}
                    </td>
                    <td>
                        {{ $product->title }}
                    </td>
                    <td>
                        <img src="{{ $product->image }}" alt="{{ $product->code }}" class="admin-product-img">
                    </td>
                    <td>
                        {{ $product->description }}
                    </td>
                    <td>
                        {{ $product->weight }}
                    </td>
                    <td>
                        {{ $product->price }}
                    </td>
                    <td>
                        {{ $product->category->title }}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('products.edit', $product) }}" role="button" class="btn btn-sm btn-outline-secondary">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('products.create') }}" role="button" class="btn btn-sm btn-primary mb-1">
        <i class="fa-solid fa-plus"></i> Добавить
    </a>

    @if(!$products->isEmpty())
        {{ $products->links() }}
    @endif
@endsection
