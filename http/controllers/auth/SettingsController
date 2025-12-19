<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function userSettingsView() {
        $user = auth()->user();

        return view('auth.user_settings')->with([
            'user' => $user,
            'categories' => Category::orderBy('id')->get()
        ]);
    }

    public function changeName(SettingsRequest $request) {
        $user = auth()->user();
        $user->saveName($request->get('username'));

        return redirect(route('user.userSettings'));
    }

    public function changeEmail(SettingsRequest $request) {
        $user = auth()->user();
        $user->saveEmail($request->get('email'));

        return redirect(route('user.userSettings'));
    }

    public function changePassword(SettingsRequest $request) {
        $user = auth()->user();
        $user->savePassword($request->get('password'));

        return redirect(route('user.userSettings'));
    }

    public function changeAddress(SettingsRequest $request) {
        $user = auth()->user();
        $user->saveAddress($request->get('address'));

        return redirect(route('user.userSettings'));
    }

    public function changePhone(SettingsRequest $request) {
        $user = auth()->user();
        $user->savePhone($request->get('phone_number'));

        return redirect(route('user.userSettings'));
    }
}
