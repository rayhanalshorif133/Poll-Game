<?php

namespace Database\Seeders;

use App\Models\Poll;
use Illuminate\Database\Seeder;

class PollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get the
        Poll::create([
            'match_id' => 1,
            'question' => 'Who will win the match?',
            'images' => '/images/sports/football-img.png',
            'option_1' => 'Team 1',
            'option_2' => 'Team 2',
            'option_3' => 'Team 3',
            'option_4' => 'Team 4',
            'answer' => 'Team 1',
            'status' => 'active',
            'description' => 'This is a description',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
