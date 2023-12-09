<?php

namespace App\Http\Controllers;

/*********** Requests *************/
use Illuminate\Http\Request;
use App\Http\Requests\SubcategoryFormRequest;
use App\Http\Requests\SubcategoryUpdateRequest;

/*********** Models *************/
use App\Models\Subcategory;

/*********** Helpers *************/
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::orderBy('category_id')->get();
        return view('Backend.Subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Subcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubcategoryFormRequest $request)
    {
        Subcategory::create([
            'name' =>$name= $request->name,
            'category_id' => $request->category_id,
            'slug' => Str::slug($name)
        ]);
        return redirect()->route('subcategory.index')->with('message','Subcategory created successfully.');
        // return back()->with('message','Subcategory created successfully.');
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
        $subcategory = Subcategory::find($id);
        return view('Backend.Subcategory.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubcategoryUpdateRequest $request, string $id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->update(['name'=>$name=$request->name, 'category_id'=>$request->category_id, 'slug'=> Str::slug($name)]);

        return redirect()->route('subcategory.index')->with('message','Subcategory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = Subcategory::find($id);
        // if (Storage::delete($category->image)) {
        //
        // }
        $subcategory->delete();
        return back()->with('message','Subcategory deleted successfully.');
    }
}
