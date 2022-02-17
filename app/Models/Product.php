<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Возвращает категорию продукта
     */
    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory');
    }
}
