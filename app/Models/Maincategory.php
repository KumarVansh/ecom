<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Maincategory extends Model
{
    protected $fillable = [
        'name',
        'pic',
        'active'
    ];

    function pic(){
        return Storage::url($this->pic);
    }
}
