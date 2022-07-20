<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'type',
        'user_id',
        'expired_time',
    ];
}