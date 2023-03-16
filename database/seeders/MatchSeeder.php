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
        Matches::create([
            'tournament_id' => 1,
            'team1_id' => 1,
            'team2_id' => 2,
            'title' => 'Match 1',
            'start_date_time' => '2023-03-16 09:00:00',
            'end_date_time' => '2023-03-17 11:00:00',
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
            'start_date_time' => '2023-03-16 05:00:00',
            'end_date_time' => '2023-03-17 11:00:00',
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
            'start_date_time' => '2023-03-16 05:00:00',
            'end_date_time' => '2023-03-19 10:00:00',
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
            'start_date_time' => '2023-03-19 04:00:00',
            'end_date_time' => '2023-03-19 12:00:00',
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
            'start_date_time' => '2023-03-19 09:00:00',
            'end_date_time' => '2023-03-20 11:00:00',
            'status' => 'active',
            'description' => 'This is a test match',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
