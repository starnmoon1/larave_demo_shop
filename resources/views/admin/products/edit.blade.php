@extends('layout.master')
@section('page-heading','Edit Product')
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{route('product.update', $product->id)}}" method="POST" class="form-group" enctype="multipart/form-data">
                @csrf
                <div class="mt-3">
                    <label>Product name: </label>
                    <input type="text" name="name" id="name" value="{{$product->name}}" class="form-control">
                </div>
                <div class="mt-3">
                    <label>Description: </label>
                    <textarea name="description" rows="3" class="form-control">{{$product->description}}</textarea>
                </div>
                <div class="mt-3">
                    <label>Price: </label>
                    <input type="text" name="price" id="price" class="form-control" value="{{$product->price}}">
                </div>
                <div class="mt-3">
                    <label>Image: </label>
                    <img src="{{asset('storage/'.$product->image)}}" style="width: 100px">
                    <input type="file" name="image" id="name" class="form-control">
                </div>
                <div class="mt-3">
                    <label>Category: </label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                    @if($product->category_id = $category->id) selected @endif>
                                {{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <input type="submit" value="Edit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection
