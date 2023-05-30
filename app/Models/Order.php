<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $fillable=['product_id','address'];
    use HasFactory;
    /**public function post(){
        return $this->hasOne(Order_Detail::class);
    }
     * */
    function getProduct(){
        return $this->belongsTo('App\Models\Product','id','product_id');
    }

}
