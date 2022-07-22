<?php

namespace App\Models;

use App\Enums\MailTokenType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailToken extends Model
{
    use HasFactory;

    public $table = "email_tokens";

    protected $fillable = [
        'token',
        'type',
        'user_id',
        'expires_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
