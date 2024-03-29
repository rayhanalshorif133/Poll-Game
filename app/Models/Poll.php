<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'day',
        'question',
        'images',
        'option_type',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'answer',
        'point',
        'status',
        'description',
        'created_by',
        'updated_by',
    ];

    public function match()
    {
        return $this->belongsTo(Matches::class, 'match_id');
    }

    public function score()
    {
        return $this->hasMany(Score::class, 'poll_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
