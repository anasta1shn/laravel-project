<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'address' => ['required', 'string', 'regex:/^г\.\s+Екатеринбург,\s+ул\.\s+[a-zA-Zа-яА-ЯёЁ\s]+,\s+д\.\s+\d+(,\s+к\.\s+\d+)?(,\s+кв\.\s+\d+)?$/u', 'max:200'],
            'phone' => ['required', 'string', 'regex:/^(\+7|8)\d{3}\d{3}\d{2}\d{2}$/i']
        ];
    }

    public function messages(): array {
        return [
            'required' => 'Поле должно быть заполнено',
            'max' => 'Не более 200 символов',
            'address.regex' => 'Некорректный формат адреса',
            'phone.regex' => 'Некорректный формат номера телефона'
        ];
    }
}
