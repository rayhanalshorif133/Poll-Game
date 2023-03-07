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
        'start_time',
        'end_time',
        'status',
        'description',
        'created_by',
        'updated_by',
    ];


}
