@extends('admin._panel')

@section('content')
    <h4>{{ $form_title }}</h4>

    <form method="POST" enctype="multipart/form-data"
          @isset($product)
              action="{{ route('products.update', $product) }}"
          @else
              action="{{ route('products.store') }}"
          @endisset
    >
        @isset($product)
            @method('PUT')
        @endisset

        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="productInputTitle" class="form-label required">Название</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
                   id="productInputTitle" name="title" placeholder="Название продукции" value="{{ old('title') ?? $product->title ?? '' }}">

            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="productInputImage" class="form-label">Изображение</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror"
                   id="productInputImage" name="image">

            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="productInputDescription" class="form-label">Описание</label>
            <textarea class="form-control @error('description') is-invalid @enderror"
                      id="productInputDescription" name="description" placeholder="Описание продукции"
            >{{ old('description') ?? $product->description ?? '' }}</textarea>

            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="productInputWeight" class="form-label required">Вес</label>
            <input type="text" class="form-control @error('weight') is-invalid @enderror"
                   id="productInputWeight" name="weight" placeholder="Вес продукции" value="{{ old('weight') ?? $product->weight ?? '' }}">

            @error('weight')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="productInputPrice" class="form-label required">Цена</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror"
                   id="productInputPrice" name="price" placeholder="Цена продукции" value="{{ old('price') ?? $product->price ?? '' }}">

            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="productSelectCategory" class="form-label">Категория</label>
            <select class="form-select" aria-label="Выберите категорию продукции" id="productSelectCategory" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(isset($product) && $product->category_id === $category->id) selected @endif>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>


        @csrf
        <button type="submit" class="btn btn-sm btn-success">Сохранить</button>
    </form>
@endsection


