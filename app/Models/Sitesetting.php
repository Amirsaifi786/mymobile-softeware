<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitesetting extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'url', 'contact', 'email', 'address','logo','favicon','background_image','color','background_color','footer_text','status'];
}
   