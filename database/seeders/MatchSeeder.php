<?php

namespace Database\Seeders;

use App\Models\Matches;
use Illuminate\Database\Seeder;

class MatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start_date_time = new \DateTime();
        $start_date_time->modify('-1 day');
        $end_date_time =  new \DateTime();
        $end_date_time->modify('+2 day');
        Matches::create([
            'tournament_id' => 1,
            'team1_id' => 1,
            'team2_id' => 2,
            'title' => 'Match 1',
            'start_date_time' => $start_date_time,
            'end_date_time' => $end_date_time,
            'status' => 'active',
            'description' => 'This is a test match',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Matches::create([
            'tournament_id' => 1,
            'team1_id' => 1,
            'team2_id' => 4,
            'title' => 'Match 2',
            'start_date_time' => $start_date_time,
            'end_date_time' => $end_date_time,
            'status' => 'active',
            'description' => 'This is a test match',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Matches::create([
            'tournament_id' => 1,
            'team1_id' => 3,
            'team2_id' => 1,
            'title' => 'Match 3',
            'start_date_time' => $start_date_time,
            'end_date_time' => $end_date_time,
            'status' => 'active',
            'description' => 'This is a test match',
            'created_by' => 1,
            'updated_by' => 1,
        ]);


        Matches::create([
            'tournament_id' => 2,
            'team1_id' => 3,
            'team2_id' => 1,
            'title' => 'Match 4',
            'start_date_time' => $start_date_time,
            'end_date_time' => $end_date_time,
            'status' => 'active',
            'description' => 'This is a test match',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Matches::create([
            'tournament_id' => 2,
            'team1_id' => 3,
            'team2_id' => 2,
            'title' => 'Match 5',
            'start_date_time' => $start_date_time,
            'end_date_time' => $end_date_time,
            'status' => 'active',
            'description' => 'This is a test match',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
