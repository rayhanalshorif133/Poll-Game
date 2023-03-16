<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'match_id',
        'point',
        'total_days',
        'days',
        'role',
        'status',
    ];


    public function match()
    {
        return $this->belongsTo(Matches::class);
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
