<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fraud;

class FraudController extends Controller
{
    public function index()
    {
        $ads = Fraud::paginate(20);
        // dd($ads);
        return view('Backend.Fraud.index', compact('ads'));
    }


    public function store(Request $request){
        Fraud::create([
            'reason' => $request->reason,
            'email' => $request->email,
            'message' => $request->message,
            'ad_id' => $request->ad_id,
        ]);
        return back()->with('message','Your report has been recorded. Thank you for your feedback.');
    }
}
