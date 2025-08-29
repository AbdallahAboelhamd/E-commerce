@extends('layouts.master')

@section('content')
<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Add</span> Review</h3>
					</div>
				</div>
			</div>
                 <div class="col-lg-12 mb-5 mb-lg-0">
					<div class="form-title">
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="post" action="/storereview">
							@csrf
							<p style="display: flex">
								<input type="text" style="width: 50%" class="mr-4" placeholder="Name" name="name" id="name" value="{{old('name')}}">
								<span class="text-danger">
                                    @error('name')
									{{$message}}
									@enderror
								</span>
                                 <input type="text" style="width: 50%" class="mr-4" placeholder="Email" name="email" id="email"  value="{{old('email')}}">
								<span class="text-danger">
                                    @error('email')
									{{$message}}
									@enderror
								</span>
							</p>
							<p style="display: flex">
								<input type="text"  style="width: 50%" class="mr-4" placeholder="Subject" name="subject" id="subject"  value="{{old('subject')}}">
								<span class="text-danger">
                                    @error('subject')
									{{$message}}
									@enderror
								</span>
								<input type="text"  style="width: 50%" class="mr-4" placeholder="Phone" name="phone" id="phone"  value="{{old('phone')}}">
								<span class="text-danger">
                                    @error('phone')
									{{$message}}
									@enderror
								</span>
							</p>
							<p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message">
	
							</textarea>
						<span class="text-danger">
                                    @error('description')
									{{$message}}
									@enderror
								</span>
						</p>
							<p><input type="submit" value="Submit"></p>
						</form>
					</div>
				</div>
                        <div class="testimonail-section mt-80 mb-150">
		                    <div class="container">
			                   <div class="row">
				            <div class="col-lg-10 offset-lg-1 text-center">
					           <div class="testimonial-sliders">
                          @foreach($reviews as $review)

						     <div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="{{$review->imagepath}}" alt="">
							</div>
							<div class="client-meta">
								<h3>{{$review->name}}<span>{{$review->subjcet}}</span></h3>
								<p class="testimonial-body">
                                      {{$review->message}}
                                </p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
                        @endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
    

@endsection