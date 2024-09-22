<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function subCategoryList()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1) {
                $subCategories = SubCategory::get();
                return view('backend.admin.subcategory.list', compact('subCategories'));
            }
        }
    }

    public function subCategoryCreate()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1) {
                $categories = Category::get();
                return view('backend.admin.subcategory.create', compact('categories'));
            }
        }
    }

    public function subCategoryStore (Request $request)
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1){
                $subCategory = new SubCategory();

                $subCategory->cat_id = $request->cat_id;
                $subCategory->name = $request->name;
                $subCategory->slug = Str::slug($request->name);

                $subCategory->save();
                toastr()->success('Successfully Created!');
                return redirect()->back();
            }
        }
    }

    public function subCategoryDelete ($id)
    {
        if(Auth::user()){
            if(Auth::user()->role ==1){
                $subCategory = SubCategory::find($id);


        $subCategory->delete();
        toastr()->error('Successfully Delete!');
        return redirect()->back();
            }
        }
    }

    public function subCategoryEdit ($id)
    {
        if(Auth::user()){
            if(Auth::user()->role ==1){
                $subCategory = SubCategory::find($id);
        
            return view('backend.admin.subcategory.edit', compact('subCategory'));
            }
        }
    }

    public function subCategoryUpdate (Request $request, $id)
    {
        if(Auth::user()){
            if(Auth::user()->role ==1){
            $subCategory = SubCategory::find($id);

        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);



        $subCategory->save();
        toastr()->success('Successfully Update!');
        return redirect('/admin/sub-category/list');
            }
        }
    }
}