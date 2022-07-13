<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title','category_id','price','pic','file','time','desc','qrcode'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
