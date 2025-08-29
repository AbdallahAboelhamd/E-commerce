@extends('layouts.master')

@section('content')

<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="" data-filter="*">All</li>
                            @foreach($category as $items)
                                <li data-filter="._{{$items->id}}" class="active">{{$items->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
         
               
			<div class="row product-lists" style="position: relative; height: 1387.4px;">
                @foreach ($product as $items)
				<div class="col-lg-4 col-md-6 text-center _{{$items->category_id}}" style="position: absolute; left: 0px; top: 0px;">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="{{$items->imagepath}}" 
                                style="max-height: 250px !important; min-height: 250px !important;"

                                alt=""></a>
						</div>
						<h3> {{$items->name}} </h>
						<p class="product-price"><span>Price</span> {{$items->price}} </p>
                        <p class="product-price"><span>Quantaty</span> {{$items->amount}} </p>

						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
            
            @endforeach
            </div>
              
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a class="active" href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection