<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function getCategory() {
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    public function getOrderDetails() {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }
}
