<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

/********** Models ***************/
use App\Models\User;
use App\Models\Advertisement;

class SaveAdController extends Controller
{
    public function adSave(Request $request){
        $ad = Advertisement::find($request->adId);

        $ad->userads()->syncWithOutDetaching($request->userId);
    }

    public function getSavedAd(Request $request){
        $adId = DB::table('advertisement_user')
                    ->where('user_id', auth()->user()->id)
                    ->pluck('advertisement_id');
                    // ->get();
        $ads = Advertisement::whereIn('id', $adId)->get();
        // return $ads;
        return view('Profile.saved-ad', compact('ads'));
    }

    public function destroy(Request $request)
    {
        $ad = DB::table('advertisement_user')
                    ->where('user_id', auth()->user()->id)
                    ->where('advertisement_id', $request->adId)
                    ->delete();
        return back()->with('message', 'Saved ads deleted Successfully.');
    }

}
