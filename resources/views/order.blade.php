@extends('master')

@section('content')

    <div class="custom-product">
        <div class="col-sm-6">
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td>Price</td>
                    <td>{{ $total }} PKR</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>0 PKR</td>
                </tr>
                <tr>
                    <td>Delivery</td>
                    <td>100 PKR</td>
                </tr>
                <tr>
                    <td>Total Amount</td>
                    <td>{{ $total + 100 }} PKR</td>
                </tr>
                </tbody>
            </table>

            <form>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Address"></textarea>
                </div>
                <div class="form-group">
                    <label>Payment Method</label>
                    <p>
                        <input type="radio" name="payment">   <span>Online Payment</span>
                    </p>
                    <p>
                        <input type="radio" name="payment">   <span>Easypaisa Payment</span>
                    </p>
                    <p>
                        <input type="radio" name="payment">   <span>Payment On Delivery</span>
                    </p>
                </div>
                <button type="submit" class="btn btn-default">Order Now</button>
            </form>

        </div>
    </div>


@endsection
