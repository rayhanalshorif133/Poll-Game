<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreImage extends Model
{
    use HasFactory;


    protected $table = 'score_images';

    protected $fillable = [
        'account_id',
        'match_id',
        'image',
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
