<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    /**
     * Get all categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Category::query()->get();
    }
}
