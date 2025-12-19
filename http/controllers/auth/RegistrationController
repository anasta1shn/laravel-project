<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function registrationView()
    {
        if (Auth::check()) {
            return redirect(route('index'));
        }

        return view('auth.registration')->with([
            'categories' => Category::orderBy('id')->get()
        ]);
    }

    public function registration(RegistrationRequest $request)
    {
        if (Auth::check()) {
            return redirect(route('index'));
        }

        $user = User::create($request->all());
        Auth::login($user);

        return redirect(route('index'));
    }
}
