<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getAll()
    {
        return Product::query()->latest()->get();
    }

    public function create(array $data)
    {
        return Product::query()->create($data);
    }

    public function find($id)
    {
        return Product::query()->findOrFail($id);
    }

    public function update($id, array $data)
    {
        $product = Product::query()->findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function delete($id)
    {
        return Product::destroy($id);
    }

    public function getProductsByCategoryId($id)
    {
        return Product::query()->where('category_id', $id)->get();
    }
}

