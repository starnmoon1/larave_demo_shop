<?php


namespace App\Http\Services\Categories;


use App\Category;
use App\Http\Repositories\Categories\CategoryRepo;
use App\Http\Services\CategoryServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryService implements CategoryServiceInterface
{
    protected $categoryRepo;
    public function __construct(CategoryRepo $categoryRepo )
    {
        $this->categoryRepo = $categoryRepo;
    }

    function getAll()
    {
        return $this->categoryRepo->getAll();
    }

    function update($id, $request)
    {
        $category = $this->getById($id);
        $category->fill($request->all());
        $category['slug'] = Str::slug($request->name);
        $this->categoryRepo->store($category);
    }

    function delete($id)
    {
        $category = $this->getById($id);
        $this->categoryRepo->delete($category);
    }

    function getById($id)
    {
        return $this->categoryRepo->findById($id);
    }

    function create(Request $request)
    {
        $category = new Category();
        $category->fill($request->all());
        $category->slug = Str::slug($request->name);
        $this->categoryRepo->store($category);
    }

    public function search($request)
    {
        $keyword = $request->keyword;
        if (!$keyword) {
            return redirect()->route('category.index');
        } else {
            return $this->categoryRepo->search($keyword);
        }
    }
}
