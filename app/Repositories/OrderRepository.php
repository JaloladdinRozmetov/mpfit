<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    /**
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        return Order::query()->create($data);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Order::query()->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return Order::query()->findOrFail($id);
    }
}

