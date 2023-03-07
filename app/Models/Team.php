<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'logo',
        'banner',
        'status',
        'description',
        'created_by',
        'updated_by',
    ];
}
