<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;


    protected $fillable = [
        'sports_id',
        'name',
        'icon',
        'start_date',
        'end_date',
        'description',
        'remarks',
        'banner',
        'status',
        'created_by',
        'updated_by',
    ];
}
