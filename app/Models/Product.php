<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
      'product_id',
      'title',
      'description',
      'price',
      'discount_percentage',
      'rating',
      'stock',
      'brand',
      'category',
      'thumbnail_image',
    ];

    public function productImages()
    {
        return $this->hasMany(productImage::class,'product_id','id');
    }
}
