<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // protected $table="products";

protected $fillable = ['name', 'image', 'description','guarantee', 'mrp', 'sellprice', 'stock', 'sku', 'producttype_id', 'subcategory_id', 'category_id', 'brand_id', 'status'];

   
public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


}
