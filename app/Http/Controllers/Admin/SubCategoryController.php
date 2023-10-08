<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function AllSubCategory(){
        $subcategories = SubCategory::all();
        return view('admin.sub-category.allsubcategory', compact('subcategories'));
    }

    public function AddSubCategory(){

        $category = Category::all();
        return view('admin.sub-category.addsubcategory', compact('category'));
    }

    public function StoreSubcategory(Request $request){

        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories',
            'category_id' => 'required',
        ]);

        $category_id = $request->category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = $request->subcategory_name;

        SubCategory::insert([
            'subcategory_name' => $subcategory_name,
            'slug' => strtolower(str_replace(' ', '_', $subcategory_name)),
            'category_id' => $category_id,
            'category_name' => $category_name,
        ]);

        Category::where('id', $category_id)->increment('sub_category_count',1);


        return redirect()->route('admin.allsubcategory')->with('message', 'Sub category Added Successfully');

    }

    public function EditSubcategory($id){

        $subcategory = SubCategory::findOrfail($id);
        //$category = Category::all();

        return view('admin.sub-category.editsubcategory', compact('subcategory'));

    }

    public function UpdateSubcategory(Request $request){
        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories',
            'subcategory_id' => 'required',
        ]);

        $subcategory_id = $request->subcategory_id;

        SubCategory::findOrfail($subcategory_id)->update([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ', '_', $request->subcategory_name))
        ]);

        return redirect()->route('admin.allsubcategory')->with('message', 'Sub Category Update Successfully');


    }

    public function DeleteSubcategory($id){

        SubCategory::findOrfail($id)->delete();
        return redirect()->route('admin.allsubcategory')->with('message', 'Sub Category deleted Successfully');

    }


}
