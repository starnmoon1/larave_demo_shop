<?php

namespace App\Http\Controllers;

use App\Http\Services\Products\ProductService;
use Illuminate\Http\Request;

class shopController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAll();
        return view('admin.shop.home-shop', compact('products'));
    }
}
