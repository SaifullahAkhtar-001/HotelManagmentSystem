<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\settings;

class Hotel extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'interior' => 'json',
        'amenities' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }
<<<<<<< Updated upstream
    protected $fillable = ['user_id', 'name', 'address', 'location', 'contact_number', 'email', 'description', 'rooms', 'facilities'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
=======

    public function imggallery(){
        return $this->morphMany(ImgGallery::class,'imagable');
>>>>>>> Stashed changes
    }
}
