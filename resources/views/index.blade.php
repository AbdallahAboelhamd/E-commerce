@extends('layouts.master')

@section('content')
    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span>Categories</h3>
                        <p></p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($categories as $items)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="/products/{{ $items->id }}"><img src="{{ $items->imagepath }}"
                                        style="max-height: 250px !important; min-height: 250px !important;"
                                        alt=""></a>
                            </div>
                            <h3>{{ $items->name }}</h3>
                            <p>{{ $items->description }}</p>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
