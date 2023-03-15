<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'tournament_id',
        'point',
        'total_days',
        'days',
        'role',
        'status',
    ];



    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
