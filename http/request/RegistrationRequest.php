<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:224', 'unique:users'],
            'password' => ['required', 'string', 'regex:/^[a-zA-Z0-9]+$/', 'min:8', 'max:64']
        ];
    }

    public function messages(): array {
        return [
            'required' => 'Поле должно быть заполнено',
            'max' => 'Не более 50 символов',
            'email' => 'Некорректный формат email',
            'email.max' => 'Не более 224 символов',
            'email.unique' => 'Пользователь с таким email уже зарегистрирован',
            'password.min' => 'Не менее 8 символов',
            'password.max' => 'Не более 64 символов',
            'password.regex' => 'Пароль должен состоять только из английских букв и цифр'
        ];
    }
}
