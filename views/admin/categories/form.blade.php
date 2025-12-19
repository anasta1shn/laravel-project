@extends('admin._panel')

@section('content')
    <h4>{{ $form_title }}</h4>

    <form method="POST"
        @isset($category)
            action="{{ route('categories.update', $category) }}"
        @else
            action="{{ route('categories.store') }}"
        @endisset
    >
        @isset($category)
            @method('PUT')
        @endisset
{{--        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">--}}
{{--            <label for="categoryInputCode" class="form-label required">Код</label>--}}
{{--            <input type="text" class="form-control @error('code') is-invalid @enderror"--}}
{{--                   id="categoryInputCode" name="code" placeholder="Код категории" value="{{ old('code') ?? $category->code ?? '' }}">--}}

{{--            @error('code')--}}
{{--            <div class="invalid-feedback">{{ $message }}</div>--}}
{{--            @enderror--}}
{{--        </div>--}}
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="categoryInputTitle" class="form-label required">Название</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
                   id="categoryInputTitle" name="title" placeholder="Название категории" value="{{ old('title') ?? $category->title ?? '' }}">

            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @csrf
        <button type="submit" class="btn btn-sm btn-success">Сохранить</button>
    </form>
@endsection

