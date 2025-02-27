@extends('layouts.app')

@section('title', 'Список товаров')

@section('content')
    <div class="container">
        <h1 class="mb-4">Список товаров</h1>
        <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Добавить товар</a>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Цена (₽)</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ number_format($product->price, 2, ',', ' ') }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm">Просмотр</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Удалить товар?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
