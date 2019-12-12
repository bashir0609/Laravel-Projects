<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Image;

class ProductController extends Controller
{
    function addproductview()
    {
        $products = Product::paginate(10);
        $deleted_products = Product::onlyTrashed()->get();
        return view('product/view', compact('products', 'deleted_products'));
    }
    public function addproductinsert(Request $request)
    {
        $request->validate([
            'product_name'=> 'required',
            'product_description'=> 'required',
            'product_price'=> 'required|numeric',
            'product_quantity'=> 'required',
            'alert_quantity'=> 'required',
        ]);
        $last_inserted_id = Product::insertGetId([
            'product_name'=>$request->product_name,
            'product_description'=>$request->product_description,
            'product_price'=>$request->product_price,
            'product_quantity'=>$request->product_quantity,
            'alert_quantity'=>$request->alert_quantity,
        ]);
        if($request->hasFile('product_image')){
            $photo_to_upload = $request->product_image;
            $filename = $last_inserted_id.".".$photo_to_upload->getClientOriginalExtension();
            Image::make($photo_to_upload)->resize(400,450)->save( base_path('public/uploads/product_photos/' . $filename ) );
            Product::find($last_inserted_id)->update([
                'product_image' => $filename 
            ]);
        }
        return back()->with('status', 'Product Added Successfully!');
    }

    public function addproductdelete($product_id)
    {
        Product::find($product_id)->delete();
        return back()-> with('deletestatus', 'Product Deleted Successfully!');
    }
    public function addproductrestore($product_id)
    {
        Product::onlyTrashed()->where('id', $product_id)->restore();
        return back();
    }
    public function addproductpermanentdelete($product_id)
    {
        Product::onlyTrashed()->where('id', $product_id)->forceDelete();
        return back();
    }

    public function addproductedit($product_id)
    {
        $single_product_info = Product::findOrFail($product_id);
        return view('product/edit', compact('single_product_info'));
    }

    public function addproductupdate(Request $request)
    {
        Product::find($request->product_id)->update([
            'product_name'=>$request->product_name,
            'product_description'=>$request->product_description,
            'product_price'=>$request->product_price,
            'product_quantity'=>$request->product_quantity,
            'alert_quantity'=>$request->alert_quantity,
        ]);
        return back()-> with('editstatus', 'Product Edited Successfully!');
    }
}
