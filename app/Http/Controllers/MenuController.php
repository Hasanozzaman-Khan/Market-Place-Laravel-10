<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/********** Models ***************/
use App\Models\Category;

class MenuController extends Controller
{
    public function menu(){
        $menus = Category::with('subcategories')->get();
        // return $menus;
        return view('index', compact('menus'));
    }
}
