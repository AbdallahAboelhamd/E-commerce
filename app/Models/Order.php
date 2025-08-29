<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     public function orderDetails(){
        return $this->hasMany(OrderDetails::class);
    }
    public function product(){
        return $this->hasMany(Product::class);
    }

}
