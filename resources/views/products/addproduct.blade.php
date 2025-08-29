
@extends('layouts.master')
@section('content')
<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Add</span> Product</h3>
					</div>
				</div>
			</div>
                 <div class="col-lg-12 mb-5 mb-lg-0">
					<div class="form-title">
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="post" enctype="multipart/form-data" action="{{route('/store')}}">
							@csrf
							<p>
								<input type="text" style="width: 100%" placeholder="Name" name="name" id="name" value="{{old('name')}}">
								<span class="text-danger">
                                    @error('name')
									{{$message}}
									@enderror
								</span>
							</p>
							<p style="display: flex">
                                <input type="number" style="width: 50%" class="mr-4" placeholder="Price" name="price" id="price"  value="{{old('price')}}">
								<span class="text-danger">
                                    @error('price')
									{{$message}}
									@enderror
								</span>
								<input type="number"  style="width: 50%" placeholder="Quantity" name="amount" id="amount"  value="{{old('amount')}}">
								<span class="text-danger">
                                    @error('amount')
									{{$message}}
									@enderror
								</span>
							</p>
							<p><textarea name="description" id="description" cols="30" rows="10" placeholder="Message">
	
							</textarea>
						<span class="text-danger">
                                    @error('description')
									{{$message}}
									@enderror
								</span>
						</p>
						<select class="form-control mb-3" name="category_id" id="category_id">
								@foreach($categories as $items)
							        <option value="{{$items->id}}">{{$items->name}}</option>
								@endforeach 
						</select>
							<input type="hidden" name="token" value="FsWga4&amp;@f6aw">
							<p>
							<input style="margin-top: 1%" type="file" name="image" id="image">
							<span class="text-danger">
                                    @error('photo')
									{{$message}}
									@enderror
								</span>
							</p>
							<p style="margin-bottom: 5%; margin-top: 3%;"><input type="submit" value="Submit"></p>
						</form>
					</div>
				</div>
@endsection

