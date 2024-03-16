<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function items()
    {
       return $this->HasMany(item::class);
    }
    protected $fillable = [
        'name',
        'description',
        // Add more attributes here if needed
    ];
}
