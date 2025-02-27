@extends('layouts.app')

@section('title', 'Детали товара')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">Детали товара</h1>

        <div class="card p-4 mb-4">
            <p><strong>Название:</strong> {{ $product->name }}</p>
            <p><strong>Категория:</strong> {{ $product->category->name }}</p>
            <p><strong>Описание:</strong> {{ $product->description ?? 'Нет описания' }}</p>
            <p><strong>Цена:</strong> {{ number_format($product->price, 2, ',', ' ') }} ₽</p>
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-success">Назад</a>
    </div>
@endsection
