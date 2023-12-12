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

    public function settings()
    {
        return $this->hasOne(Setting::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }
}
