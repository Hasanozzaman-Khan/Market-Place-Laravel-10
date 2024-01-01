<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/********** Models ***************/
use App\Models\Category;
use App\Models\Advertisement;
use App\Models\City;

/********** Requests ***************/
use App\Http\Requests\AdsFormRequest;
use App\Http\Requests\AdsUpdateRequest;


use Illuminate\Support\Str;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Advertisement::where('user_id', auth()->user()->id)->get();
        // dd($ads);
        return view('Ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $menus = Category::with('subcategories')->get();
        $cities = City::where('state_id', 1)
               ->orderBy('name')
               ->get();
        return view('Ads.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdsFormRequest $request)
    {
        $data = $request->all();

        $featureImage = $request->file('feature_image')->store('public/ads');
        $firstImage = $request->file('first_image')->store('public/ads');
        $secondImage = $request->file('second_image')->store('public/ads');

        $data['feature_image'] = $featureImage;
        $data['first_image'] = $firstImage;
        $data['second_image'] = $secondImage;
        $data['slug'] = Str::slug($request->name);
        $data['user_id'] = auth()->user()->id;

        Advertisement::create($data);
        return redirect()->route('ads.index')->with('message', 'Your Ad Created Successfully.');
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
    public function edit($id)
    {
        $ad = Advertisement::find($id);

        $this->authorize('edit-ad', $ad);

        return view('ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdsUpdateRequest $request, $id)
    {
        $ads = Advertisement::find($id);

        $data = $request->all();

        $featureImage = $ads->feature_image;
        if($request->hasFile('feature_image')){
            $featureImage = $request->file('feature_image')->store('public/ads');
        }
        $firstImage = $ads->first_image;
        if($request->hasFile('first_image')){
            $firstImage = $request->file('first_image')->store('public/ads');
        }
        $secondImage = $ads->second_image;
        if($request->hasFile('second_image')){
            $secondImage = $request->file('second_image')->store('public/ads');
        }

        $data['feature_image'] = $featureImage;
        $data['first_image'] = $firstImage;
        $data['second_image'] = $secondImage;
        $data['slug'] = Str::slug($request->name);
        $data['user_id'] = auth()->user()->id;

        $ads->update($data);
        return redirect()->route('ads.index')->with('message', 'Your Ad Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
