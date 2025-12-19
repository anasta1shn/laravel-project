<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView() {
        if (Auth::check()) {
            return redirect(route('index'));
        }

        return view('auth.login')->with([
            'categories' => Category::orderBy('id')->get()
        ]);
    }

    public function login(Request $request) {
        if (Auth::check()) {
            return redirect(route('index'));
        }

        $formFields = $request->only(['email', 'password']);

        if (Auth::attempt($formFields)) {
            return redirect()->intended(route('index'));
        }

        return redirect(route('user.login'))->withErrors([
            'formError' => 'Неправильная почта или пароль'
        ]);
    }
}
