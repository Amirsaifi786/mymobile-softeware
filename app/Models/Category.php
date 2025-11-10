<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'image', 'status'];
public function subcategory()
{
    return $this->belongsTo(Subcategory::class, 'id');
}
 public function products()
    {
        return $this->hasMany(Product::class);
    }


}
