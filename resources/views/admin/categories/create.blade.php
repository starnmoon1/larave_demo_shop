@extends('layout.master')
@section('page-heading','Add new category')
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{route('category.store')}}" method="POST" class="form-group">
                @csrf
                <div class="mt-3">
                    <label>Category name: </label>
                    <input type="text" name="name" id="name"
                           class="form-control @if($errors->has('name')) border-danger @endif"
                           placeholder="Input Category Name">
                    @if($errors->has('name'))
                        <p class="text-danger">
                            {{$errors->first('name')}}
                        </p>
                    @endif
                </div>
                <div class="mt-3">
                    <label>Description: </label>
                    <textarea name="description" rows="3" class="form-control"
                              placeholder="Input Category Description"></textarea>
                </div>
                <div class="mt-3">
                    <input type="submit" value="Create" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection
