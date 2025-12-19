@extends('layouts._layout')

@section('title', 'Регистрация')

@section('content')
    <main class="main">
        <div class="container-fluid">
            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <h2 class="section-title text-center h3">
                        <span>Регистрация</span>
                    </h2>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <form action="{{ route('user.registration') }}" method="POST">
                                <div class="mb-3">
                                    <label for="registrationInputUsername" class="form-label required">Имя</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                           id="registrationInputUsername" name="username" placeholder="Имя пользователя" value="{{ old('username') }}">

                                    @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="registrationInputEmail" class="form-label required">Почта</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                           id="registrationInputEmail" name="email" placeholder="Email" value="{{ old('email') }}">

                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="registrationInputPassword" class="form-label required">Пароль</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="registrationInputPassword" name="password" placeholder="Пароль">

                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                                @csrf

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
