<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ForntendController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }
    public function productdetails($product_id)
    {
        $singleproducts = Product::find($product_id);
        $relatedproducts = Product::where('id','!=', $product_id)->get();
        return view('frontend/productdetails', compact('singleproducts', 'relatedproducts'));
    }
}
