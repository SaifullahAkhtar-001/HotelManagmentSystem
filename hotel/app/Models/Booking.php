<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $validate)
 */
class Booking extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $guarded = [];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
   public function item(){
    return $this->belongsTo(Item::class);
   }
}
