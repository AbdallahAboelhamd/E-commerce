<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImages;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProductController extends Controller
{
    public function deleteImage($id)
    {
        $image = ProductImages::find($id);
        $image->delete();

        return redirect('prodcuttable');
    }


    public function addImages($id)
    {
        $product =  Product::find($id);
        $images = ProductImages::where('product_id', $id)->get();
        return view('products.addProductImages', ['product' => $product, 'images' => $images]);
    }


    public function addProduct()
    {
        $categories = Category::all();
        return view('products.addproduct', ['categories' => $categories]);
    }


    public function search(Request $request)
    {
        $product = Product::where('name', 'like', '%' . $request->searchkey . '%')->paginate(6);
        return view('products', ['product' => $product]);
    }

    public function storeImages(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,webp'
        ]);
        $product = new ProductImages();
        $product->product_id = $request->product_id;
        $path = '';

        if ($request->has('image')) {
            $imageName = Str::random(10) . '.' . $request->image->getClientOriginalExtension();
            $path = $request->image->move('uploads', $imageName);
        }
        $product->imagepath = $path;
        $product->save();
        return redirect('/producttable');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'price' => 'required',
            'amount' => ['required', 'integer'],
            'description' => '',
            'image' => 'image|mimes:jpeg,png,jpg,webp'
        ]);
        //edit product
        if ($request->id) {
            $product = Product::find($request->id);
            $product->name = $request->name;
            $product->price = $request->price;
            $product->amount = $request->amount;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            if ($request->has('image')) {
                $imageName = Str::random(10) . '.' . $request->image->getClientOriginalExtension();
                $path = $request->image->move('uploads', $imageName);
                $product->imagepath = $path;
            }
            // $product->imagepath = $request->image;
            $product->save();
            return redirect('/products');
        }
        //add prodcut
        else {
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->amount = $request->amount;
            $product->description = $request->description;
            $product->category_id = $request->category_id;

            $path = '';

            if ($request->has('image')) {
                $imageName = Str::random(10) . '.' . $request->image->getClientOriginalExtension();
                $path = $request->image->move('uploads', $imageName);
            }
            $product->imagepath = $path;
            $product->save();

            return redirect('/addproduct');
        }
    }

    public function showSingleProduct($id)
    {
        $qrcode = QrCode::size(200)->generate('hello there');
            $product = Product::with('productphoto', 'category')->find($id);
            return view('products.singleproduct', ['product' => $product , 'qrcode' => $qrcode]);
        
    }

    public function show($id = null)
    {
        if ($id) {
            $product = Product::where('category_id', '=', $id)->paginate(6);
            return view('products', ['product' => $product]);
        } else {
            $product = Product::paginate(6);
            return view('products', ['product' => $product]);
        }
    }


    public function edit($id = null)
    {
        if (!$id) {

            return redirect('/addproduct');
        } else {

            $product = Product::find($id);
            $categories = Category::all();
            return view('products.editproduct', ['product' => $product, 'categories' => $categories]);
        }
    }
    public function viewTable()
    {
        $products = Product::all();
        return view('products.producttable', ['products' => $products]);
    }

    public function remove($productid = null)
    {

        if ($productid) {
            $product = Product::find($productid);
            $product->delete();
            return redirect('/products')->with('Product remvoed !');
        } else {
            abort(403, 'Set ID');
        }
    }
 
}
