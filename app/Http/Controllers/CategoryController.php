<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Category,Product};
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()){
            Session::put('username' , Auth::user()->name);

        }
        $categories = Category::all();
        return view('index',['categories' => $categories]);

    }
    public function getCategories(){
        $category = Category::all();
        $product = Product::all();
        return view('category',['category' => $category , 'product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
