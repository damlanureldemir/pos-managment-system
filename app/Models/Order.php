<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $fillable=['name','address'];

    public function orderdetail(){
        return $this->hasMany('App\Order_Detail');
    }

}
