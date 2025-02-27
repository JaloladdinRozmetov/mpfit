<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function create(array $data)
    {
        return $this->productRepository->create($data);
    }

    public function find($id)
    {
        return $this->productRepository->find($id);
    }

    public function update($id, array $data)
    {
        return $this->productRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }

    public function getProductsByCategoryId($id)
    {
        return $this->productRepository->getProductsByCategoryId($id);
    }
}

