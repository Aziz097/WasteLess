<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supermarket extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_supermarket',
        'alamat',
        'nama_lengkap',
        'no_hp',
        'otp_code',
        'password'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
