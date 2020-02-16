@extends('layout.master')
@section('page-heading')
    @if(session()->has('add-success'))
        {{session('add-success')}}
        @endif
    <div class="row">
        <div class="col-6 float-left">
            <h1 class="h3 mb-0 text-gray-800">List Categories</h1>
        </div>
        <div class="col-6 float-right">
            <form class="form-group float-right" action="{{route('category.search')}}" method="get">
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
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Total Products</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $key => $category)
                    <tr>
                        <th>{{++$key}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>{{$category->description}}</td>
                        <td>{{$category->products->count()}}</td>

                        <td>
                            <a href="{{route('category.show', $category->id)}}" class="btn btn-info">Show</a>
                            <a href="{{route('category.destroy', $category->id)}}" class="btn btn-danger"
                               onclick="return confirm('bạn có chắc chắn muốn xóa không ?')">Delete</a>
                            <a href="{{route('category.edit', $category->id)}}" class="btn btn-primary">Edit</a>
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
                <a href="{{route('category.create')}}" class="btn btn-success">Create New Category</a>
            </div>
            <div class="col-6 float-left">
                <div class="pagination float-right mr-4">

                </div>
            </div>

        </div>
    </div>
@endsection
