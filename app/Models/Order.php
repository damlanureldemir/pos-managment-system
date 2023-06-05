<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table='orders';
    protected $fillable=['product_id','address'];

    function getProduct(){
        return $this->belongsTo('App\Models\Product','id','product_id');
    }

}
