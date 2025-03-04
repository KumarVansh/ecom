<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    protected $fillable = [
        'pic',
        'product_id'
    ];

    function pic()
    {
        return Storage::url($this->pic);
    }
}
