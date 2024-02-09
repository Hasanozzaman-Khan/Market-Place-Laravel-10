<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/********** Models ***************/
use App\Models\Advertisement;
// use App\Models\Category;
// use App\Models\City;

class AdminListingController extends Controller
{
    public function index()
    {
        $ads = Advertisement::latest()->paginate(3);
        // dd($ads);
        return view('Backend.Listing.index', compact('ads'));
    }
}
