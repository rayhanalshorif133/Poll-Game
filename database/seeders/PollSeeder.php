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

        Poll::create([
            'match_id' => 3,
            'question' => 'What does ice become when you heat it?',
            'images' => json_encode([
                'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png',
            ]),
            'option_1' => 'Water',
            'option_2' => 'Steam',
            'option_3' => 'Ice',
            'option_4' => 'None of the above',
            'answer' => 'option_1',
            'point' => 5,
            'status' => 'active',
            'description' => 'This is a description',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Poll::create([
            'match_id' => 3,
            'question' => 'From where in the universe do we get solar energy?',
            'images' => json_encode([
                'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png',
            ]),
            'option_1' => 'Sun',
            'option_2' => 'Moon',
            'answer' => 'option_1',
            'point' => 5,
            'status' => 'active',
            'description' => 'This is a description',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Poll::create([
            'match_id' => 1,
            'question' => 'What is the capital of India?',
            'images' => json_encode([
                'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png',
            ]),
            'option_1' => 'Delhi',
            'option_2' => 'Mumbai',
            'option_3' => 'Kolkata',
            'option_4' => 'Chennai',
            'answer' => 'option_1',
            'point' => 5,
            'status' => 'active',
            'description' => 'This is a description',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Poll::create([
            'match_id' => 2,
            'question' => 'What is the capital of Bangladesh?',
            'images' => json_encode([
                'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png',
            ]),
            'option_1' => 'Dhaka',
            'option_2' => 'Chittagong',
            'option_3' => 'Khulna',
            'answer' => 'option_1',
            'point' => 5,
            'status' => 'active',
            'description' => 'This is a description',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Poll::create([
            'match_id' => 3,
            'question' => 'What is the capital of Pakistan?',
            'images' => json_encode([
                'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png',
            ]),
            'option_1' => 'Islamabad',
            'option_2' => 'Karachi',
            'option_3' => 'Lahore',
            'option_4' => 'Peshawar',
            'answer' => 'option_1',
            'point' => 5,
            'status' => 'active',
            'description' => 'This is a description',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
