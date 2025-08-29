<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
class UserController extends Controller
{

public function review(Request $request){

        $reviews = Review::all();
         return view('reviews',['reviews' => $reviews]);
}

public function storereview(Request $request){
   
        $request->validate([
            'name' => ['required', 'max:50'],
            'email' => 'required',
            'phone' => ['required', 'integer'],
            'subject' => 'required',
            'message'=> 'required'
        ]); 
        $review = new Review();
        $review->name = $request->name;
        $review->email = $request->email;
        $review->phone = $request->phone;
        $review->subject = $request->subject;
        $review->message = $request->message;
        $review->save();

        return redirect('/reviews');
}
}
