<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $product;
    public function index()
    {
        return view('welcome',[
        'products' => Product::all()
        ]);
    }

    public function saveProduct(Request $request)
    {   //return $request;
        $this->product = new Product();
        $this->product->product_name = $request->product_name;
        $this->product->price = $request-> product_price;
        $this->product->description = $request-> description;
        $this->product->image = $this->saveImage($request);
        $this->product->save();
        return back()->with('message', 'Product Information Saved Successfully');
    }

    private function saveImage($request){
        $image = $request->file('product_image');
        $imageName = rand().'.'.$image->getClientOriginalExtension();
        $directory = 'product-image/';
        $imgUrl = $directory.$imageName;
        $image->move($directory, $imageName);
        return $imgUrl;
    }

    public function deleteProduct(Request $request)
    {
        $this->product = Product::find($request -> product_id);
        if(is_file($this->product->image))
            unlink($this->product->image);
        $this->product->delete();
        return back()->with('message','Deleted one product successfully');
    }

    public function editProduct($id)
    {
        return view('edit-product', [
            'product' => Product::find($id)
        ]);
    }

    public function updateProduct(Request $request)
    {
        $this->product = Product::find($request -> product_id);
        $this->product->product_name = $request->product_name;
        $this->product->price = $request-> product_price;
        $this->product->description = $request-> description;
        if($request->file('product_image')) {
            if(is_file($this->product->image))
                unlink($this->product->image);
            $this->product->image = $this->saveImage($request);
        }
        $this->product->save();
        return redirect('/')->with('message','Updated successfully');
    }
}
