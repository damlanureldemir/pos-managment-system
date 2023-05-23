<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'description',
        'brand',
        'image',
        'price',
        'quantity',
        'category_id',
        'alert_stock',
    ];
    function getCategory(){
        return $this->hasOne('App\Models\Category','id','category_id');
    }
}
