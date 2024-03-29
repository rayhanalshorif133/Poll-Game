<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'match_id',
        'status',
        'role',
    ];


    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function match()
    {
        return $this->belongsTo(Matches::class);
    }
}
