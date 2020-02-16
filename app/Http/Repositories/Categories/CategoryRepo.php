<?php


namespace App\Http\Repositories\Categories;


use App\Category;

class CategoryRepo implements CategoryRepoInterface
{
    protected $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    function getAll()
    {
      return $this->category->all();
    }

    function store($obj)
    {
        $obj->save();
    }

    function update($obj)
    {
        $obj->update();
    }

    function delete($obj)
    {
        $obj->delete();
    }

    function findById($id)
    {
        return $this->category->findOrFail($id);
    }

    function search($keyword)
    {
        return $this->category->where('name','LIKE','%'.$keyword.'%')->paginate(5);
    }
}
