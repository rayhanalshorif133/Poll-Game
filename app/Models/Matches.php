<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;


    protected $fillable = [
        'tournament_id',
        'team1_id',
        'team2_id',
        'title',
        'start_date_time',
        'end_date_time',
        'status',
        'description',
        'created_by',
        'updated_by',
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournaments::class, 'tournament_id');
    }

    public function team1()
    {
        return $this->belongsTo(Teams::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Teams::class, 'team2_id');
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
