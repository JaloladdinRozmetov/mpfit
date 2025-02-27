<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    protected CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Fetch all categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllCategories()
    {
        return $this->categoryRepository->getAll();
    }
}
