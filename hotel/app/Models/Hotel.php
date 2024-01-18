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

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function website_settings(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(WebsiteSettings::class);
    }

    public function term(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Term::class);
    }
    public function interior(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Interior::class);
    }

    public function facilities(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Facility::class);
    }

    public function imggallery(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(ImgGallery::class,'imagable');
    }
}
