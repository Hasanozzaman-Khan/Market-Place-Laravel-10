<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;



class ApiCategoryController extends Controller
{
    public function getCategory(){
        $categories = Category::get();
        return response()->json($categories);
    }

    public function getSubcategory(Request $request){
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();
        return response()->json($subcategories);
    }

    public function getChildcategory(Request $request){
        $childcategories = Childcategory::where('subcategory_id', $request->subcategory_id)->get();
        return response()->json($childcategories);
    }
}
