@extends('layouts.master')

@section('content')
    @foreach ($orderDetails as $items)
        <div class="checkout-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="checkout-accordion-wrap">
                            <div class="accordion" id="accordionExample">
                                <div class="card single-accordion">
                                    <div class="card-header" id="heading-{{ $items->id }}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapse-{{ $items->id }}" aria-expanded="false"
                                                aria-controls="collapse-{{ $items->id }}">
                                                Order {{ $items->id }}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse-{{ $items->id }}" class="collapse"
                                        aria-labelledby="heading-{{ $items->id }}" data-parent="#accordionExample">
                                        <div class="card-body">
                                            {{-- بيانات العميل --}}
                                            <div class="billing-address-form mb-4">
                                                <p><strong>Name:</strong> {{ $items->name }}</p>
                                                <p><strong>Email:</strong> {{ $items->email }}</p>
                                                <p><strong>Address:</strong> {{ $items->address }}</p>
                                                <p><strong>Phone:</strong> {{ $items->phone }}</p>
                                                <p><strong>Date:</strong> {{ $items->created_at }}</p>
                                            </div>
                                            {{-- بيانات المنتجات --}}
                                            <div class="cart-table-wrap">
                                                <table class="cart-table">
                                                    <thead class="cart-table-head">
                                                        <tr class="table-head-row">
                                                            <th class="product-image">Product Image</th>
                                                            <th class="product-name">Name</th>
                                                            <th class="product-price">Price</th>
                                                            <th class="product-quantity">Quantity</th>
                                                            <th class="product-total">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($items->orderDetails as $details)
                                                            <tr class="table-body-row">
                                                                <td class="product-image">
                                                                    <img src="{{ asset($details->product->imagepath) }}" alt="">
                                                                </td>
                                                                <td class="product-name">{{ $details->product->name }}</td>
                                                                <td class="product-price">{{ $details->product->price }}</td>
                                                                <td class="product-quantity">{{ $details->quantity }}</td>
                                                                <td class="product-total">
                                                                    {{ $details->quantity * $details->product->price }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="total-section mt-4">
                                                <h5 style="text-align: center">
                                                    Total:
                                                    {{ $items->orderDetails->sum(function ($details) {
                                                        return $details->quantity * $details->product->price;
                                                    }) }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div> {{-- end collapse --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
    @if ($orderDetails->isEmpty())
        <div class="container mt-150 mb-150">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card text-center shadow-lg" style="border-radius: 16px;">
                        <div class="card-body p-5">
                            <h2 class="mb-4">There is no Orders</h2>
                            <p class="mb-4 text-muted">
                                You haven't placed any order yet, try adding products to your shopping cart and order them now 🎉
                            </p>
                            <a href="/products" class="btn btn-success btn-lg"
                                style="border-radius: 10px; padding: 12px 25px;">
                                🛒 Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
