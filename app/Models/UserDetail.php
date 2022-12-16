<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $table = 'user_profile';
    protected $fillable = [
        'user_id',
        'phone',
        'pin_code',
        'address',
    ];
}
