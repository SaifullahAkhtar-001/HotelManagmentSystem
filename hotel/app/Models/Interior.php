<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interior extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function hotel()
    {
        return $this->hasOne(Hotel::class);
    }
    public function imggallery(){
        return $this->morphMany(ImgGallery::class,'imagable');
    }
}
