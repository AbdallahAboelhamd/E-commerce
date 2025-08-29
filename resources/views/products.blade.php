@extends('layouts.master')

@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Products</h3>
                      
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($product as $items)
                    <div class="col-lg-6 col-md-2 offset-md-3 offset-lg-0 text-center mb-4 px-3">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="/singleproduct/{{$items->id}}">
                                    <img src="{{ asset($items->imagepath) }}"
                                        style="max-height: 450px !important; min-height: 350px !important;"
                                        alt=""></a>
                            </div>
                            <h3>{{ $items->name }}</h3>
                            <p class="product-price"><span>{{ $items->description }}</span> {{ $items->price }} E£ </p>

                            <a href="/storeToCart/{{ $items->id }}" class="cart-btn">
                                <input type="hidden" name="product_id" value="{{ $items->id }}">
                                <i class="fas fa-shopping-cart"></i> Add to Cart</a>
                             @if(Auth::user() &&Auth::user()->role == 'admin')
                            <p class="mt-4">
                                <a href="/removeproduct/{{ $items->id }}" class="btn btn-danger"><i
                                        class="fas fa-shopping-cart"></i> Delet Product</a>
                                <a href="/editproduct/{{ $items->id }}" class="btn btn-primary"><i
                                        class="fas fa-shopping-cart"></i> Edit Product</a>
                            </p>
                            @endif
                        </div>
                    </div>
                @endforeach
                <div style="text-align: center; margin: 0px auto">
                    {{ $product->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection()

<style>
    svg {
        height: 50px !important;
    }
</style>
