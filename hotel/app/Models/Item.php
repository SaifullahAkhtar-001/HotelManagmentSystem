<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function imggallery(){
        return $this->morphMany(ImgGallery::class,'imagable');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
