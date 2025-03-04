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
        'discription',
        'active' 
    ];

    function pic(){
        return Storage::url($this->pic);
    }
}
