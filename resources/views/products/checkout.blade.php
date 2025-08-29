@extends('layouts.master')

@section('content')
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Billing Address
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <form action="/storeOrder" method="POST">
                                                @csrf
                                                <p><input type="text" id="name" name="name" placeholder="Name"
                                                        required>
                                                </p>
                                                <p><input type="email" id="email" name="email"
                                                        placeholder="Email"required>
                                                </p>
                                                <p><input type="text" id="address" name="address" placeholder="Address"
                                                        required>
                                                </p>
                                                <p><input type="tel" id="phone" name="phone"
                                                        placeholder="Phone"required>
                                                </p>
                                                <p>
                                                    <textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea>
                                                </p>
                                                <button type="submit" class="boxed-btn black"
                                                    style="background-color: #04AA6D; color: white; border-radius: 8px; padding:10px 20px; border:0px">Place Order</button>

                                                    <a href="/latestorder" class="cart-btn" style="border-radius: 8px">Last Orders</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-accordion">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Card Details
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="card-details">
                                            <div class="cart-section mt-150 mb-150">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-12">
                                                            <div class="cart-table-wrap">
                                                                <table class="cart-table">
                                                                    <thead class="cart-table-head">
                                                                        <tr class="table-head-row">
                                                                            <th class="product-remove"></th>
                                                                            <th class="product-image">Product Image</th>
                                                                            <th class="product-name">Name</th>
                                                                            <th class="product-price">Price</th>
                                                                            <th class="product-quantity">Quantity</th>
                                                                            <th class="product-total">Total</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($cart as $items)
                                                                            <tr class="table-body-row">
                                                                                <td class="product-remove"><a
                                                                                        href="/deleteFromCart/{{ $items->product->id }}"><i
                                                                                            class="far fa-window-close"></i></a>
                                                                                </td>

                                                                                <td class="product-image">
                                                                                    <img
                                                                                        src="{{ $items->product->imagepath }}">
                                                                                </td>
                                                                                <td class="product-name">
                                                                                    <a
                                                                                        href="/singleproduct/{{ $items->product->id }}">
                                                                                        {{ $items->product->name }}
                                                                                    </a>
                                                                                </td>

                                                                                <td class="product-price">
                                                                                    {{ $items->product->price }}</td>
                                                                                <td class="product-quantity">
                                                                                    {{ $items->quantity }}</td>
                                                                                <td class="product-total">
                                                                                    {{ $items->quantity * $items->product->price }}
                                                                                </td>
                                                                                 <td class="product-total">
                                                                                    {{ $items->quantity * $items->product->price }}
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="total-section">
                                                                <table class="total-table">
                                                                    <thead class="total-table-head">
                                                                        <tr class="table-total-row">
                                                                            <th>Total</th>
                                                                            <th>Price</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="total-data">
                                                                            <td><strong>total: </strong></td>
                                                                            <td>
                                                                                {{ $total }}
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
