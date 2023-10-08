<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function AllCategory(){

        $categorys = Category::latest()->get();
        //$categorys = Category::all();

        return view('admin.category.allcategory', compact('categorys'));
    }

    public function AddCategory(){
        return view('admin.category.addcategory');
    }

    public function StoreCategory(Request $request){

        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '_', $request->category_name))
        ]);

        return redirect()->route('admin.allcategory')->with('message', 'Category Added Successfully');

    }

    public function EditCategory($id){
        $category = Category::findOrFail($id);
        return view('admin.category.editcategory', compact('category'));
    }

    public function UpdateCategory(Request $request){
        $category_data = $request->category_id;

        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        Category::findOrfail($category_data)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '_', $request->category_name))
        ]);

        return redirect()->route('admin.allcategory')->with('message', 'Category Update Successfully');

    }

    function DeleteCategory($id){

        Category::findOrfail($id)->delete();
        return redirect()->route('admin.allcategory')->with('message', 'Category deleted Successfully');

    }



}
