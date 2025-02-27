@extends('layouts.app')

@section('title', 'Список заказов')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">Список заказов</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered text-center">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Дата создания</th>
                <th>ФИО покупателя</th>
                <th>Статус</th>
                <th>Итоговая цена (₽)</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>
                        <span class="badge {{ $order->status == 'новый' ? 'bg-primary' : 'bg-success' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>{{ number_format($order->quantity * $order->product->price, 2, ',', ' ') }} ₽</td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary btn-sm">Просмотр</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
