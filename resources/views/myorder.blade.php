@extends('master')

@section('content')

    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h2>Orders List</h2>
                <div class="">
                    @foreach($orders as $product)
                        <div class="row searched-item cart-list-divider">
                            <div class="col-sm-3">
                                <a href="/detail/{{ $product->id }}">
                                    <img class="trending-img" src="{{ $product->gallery }}">
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <div class="">
                                    <h2>{{ $product->name }}</h2>
                                    <h5>Delivery Status : {{ ucwords($product->status) }}</h5>
                                    <h5>Payment Status : {{ ucwords($product->payment_status) }}</h5>
                                    <h5>Payment Method : {{ ucwords($product->payment_method) }}</h5>
                                    <h5>Delivery Address : {{ $product->address }}</h5>
                                    <h5>Price : {{ $product->price }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>


@endsection
