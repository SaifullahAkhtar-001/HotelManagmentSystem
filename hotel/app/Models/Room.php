<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($id)
 */
class Room extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
    public function imggallery(){
        return $this->morphMany(ImgGallery::class,'imagable');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
