<?php


namespace App\Http\Services\Products;


use App\Http\Repositories\Products\ProductRepo;
use App\Product;
use Illuminate\Http\Request;

class ProductService implements ProductServiceInterface
{
    protected $productRepo;
    public function __construct(ProductRepo $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    function getAll()
    {
        return $this->productRepo->getAll();
    }

    function create(Request $request)
    {
        $product = new Product();
        $product->fill($request->all());
        $product->image = $this->uploadImage($request);
        $this->productRepo->store($product);
    }

    public function uploadImage($request)
    {
        if (!$request->hasFile('image')) {
            $image_name = 'images/no_image.jpg';
        } else {
            $image = $request->file('image');
            $image_name = 'images/' . date('d-m-Y H:i:s') . '.' . $image->getClientOriginalName();
            $image->storeAs('public/', $image_name);
        }
        return $image_name;
    }

    function update($id, Request $request)
    {
        $product = $this->productRepo->findById($id);
        $product->fill($request->all());
       if($request->hasFile('image'))
       $product->image = $this->uploadImage($request);
        $this->productRepo->store($product);
    }

    function delete($id)
    {
        $product = new Product();
        unlink('storage/'.$product->image);
        $this->productRepo->delete($product);
    }

    function getById($id)
    {
        return $this->productRepo->findById($id);
    }


    public function search($request)
    {
        $keyword = $request->keyword;
        if (!$keyword) {
            return redirect()->route('product.index');
        } else {
            return $this->productRepo->search($keyword);
        }
    }

}
