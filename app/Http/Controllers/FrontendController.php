<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/********** Models ***************/
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Advertisement;
// use App\Models\City;

class FrontendController extends Controller
{
    public function findBasedOnSubcategory($categorySlug, $subcategorySlug)
    {
        return view('Product.subcategory'); // , compact('ads')
    }
}
