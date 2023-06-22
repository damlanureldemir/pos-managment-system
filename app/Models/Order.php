<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $table='orders';
    protected $fillable=['name','address'];
    use HasFactory;
    /**public function post(){
        return $this->hasOne(Order_Detail::class);
    }
     * */
 public function orderdetail()
 {
     return $this->hasMany('App\Order_Detail');
 }

}
