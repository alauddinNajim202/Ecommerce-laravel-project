<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function AllProduct(){

        $products = Product::latest()->get();
        return view('admin.product.allproduct', compact('products'));
    }

    public function AddProduct(){

        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('admin.product.addproduct', compact('categories', 'subcategories'));
    }


    public function StoreProduct(Request $request){


        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_subcategory_id' => 'required',
            'product_category_id' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
            'quantity' => 'required',
        ]);

        // image file

        $image = $request->file('product_img');
        $image_name = hexdec(uniqid()).'.' . $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $image_name);
        $img_url = 'upload/' . $image_name;


        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;

        $product_category_name = Category::where('id', $category_id)->value('category_name');
        $product_subcategory_name = SubCategory::where('id', $subcategory_id)->value('subcategory_name');


        Product::insert([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'product_subcategory_name' => $product_subcategory_name,
            'product_category_name' => $product_category_name,
            'product_category_id' => $category_id,
            'product_subcategory_id' => $subcategory_id,
            'product_img' => $img_url,
            'quantity' => $request->quantity,
            'slug' => strtolower(str_replace(' ', '_', $request->product_name)),

        ]);

        Category::where('id', $category_id)->increment('product_count',1);
        SubCategory::where('id', $subcategory_id)->increment('product_count',1);

        return redirect()->route('admin.allproduct')->with('message', 'Product Added Successfully');

    }

    public function NewProductImg($id){
        $product = Product::findOrfail($id);
        return view('admin.product.updateimageproduct', compact('product'));
    }

    public function UpdateProductImg(Request $request){

        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
        ]);

        // image file

        $image = $request->file('product_img');
        $image_name = hexdec(uniqid()).'.' . $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $image_name);
        $img_url = 'upload/' . $image_name;

        $id = $request->id;

        Product::findOrfail($id)->update([
            'product_img' => $img_url
        ]);

        return redirect()->route('admin.allproduct')->with('message', 'Product Image Updated Successfully');

    }


    public function EditProduct($id){
        $product = Product::findOrfail($id);
        return view('admin.product.editproduct', compact('product'));
    }


    public function UpdateProduct(Request $request){


        $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'quantity' => 'required'
        ]);


        $id = $request->id;

        Product::findOrfail($id)->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'quantity' => $request->quantity,
            'slug' => strtolower(str_replace(' ', '_', $request->product_name)),

        ]);



        return redirect()->route('admin.allproduct')->with('message', 'Product Updated Successfully');
    }


    public function DeleteProduct($id){

        Product::findOrfail($id)->delete();

        return redirect()->route('admin.allproduct')->with('message', 'Product deleted Successfully');

    }
}
