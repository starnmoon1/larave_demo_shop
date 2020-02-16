<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <div class="col-xs-6">
                                <h5><a href="{{route('shop.index')}}"><span class="glyphicon glyphicon-shopping-cart"></span></a> Shopping Cart</h5>
                            </div>
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-primary btn-sm btn-block">
                                    <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @foreach($cart->items as $product)
                            <div class="row">
                                <div class="col-xs-2"><img class="img-responsive" src="{{asset('storage/'. $product['item']->image)}}">
                                </div>
                                <div class="col-xs-4">
                                    <h4 class="product-name"><strong>{{$product['item']->name}}</strong></h4>
                                </div>
                                <div class="col-xs-6">
                                    <div class="col-xs-6 text-right">
                                        <h6><strong>{{$product['item']->price}} <span class="text-muted">x</span></strong></h6>
                                    </div>
                                   <form method="post" action="{{route('updateCart',$product['item']->id)}}">
                                       @csrf
                                       <div class="col-xs-4">
                                           <input type="number" class="form-control input-sm" min="0" value="{{$product['qty']}}">
                                       </div>
                                       <div class="col-xs-2">
                                           <button type="submit" class="btn btn-link btn-xs">
                                               <a class="glyphicon glyphicon-trash" href="{{ route('removeCart', $product['item']->id) }}"> </a>
                                           </button>
                                       </div>
                                   </form>
                                </div>
                            </div>
                    <hr>
                    @endforeach
                    <div class="row">
                        <div class="text-center">
                            <div class="col-xs-9">
                                <h6 class="text-right">Added items?</h6>
                            </div>
                            <div class="col-xs-3">
                                <button type="button" class="btn btn-default btn-sm btn-block">
                                    <a class="glyphicon glyphicon-upload" href="{{ route('updateCart', $product['item']->id) }}"> </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-9">
                            <h4 class="text-right">Total <strong>{{$cart->totalPrice}} VND</strong></h4>
                        </div>
                        <div class="col-xs-3">
                            <button type="button" class="btn btn-success btn-block">
                                Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
