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
        return $this->belongsTo(Tournament::class, 'tournament_id');
    }

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }

    public function poll()
    {
        return $this->hasMany(Poll::class, 'match_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function right_answer($matchId, $accountId)
    {
        $correct_answer = Score::select()
            ->where('account_id', $accountId)
            ->where('match_id', $matchId)
            ->where('answer_status', 'correct')
            ->count();
        return $correct_answer;
    }
    public function wrong_answer($matchId, $accountId)
    {
        $wrong_answer = Score::select()
            ->where('account_id', $accountId)
            ->where('match_id', $matchId)
            ->where('answer_status', 'wrong')
            ->count();
        return $wrong_answer;
    }


    public function rank($matchId, $accountId)
    {

        $allScore = Score::select()
            ->where('match_id', $matchId)
            ->get();
        $allScore = $allScore->groupBy('account_id');
        $allScore = $allScore->sortByDesc(function ($score, $key) {
            return $score->sum('point');
        });
        $allScore = $allScore->toArray();
        $allScore = array_keys($allScore);
        $rank = array_search($accountId, $allScore);
        $rank = $rank + 1;
        $scores = Score::select()
            ->where('account_id', $accountId)
            ->where('match_id', $matchId)
            ->get();
        if ($scores->count() > 0) {
            return $rank;
        } else {
            return '- -';
        }
    }
    public function total_score($matchId, $accountId)
    {
        $point = Score::select()
            ->where('account_id', $accountId)
            ->where('match_id', $matchId)
            ->sum('point');
        $scores = Score::select()
            ->where('account_id', $accountId)
            ->where('match_id', $matchId)
            ->get();
        if ($scores->count() > 0) {
            return $point;
        } else {
            return '- -';
        }
    }


    public function timeDiff($matchId)
    {
        $match = Matches::find($matchId);
        $start_date_time = $match->start_date_time;
        $end_date_time = $match->end_date_time;
        $start_date_time = strtotime($start_date_time);
        $end_date_time = strtotime($end_date_time);
        $current_time = time();
        $timeDiff = $end_date_time - $current_time;
        return $timeDiff;
    }
}
