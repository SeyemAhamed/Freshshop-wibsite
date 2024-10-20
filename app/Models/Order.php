<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orderDetalis()
    {
        return $this->hasMany(OrderDetalis::class, 'order_id', 'id')->with('product');
    }
}
