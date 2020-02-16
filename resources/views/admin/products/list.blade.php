@extends('layout.master')
@section('page-heading')
    <div class="row">
        <div class="col-6 float-left">
            <h1 class="h3 mb-0 text-gray-800">List Products</h1>
        </div>
        <div class="col-6 float-right">
            <form class="form-group float-right" action="{{route('product.search')}}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-bottom" placeholder="Search for..." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th colspan="3"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $key => $product)
                    <tr>
                        <th>{{++$key}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td><img src="{{asset('storage/'.$product->image)}}" style="width: 100px"></td>
                        <td>{{$product->category->name}}</td>
                        <td>
                            <a href="{{route('product.show', $product->id)}}" class="btn btn-info">Show</a>
                        </td>
                        <td>
                            <a href="{{route('product.destroy', $product->id)}}" class="btn btn-danger"
                               onclick="return confirm('bạn có chắc chắn muốn xóa không ?')">Delete</a>
                        </td>
                        <td>
                            <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="6">No data</th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <div class="col-6 float-left">
                <a href="{{route('product.create')}}" class="btn btn-success">Create New Product</a>
            </div>
            <div class="col-6 float-left">
                <div class="pagination float-right mr-4">

                </div>
            </div>
        </div>
    </div>
@endsection
