@extends('admin._panel')

@section('content')
    <h4>{{ $form_title }}</h4>

    <form method="POST" action="{{ route('users.store') }}">
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="userInputName" class="form-label required">Имя</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror"
                   id="userInputName" name="username" placeholder="Имя пользователя" value="{{ old('username') }}">

            @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="userInputEmail" class="form-label required">Почта</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror"
                   id="userInputEmail" name="email" placeholder="Email" value="{{ old('email') }}">

            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="userInputPassword" class="form-label required">Пароль</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                   id="userInputPassword" name="password" placeholder="Пароль">

            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="userInputAddress" class="form-label">Адрес доставки</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror"
                      id="userInputAddress" name="address" placeholder="г. Екатеринбург, ул. Крауля, д. 168, к. 2, кв. 111" value="{{ old('address') }}">

            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 col-xl-5 col-lg-7 col-md-9">
            <label for="userInputPhone" class="form-label">Номер телефона</label>
            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                   id="userInputPhone" name="phone_number" placeholder="Введите номер телефона (+7 | 8)" value="{{ old('phone_number') }}">

            @error('phone_number')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @csrf
        <button type="submit" class="btn btn-sm btn-success">Сохранить</button>
    </form>
@endsection



