<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = [
        'name',
        'maincategory_id',
        'subcategory_id',
        'brand_id',
        'color',
        'size',
        'basePrice',
        'discount',
        'finalPrice',
        'stock',
        'stockQuantity',
        'description',
        'active' 
    ];

    function maincategory(){
        return $this->belongsTo(Maincategory::class,"maincategory_id");
    }

    function subcategory(){
        return $this->belongsTo(Subcategory::class,"subcategory_id");
    }

    function brand(){
        return $this->belongsTo(Brand::class,"brand_id");
    }

    function images(){
        return $this->hasMany(ProductImage::class);
    }
  
}
