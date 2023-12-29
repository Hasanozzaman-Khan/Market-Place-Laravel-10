<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\State;
use App\Models\City;


class ApiAddressController extends Controller
{
    public function getCountry(){
        $countries = Country::get();
        return response()->json($countries);
    }

    public function getState(Request $request){
        $states = State::where('country_id', $request->country_id)->get();
        return response()->json($states);
    }

    public function getCity(Request $request){
        $cities = City::where('state_id', $request->state_id)->get();
        return response()->json($cities);
    }
}
