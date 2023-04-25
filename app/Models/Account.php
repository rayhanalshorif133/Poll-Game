<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'token',
        'operator',
        'avatar',
    ];

    // auto create token
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->token = $model->token ?? bin2hex(random_bytes(32));
        });
    }
}
