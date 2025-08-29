@extends('layouts.master')

@section('content')
    <div class="container" style="text-align: center; margin-top: 5%; margin-bottom: 5%">

      <form action="/storeproductimage" method="post" enctype="multipart/form-data">
        @csrf
         <div class="row mt-5 mb-5">
          <input type="hidden" style="width: 100%" placeholder="" name="product_id" id="product_id" value="{{$product->id}}">
           <div class="col-9 pt-3">
          <input type="file" class="form-control" name="image" id="image">
            <div class="col-3 mt-3 ml-10">
                <input type="submit" width="100%" value="submit">
            </div>
           </div>
         </div>
      </form>

        <div class="row">
            @foreach ($images as $image)
                <div class="col">
                    <img class="m-2" src="{{ asset($image->imagepath) }}" width="300" height="300">
                    <form action="/deleteproductimage/{{ $image->id }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('are you sure you want delete this image?')">
                            <i class="fas fa-trash"></i> Delete Photo
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
