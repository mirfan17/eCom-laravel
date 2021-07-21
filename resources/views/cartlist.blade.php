@extends('master')

@section('content')

    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h2>Cart List</h2>
                <a class="btn btn-success" href="/order">Order Now</a> <br><br>
                <div class="">
                    @foreach($products as $product)
                        <div class="row searched-item cart-list-divider">
                            <div class="col-sm-3">
                                <a href="/detail/{{ $product->id }}">
                                    <img class="trending-img" src="{{ $product->gallery }}">
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <div class="">
                                    <h2>{{ $product->name }}</h2>
                                    <h5>{{ $product->description }}</h5>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <a href="/remove_cart/{{$product->cart_id}}" class="btn btn-warning">Remove From Cart</a>
                            </div>
                        </div>
                    @endforeach
                        <a class="btn btn-success" href="/order">Order Now</a>
                </div>
            </div>
        </div>

    </div>


@endsection
