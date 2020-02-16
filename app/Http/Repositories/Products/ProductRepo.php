<?php


namespace App\Http\Repositories\Products;


use App\Product;

class ProductRepo implements ProductInterface
{
    protected $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    function getAll()
    {
        return $this->product->all();
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
        return $this->product->findOrFail($id);
    }

    function search($keyword)
    {
        $this->product->where('name','LIKE','%'.$keyword.'%')->paginate(5);
    }
}
