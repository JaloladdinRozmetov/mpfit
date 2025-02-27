<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    protected ProductService $productService;
    protected CategoryService $categoryService;

    /**
     * @param ProductService $productService
     * @param CategoryService $categoryService
     */
    public function __construct(ProductService $productService,CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function index():View
    {
        $products = $this->productService->getAll();

        return view('products.index', compact('products'));
    }

    public function indexPage()
    {
        $products = $this->productService->getAll();

        return view('index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAllCategories();

        return view('products.create',compact('categories'));
    }

    /**
     * @param ProductStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ProductStoreRequest $request): RedirectResponse
    {
        $this->productService->create($request->validated());

        return redirect()->route('products.index')->with('success', 'Товар успешно добавлен.');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function edit($id):View
    {
        $product = $this->productService->find($id);
        $categories = $this->categoryService->getAllCategories();

        return view('products.edit', compact('product','categories'));
    }

    /**
     * @param ProductUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(ProductUpdateRequest $request, $id): RedirectResponse
    {
        $this->productService->update($id, $request->validated());
        return redirect()->route('products.index')->with('success', 'Товар успешно обновлен!');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->productService->delete($id);
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function show($id): View
    {
        $product = $this->productService->find($id);

        return view('products.show', compact('product'));
    }
}

