<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'poll_id',
        'account_id',
        'match_id',
        'given_answer',
        'point',
        'answer_status',
        'created_by',
        'updated_by',
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
