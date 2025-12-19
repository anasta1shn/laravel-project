<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'user.userChangeName' => [
                'username' => ['required', 'string', 'max:50']
            ],
            'user.userChangeEmail' => [
                'email' => ['required', 'email', 'max:50', 'unique:users']
            ],
            'user.userChangePassword' => [
                'password' => ['required', 'string', 'regex:/^[a-zA-Z0-9]+$/', 'min:8', 'max:64']
            ],
            'user.userChangeAddress' => [
                'address' => [
                    'nullable',
                    'string',
                    'regex:/^г\.\s+Екатеринбург,\s+ул\.\s+[a-zA-Zа-яА-ЯёЁ\s]+,\s+д\.\s+\d+(,\s+к\.\s+\d+)?(,\s+кв\.\s+\d+)?$/u',
                    'max:200'
                ]
            ],
            'user.userChangePhone' => [
                'phone_number' => ['nullable', 'string', 'regex:/^(\+7|8)\d{3}\d{3}\d{2}\d{2}$/i']
            ]
        ];

        return $rules[$this->route()->getName()];
    }

    public function messages(): array {
        return [
            'required' => 'Поле должно быть заполнено',
            'max' => 'Не более 50 символов',
            'email' => 'Некорректный формат email',
            'email.unique' => 'Пользователь с таким email уже зарегистрирован',
            'password.min' => 'Не менее 8 символов',
            'password.max' => 'Не более 64 символов',
            'password.regex' => 'Пароль должен состоять только из английских букв и цифр',
            'address.max' => 'Не более 200 символов',
            'address.regex' => 'Некорректный формат адреса',
            'phone_number.regex' => 'Некорректный формат номера телефона'
        ];
    }
}
