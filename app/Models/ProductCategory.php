<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    /**
     * Возвращает ресторан категории продуктов
     */
    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }

    /**
     * Возвращает продукты определенной категории
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
