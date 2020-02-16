@extends('layout.master')
@section('page-heading','Create New Product')
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{route('product.store')}}" method="POST" class="form-group" enctype="multipart/form-data">
                @csrf
                <div class="mt-3">
                    <label>Product name: </label>
                    <input type="text" name="name" id="name"
                           class="form-control @if($errors->has('name')) border-danger @endif"
                           placeholder="Product Name">
                    @if($errors->has('name'))
                        <p class="text-danger">
                            {{$errors->first('name')}}
                        </p>
                    @endif
                </div>
                <div class="mt-3">
                    <label>Description: </label>
                    <textarea name="description" rows="3"
                              class="form-control @if($errors->has('description')) border-danger @endif"
                              placeholder="Input Category Description"></textarea>
                    @if($errors->has('description'))
                        <p class="text-danger">
                            {{$errors->first('description')}}
                        </p>
                    @endif
                </div>
                <div class="mt-3">
                    <label>Price: </label>
                    <input type="text" name="price" id="price"
                           class="form-control @if($errors->has('price')) border-danger @endif"
                           placeholder="Product Price">
                    @if($errors->has('price'))
                        <p class="text-danger">
                            {{$errors->first('price')}}
                        </p>
                    @endif
                </div>
                <div class="mt-3">
                    <label>Image: </label>
                    <input type="file" name="image" id="name"
                           class="form-control @if($errors->has('image')) border-danger @endif">
                    @if($errors->has('image'))
                        <p class="text-danger">
                            {{$errors->first('image')}}
                        </p>
                    @endif
                </div>
                <div class="mt-3">
                    <label>Category: </label>
                    <select name="category_id" class="form-control @if($errors->has('category_id')) border-danger @endif">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('category_id'))
                        <p class="text-danger">
                            {{$errors->first('category_id')}}
                        </p>
                    @endif
                </div>
                <div class="mt-3">
                    <input type="submit" value="Create" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection
