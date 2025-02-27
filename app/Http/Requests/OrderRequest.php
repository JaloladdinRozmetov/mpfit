<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'comment' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Выберите товар.',
            'product_id.exists' => 'Выбранный товар не найден.',
            'customer_name.required' => 'Введите ваше имя.',
            'customer_name.string' => 'Имя должно быть строкой.',
            'customer_name.max' => 'Имя не должно превышать 255 символов.',
            'quantity.required' => 'Введите количество.',
            'quantity.integer' => 'Количество должно быть числом.',
            'quantity.min' => 'Количество должно быть минимум 1.',
            'comment.string' => 'Комментарий должен быть строкой.',
        ];
    }
}
