<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
        'restaurant_id'
    ];

    public function restaurants(){
        return $this->belongsTo(Restaurant::class);
    }
}
