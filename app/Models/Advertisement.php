<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\facades\DB;

use App\Models\Childcategory;
use App\Models\Subcategory;
use App\Models\Category;

use App\Models\Country;
use App\Models\State;
use App\Models\City;

use App\Models\User;

use Cohensive\OEmbed\Facades\OEmbed;

class Advertisement extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function displayVideo(){
        $embed = OEmbed::get($this->link);
        // dd($embed);
        if ($embed) {
        	// Print default embed html code.
        	// echo $embed->html();

        	// Print embed html code with custom width. Works for IFRAME and VIDEO html embed code.
        	// return $embed->html(['width' => 400]);

        	// Checks if embed data contains details on thumbnail.
        	// $embed->hasThumbnail();

        	// Returns embed "src" - URL string / array of strings / null for current embed.
        	// Accepts same options as "html" method.
        	return $embed->src();

        	// Returns an array containing thumbnail details: url, width and height.
        	// $embed->thumbnail();

        	// Returns an array containing all available embed data including default HTML code.
        	// return $embed->data();
        }
    }


    public function categories(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function subcategories(){
        return $this->hasOne(Subcategory::class, 'id', 'subcategory_id');
    }

    public function childcategories(){
        return $this->hasOne(Childcategory::class, 'id', 'childcategory_id');
    }

    public function countries(){
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function states(){
        return $this->hasOne(State::class, 'id', 'state_id');
    }

    public function cities(){
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }



    // Scope
    public function scopeFirstFourAdsInCaurosel($query, $categoryId){
        return $query->where('category_id', $categoryId)->orderByDesc('id')->take(4)->get();
    }

    public function scopeSecondFourAdsInCaurosel($query, $categoryId){
        $firstAds = $this->scopeFirstFourAdsInCaurosel($query, $categoryId);
        return $query->where('category_id', $categoryId)
                            ->whereNotIn('id', $firstAds->pluck('id')->toArray())
                            ->orderByDesc('id')->take(4)->get();
    }


    // Save Ad Relationship
    public function userads(){
        return $this->belongsToMany(User::class); //, 'user_id', 'id'
    }

    // Check if user already saved the Ad
    public function didUserSavedAd(){
        return DB::table('advertisement_user')
                    ->where('user_id', auth()->user()->id)
                    ->where('advertisement_id', $this->id)
                    ->first();
    }


}
