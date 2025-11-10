<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $timestamps = false;
    protected $table = 'cart';
    protected $fillable = [
         'user_id', 
         'product_id', 
         'quantity', 
         'price', 
         'tax', 
         'discount', 
         'subtotal'
    ];
       public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


}
