<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supermarket extends Model
{
    protected $fillable = ['nama', 'latitude', 'longitude'];

    // Event untuk meng-generate id random sebelum create
    protected static function booted()
    {
        static::creating(function ($supermarket) {
            if (!$supermarket->id) {
                $supermarket->id = random_int(1000, 9999); // Random ID 4 digit
            }
        });
    }
}
