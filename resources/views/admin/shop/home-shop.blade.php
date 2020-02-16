@extends('layout.mastershop')
@section('content')

    <h3 class="h3">shopping Demo-1 </h3>
    <div class="col m-3">
       <a class="btn btn-primary" href="{{route('cartIndex')}}">
           <i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart <span class="badge badge-secondary">{{ (Session::has('cart')) ? (Session::get('cart')->totalQty) : "0" }}</span>       </a>
    </div>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#">
                        <img class="pic-1" src="{{asset('storage/'.$product->image)}}">

                    </a>
                    <ul class="social">
                        <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                        <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <span class="product-new-label">Sale</span>
                    <span class="product-discount-label">20%</span>
                </div>
                <ul class="rating">
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star disable"></li>
                </ul>
                <div class="product-content">
                    <h3 class="title"><a href="#">{{$product->name }}</a></h3>
                    <div class="price">{{number_format($product->price ,0,',','.') }} VND
                        <span>{{number_format($product->price, 0,',','.') }}</span>
                    </div>
                    <a class="add-to-cart" href="{{route('addToCart', $product->id)}}">Thêm vào giỏ hàng</a>
                </div>
            </div>
        </div>
            @endforeach
    </div>
@endsection
