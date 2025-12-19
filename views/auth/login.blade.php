@extends('layouts._layout')

@section('title', 'Вход')

@section('content')
    <main class="main">
        <div class="container-fluid">
            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <h2 class="section-title text-center h3">
                        <span>Вход</span>
                    </h2>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <form action="{{ route('user.login') }}" method="POST">
                                <div class="mb-3">
                                    <label for="loginInputEmail" class="form-label required">Почта</label>
                                    <input type="email" class="form-control @error('formError') is-invalid @enderror"
                                           id="loginInputEmail" name="email" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label for="loginInputPassword" class="form-label required">Пароль</label>
                                    <input type="password" class="form-control @error('formError') is-invalid @enderror"
                                           id="loginInputPassword" name="password" placeholder="Пароль">
                                    @error('formError')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @csrf
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Войти</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
