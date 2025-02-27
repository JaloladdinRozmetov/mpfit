@extends('layouts.app')

@section('title', 'Редактировать товар')

@section('content')
    <div class="container">
        <h1>Редактировать товар</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Название товара</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Категория</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Описание</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Цена (₽)</label>
                <input type="number" name="price" class="form-control" step="0.01" value="{{ $product->price }}" required>
            </div>
            <button type="submit" class="btn btn-success">Обновить</button>
        </form>
    </div>
@endsection
