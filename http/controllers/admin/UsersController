<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->paginate(10);

        return view('admin.users.index')->with([
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('admin.users.form')->with([
            'form_title' => 'Добавить пользователя',
        ]);
    }

    public function store(UserRequest $request)
    {
        $params = $request->all();
        $phone = $params['phone_number'];

        if (isset($phone)) {
            if (Str::startsWith($phone, '+7')) {
                $params['phone_number'] = substr($phone, 1);
            } else {
                $params['phone_number'] = '7' . substr($phone, 1);
            }
        }

        User::create($params);

        return redirect(route('users.index'));
    }
}
