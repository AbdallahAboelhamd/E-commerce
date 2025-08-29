@extends('layouts.master')

@section('content')
    <div class="container" style="margin-bottom: 5%; margin-top: 5%">
        <div class="row">
            <!-- Product main image -->
            <div class="col-md-5">
                <div class="single-product-img" style="text-align: center">
                    <img src="{{ asset($product->imagepath) }}" alt="" style="width: 100%; border-radius: 12px;">
                </div>
            </div>

            <!-- Slider and product details -->
            <div class="col-md-6">
                <div class="row">
                    <!-- Slider -->
                    @if($product->productphoto->count() > 1)
                        <div class="col-md-6">
                            <div class="testimonial-sliders">
                                @foreach ($product->productphoto as $products)
                                    <div class="single-testimonial-slider">
                                        <div class="client-avater"
                                            style="width: 200px; height: 200px">
                                            <img src="{{ asset($products->imagepath) }}" alt=""
                                                style="width: 100%; height: 100%;border-radius: 10px ">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Product info -->
                    <div class="col-md-6">
                        <div class="single-product-content">
                            <h3>{{ $product->name }}</h3>
                            <p class="single-product-pricing">
                                <span>Quantity : {{ $product->amount }}</span> <br>
                                {{ $product->price }}
                            </p>
                            <div class="single-product-form">
                                <form action="index.html">
                                    <input type="number" placeholder="0">
                                </form>
                                <a href="/storeToCart/{{ $product->id }}" class="cart-btn">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </a>
                                <p><strong>Categories: </strong>{{ $product->category->name }}</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end nested row -->
            </div>

            <!-- QR Code section (أقصى يمين) -->
            <div class="col-md-1 d-flex align-items-start justify-content-end">
                <div style="text-align: right; margin-right:5cm; margin-top:3cm">
                    {!! QrCode::size(120)->generate(url('/products/'.$product->id)) !!}
                    <p style="font-size: 12px; margin-top: 5px;">Scan Me</p>
                </div>
            </div>
        </div>
    </div>
@endsection
