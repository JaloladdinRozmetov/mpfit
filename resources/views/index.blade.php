@extends('layouts.app')

@section('title', 'Каталог товаров')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">Каталог товаров</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Ошибка!</strong> Пожалуйста, исправьте следующие ошибки:
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="/image/Default_image.png" class="card-img-top" alt="Товар">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text"><strong>Категория:</strong> {{ $product->category->name }}</p>
                            <p class="card-text"><strong>Цена:</strong> {{ number_format($product->price, 2, ',', ' ') }} ₽</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Подробнее</a>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#orderModal{{ $product->id }}">
                                Заказать
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Order Modal -->
                <div class="modal fade" id="orderModal{{ $product->id }}" tabindex="-1" aria-labelledby="orderModalLabel{{ $product->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderModalLabel{{ $product->id }}">Оформить заказ: {{ $product->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('orders.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                    <div class="mb-3">
                                        <label for="customer_name" class="form-label">ФИО покупателя</label>
                                        <input type="text" name="customer_name" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Количество</label>
                                        <input type="number" name="quantity" class="form-control" min="1" value="1" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="comment" class="form-label">Комментарий</label>
                                        <textarea name="comment" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                    <button type="submit" class="btn btn-success">Оформить заказ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
            @endforeach
        </div>
    </div>
@endsection
