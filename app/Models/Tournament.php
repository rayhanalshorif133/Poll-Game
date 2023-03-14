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


    public function sports()
    {
        return $this->belongsTo(Sports::class, 'sports_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function match()
    {
        return $this->hasMany(Matches::class, 'tournament_id');
    }
}
