<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\CategoryFormRequest;

use App\Models\Category;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('Backend.Category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFormRequest $request)
    {
        $image = $request->file('image')->store('public/category');

        Category::create([
            'name' =>$name= $request->name,
            'image' => $image,
            'slug' => Str::slug($name)
        ]);
        return redirect()->route('category.index')->with('message','Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('Backend.Category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if($request->hasFile('image')){
            Storage::delete($category->image);
            $image = $request->file('image')->store('public/category');
            $category->update(['name'=>$name=$request->name, 'slug'=> Str::slug($name), 'image'=>$image]);
        }else {
            $category->update(['name'=>$name=$request->name, 'slug'=> Str::slug($name)]);
        }
        return redirect()->route('category.index')->with('message','Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (Storage::delete($category->image)) {
            $category->delete();
        }
        return back()->with('message','Category deleted successfully.');
    }
}
