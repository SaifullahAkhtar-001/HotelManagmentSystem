<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function website_settings()
    {
        return $this->belongsTo(WebsiteSettings::class);
    }
    public function interior()
    {
        return $this->belongsTo(Interior::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }

    public function imggallery(){
        return $this->morphMany(ImgGallery::class,'imagable');
    }
}
