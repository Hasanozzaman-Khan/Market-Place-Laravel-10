<?php

namespace App\Http\Controllers;

/*********** Requests *************/
use Illuminate\Http\Request;
use App\Http\Requests\ChildcategoryFormRequest;
use App\Http\Requests\ChildcategoryUpdateRequest;

/*********** Models *************/
use App\Models\Childcategory;

/*********** Helpers *************/
use Illuminate\Support\Str;


class ChildcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $childcategories = Childcategory::orderBy('subcategory_id')->get();
        return view('Backend.Childcategory.index', compact('childcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Childcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChildcategoryFormRequest $request)
    {
        Childcategory::create([
            'name' =>$name= $request->name,
            'subcategory_id' => $request->subcategory_id,
            'slug' => Str::slug($name)
        ]);
        return redirect()->route('childcategory.index')->with('message','Childcategory created successfully.');
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
        $childcategory = Childcategory::find($id);
        return view('Backend.Childcategory.edit', compact('childcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChildcategoryUpdateRequest $request, string $id)
    {
        $childcategory = Childcategory::find($id);
        $childcategory->update(['name'=>$name=$request->name, 'subcategory_id'=>$request->subcategory_id, 'slug'=> Str::slug($name)]);

        return redirect()->route('childcategory.index')->with('message','Childcategory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $childcategory = Childcategory::find($id);
        $childcategory->delete();

        return back()->with('message','Childcategory deleted successfully.');
    }
}
