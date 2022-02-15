<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'image'
    ];

    public function restaurantImages(){
        return $this->hasMany(RestaurantImage::class);
    }

    public function productCategories(){
        return $this->hasMany(ProductCategory::class);
    }
}
