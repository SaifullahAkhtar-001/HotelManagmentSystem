<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_name',
        'hotel_address',
        'phone',
        'email',
        // Add more columns as needed
    ];
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
