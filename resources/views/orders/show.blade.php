@extends('layouts.app')

@section('title', 'Детали заказа')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">Детали заказа #{{ $order->id }}</h1>

        <!-- Success & Error Messages -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card p-3 mb-4">
            <p><strong>Дата создания:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</p>
            <p><strong>ФИО покупателя:</strong> {{ $order->customer_name }}</p>
            <p><strong>Товар:</strong> {{ $order->product->name }}</p>
            <p><strong>Количество:</strong> {{ $order->quantity }}</p>
            <p><strong>Цена за единицу:</strong> {{ number_format($order->product->price, 2, ',', ' ') }} ₽</p>
            <p><strong>Итоговая цена:</strong> {{ number_format($order->quantity * $order->product->price, 2, ',', ' ') }} ₽</p>
            <p><strong>Комментарий:</strong> {{ $order->comment ?? 'Нет' }}</p>
            <p><strong>Статус:</strong>
                <span class="badge {{ $order->status == 'новый' ? 'bg-primary' : 'bg-success' }}">
                    {{ ucfirst($order->status) }}
                </span>
            </p>
        </div>

        <!-- Form to update order status -->
        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="status" class="form-label">Обновить статус:</label>
                <select name="status" id="status" class="form-control">
                    <option value="new" {{ $order->status == 'new' ? 'selected' : '' }}>Новый</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Выполнен</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Сохранить</button>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад</a>
        </form>
    </div>
@endsection
