<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoriesRequest;
use App\Http\Services\Categories\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('admin.categories.list', compact('categories'));
    }

    public function store(CreateCategoriesRequest $request)
    {
        $this->categoryService->create($request);
        Session::flash('add-success', 'Create success!');
        return redirect()->route('category.index');

    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function destroy($id)
    {
        $this->categoryService->delete($id);
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = $this->categoryService->getById($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update($id, CreateCategoriesRequest $request)
    {
        $this->categoryService->update($id, $request);
        return redirect()->route('category.index');
    }

    public function show($id)
    {
        $category = $this->categoryService->getById($id);
        return view('admin.categories.show', compact('category'));
    }

    public function search(Request $request)
    {
        $categories = $this->categoryService->search($request);
        return view('admin.categories.list', compact('categories'));
    }


}
