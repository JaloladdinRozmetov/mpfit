<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'        => 'required|string|max:255|unique:products,name',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'Название товара обязательно.',
            'name.max'             => 'Название товара не должно превышать 255 символов.',
            'name.unique'          => 'Товар с таким названием уже существует.',
            'category_id.required' => 'Выберите категорию товара.',
            'category_id.exists'   => 'Выбранная категория не существует.',
            'description.string'   => 'Описание должно быть текстом.',
            'price.required'       => 'Укажите цену товара.',
            'price.numeric'        => 'Цена должна быть числом.',
            'price.min'            => 'Цена не может быть отрицательной.',
        ];
    }
}
