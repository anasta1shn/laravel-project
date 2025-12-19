<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules =  [
            'title' => ['required', 'string', 'max:50', 'unique:categories,title'],
        ];

        if ($this->route()->named('categories.update')) {
            $rules['title'] = ['required', 'string', 'max:50', 'unique:categories,title,' . $this->category->id];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле должно быть заполнено',
            'max' => 'Не более 50 символов',
            'unique' => 'Поле должно быть уникально'
        ];
    }
}
