<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/********** Models ***************/
use App\Models\Category;
use App\Models\Advertisement;

class MenuController extends Controller
{
    public function menu(){
        // For Category Car
        $category = Category::CategoryCar();
        // $category = Category::where('name', 'Electronic')->first();

        $firstAds = Advertisement::FirstFourAdsInCaurosel($category->id);
        // $firstAds = Advertisement::where('category_id', $category->id)
        //                     ->orderByDesc('id')->take(1)->get();

        $secondAds = Advertisement::SecondFourAdsInCaurosel($category->id);
        // $secondAds = Advertisement::where('category_id', $category->id)
        //                     ->whereNotIn('id', $firstAds->pluck('id')->toArray())
        //                     ->orderByDesc('id')->take(2)->get();

        // For Category Electronic
        $categoryElectronic = Category::CategoryElectronic();
        $firstAdsElectronic = Advertisement::FirstFourAdsInCaurosel($categoryElectronic->id);
        $secondAdsElectronic = Advertisement::SecondFourAdsInCaurosel($categoryElectronic->id);
        // return $menus;
        // dd($firstAdsElectronic);
        return view('index', compact(['firstAds', 'secondAds', 'category', 'categoryElectronic', 'firstAdsElectronic', 'secondAdsElectronic']));
    }
}
