@extends('layout.master')
@section('page-heading','Category: '. $category->name)
@section('content')
    <div class="row">
        <div class="col-12">
            <hr>
            <div class="mt-3">
                <label for="">Description </label>
                <p>{{$category->description}}</p>
            </div>
            <hr>
            <div class="mt-3">
                <label for="">Slug </label>
                <p>{{$category->slug}}</p>
            </div>
            <hr>
            <div class="mt-3">
                <label>Total Product </label>
                <p>{{$category->products->count()}}</p>
            </div>
        </div>
    </div>
@endsection
