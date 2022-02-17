<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static find(mixed $getAttribute)
 */
class RestaurantImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
        'restaurant_id'
    ];

    public function restaurants() : BelongsTo{
        return $this->belongsTo(Restaurant::class);
    }

}
