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
    public function show($id, $slug)
    {
            $advertisement = Advertisement::where('id', $id)->where('slug', $slug)->first();
            // dd($advertisement->displayVideo());
            return view('Product.show', compact('advertisement'));
    }


    public function findBasedOnCategory(Request $request, Category $categorySlug)
    {
        $AdvertisementBasedOnFilter = Advertisement::where('category_id', $categorySlug->id)
            ->when($request->minPrice, function($query, $minPrice){
                return $query->where('price','>=',$minPrice);
            })
            ->when($request->maxPrice, function($query, $maxPrice){
                return $query->where('price','<=',$maxPrice);
            })->get();

        $AdvertisementWithoutFilter = $categorySlug->ads;

        $advertisements = $request->minPrice||$request->maxPrice?$AdvertisementBasedOnFilter:$AdvertisementWithoutFilter;

        $subcategories = $categorySlug->ads->unique('subcategory_id');
        $category = $categorySlug;
        // dd($subcategories);
        return view('Product.category', compact(['advertisements', 'subcategories', 'category']));
    }


    public function findBasedOnSubcategory(Request $request, $categorySlug, Subcategory $subcategorySlug)
    {
        $AdvertisementBasedOnFilter = Advertisement::where('subcategory_id', $subcategorySlug->id)
            ->when($request->minPrice, function($query, $minPrice){
                return $query->where('price','>=',$minPrice);
            })
            ->when($request->maxPrice, function($query, $maxPrice){
                return $query->where('price','<=',$maxPrice);
            })->get();

        $AdvertisementWithoutFilter = $subcategorySlug->ads;

        $advertisements = $request->minPrice||$request->maxPrice?$AdvertisementBasedOnFilter:$AdvertisementWithoutFilter;

        $childcategories = $subcategorySlug->ads->unique('childcategory_id');
        $subcategory = $subcategorySlug;
        // dd($advertisements);
        return view('Product.subcategory', compact(['advertisements', 'childcategories', 'subcategory']));
    }


    public function findBasedOnChildcategory(Request $request, $categorySlug, Subcategory $subcategorySlug, Childcategory $childcategorySlug)
    {
        $AdvertisementBasedOnFilter = Advertisement::where('childcategory_id', $childcategorySlug->id)
            ->when($request->minPrice, function($query, $minPrice){
                return $query->where('price','>=',$minPrice);
            })
            ->when($request->maxPrice, function($query, $maxPrice){
                return $query->where('price','<=',$maxPrice);
            })->get();

        $AdvertisementWithoutFilter = $childcategorySlug->ads;

        $advertisements = $request->minPrice||$request->maxPrice?$AdvertisementBasedOnFilter:$AdvertisementWithoutFilter;

        $childcategories = $subcategorySlug->ads->unique('childcategory_id');
        $subcategory = $subcategorySlug;
        // dd($subcategory);
        return view('Product.childcategory', compact(['advertisements', 'childcategories', 'subcategory']));
    }














}
