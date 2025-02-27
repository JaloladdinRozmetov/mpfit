@extends('layouts.app')

@section('title', 'Добавить товар')

@section('content')
    <div class="container">
        <h1>Добавить товар</h1>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Название товара</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Категория</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Описание</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Цена (₽)</label>
                <input type="number" name="price" class="form-control" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
