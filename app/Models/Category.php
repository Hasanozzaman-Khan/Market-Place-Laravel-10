<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Subcategory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'slug'];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function subcategories(){
        return $this->hasMany(Subcategory::class, 'category_id', 'id');
    }

    public function ads(){
        return $this->hasMany(Advertisement::class, 'category_id', 'id');
    }

    // Scope
    public function scopeCategoryCar($query){
        return $query->where('name', 'Car')->first();
    }

    public function scopeCategoryElectronic($query){
        return $query->where('name', 'Electronic')->first();
    }






}
