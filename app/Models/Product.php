<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'product_code', 'product_des','product_quantity','product_price','product_image','product_status','category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
