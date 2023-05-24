<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function getProduct() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function getOrder() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
