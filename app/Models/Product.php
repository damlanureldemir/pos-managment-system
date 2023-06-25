<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


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
    public function orderdetail(){
        return $this->hasMany('App\Order_Detail');
    }

    public function getCategory(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }


}
