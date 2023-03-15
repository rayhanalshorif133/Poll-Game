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
            'images' => json_encode([
                'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png',
            ]),
            'option_1' => 'Team 1',
            'option_2' => 'Team 2',
            'option_3' => 'Team 3',
            'option_4' => 'Team 4',
            'answer' => 'option_1',
            'point' => 10,
            'status' => 'active',
            'description' => 'This is a description',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Poll::create([
            'match_id' => 2,
            'question' => 'What will be the score of the match?',
            'images' => json_encode([
                'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png',
            ]),
            'option_1' => 'Under 100',
            'option_2' => '100-150',
            'option_3' => '150-200',
            'option_4' => '200-250',
            'answer' => 'option_1',
            'point' => 15,
            'status' => 'active',
            'description' => 'This is a description',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
