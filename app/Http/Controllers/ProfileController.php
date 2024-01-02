<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Profile.index'); // , compact('ads')
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'mimes:jpg,png,jpeg'
        ]);
        $user = User::find(auth()->user()->id);

        $image = $user->avatar;
        if($request->hasFile('image')){
            $image = $request->file('image')->store('public/avatar');
        }

// dd($request->all());
        $user->update([
            'name'=>$name=$request->name,
            'address'=>$request->address,
            'avatar'=>$image
        ]);
        // $user->update([
        //     'name' => $request->name,
        //     'address' => $request->address,
        //     'avatar' => $image;
        // ]);

        return redirect()->back()->with('message', 'Profile Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
