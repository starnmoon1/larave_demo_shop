<?php

namespace App\Http\Controllers;

use App\Http\Services\Categories\CategoryService;
use App\Http\Services\Products\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $products = $this->productService->getAll();
        return view('admin.products.list', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAll();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->productService->create($request);
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $categories = $this->categoryService->getAll();
         $product = $this->productService->getById($id);
        return view('admin.products.edit', compact(['categories', 'product']));
    }

    public function update($id,Request $request)
    {
        $this->productService->update($id, $request);
        return redirect()->route('product.index');
    }

    public function show($id)
    {
        $product = $this->productService->getById($id);
        return view('admin.products.show', compact('product'));
    }
}
