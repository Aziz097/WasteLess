<?php
// app/Models/User.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'User';

    protected $fillable = [
        'name',
        'phone',
        'password',
        'role',
        'npwp', // NPWP hanya untuk supermarket
        'address', // alamat hanya untuk supermarket
    ];

    protected $hidden = [
        'password',
    ];
}

