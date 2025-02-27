<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected OrderService $orderService;

    /**
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * @param OrderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OrderRequest $request)
    {
        $this->orderService->createOrder($request->validated());

        return redirect()->back()->with('success', 'Заказ успешно оформлен!');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function index()
    {
        $orders = $this->orderService->getAllOrders();

        return view('orders.index', compact('orders'));
    }

    /**
     * @param Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * @param Order $order
     * @param OrderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Order $order, Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,completed',
        ]);

        $order->update(['status' => $validated['status']]);

        return redirect()->route('orders.index')->with('success', 'Статус заказа обновлён!');
    }
}
