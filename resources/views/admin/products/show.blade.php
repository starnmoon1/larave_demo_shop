@extends('layout.master')
@section('page-heading','Product: '. $product->name)
@section('content')
    <div class="row">
        <div class="col-12">
            <hr>
            <div class="mt-3">
                <label for="">Name: </label>
                <p>{{$product->name}}</p>
            </div>
            <hr>
            <div class="mt-3">
                <label for="">Description: </label>
                <p>{{$product->description}}</p>
            </div>
            <hr>
            <div class="mt-3">
                <label for="">Price: </label>
                <p>{{$product->price}}</p>
            </div>
            <hr>
            <div class="mt-3">
                <label for="">Image: </label>
                <img src="{{asset('storage/'.$product->image)}}" width="300px">
            </div>
            <hr>
            <div class="mt-3">
                <label for="">Category: </label>
                <p>{{$product->category->name}}</p>
            </div>
        </div>
    </div>
@endsection
