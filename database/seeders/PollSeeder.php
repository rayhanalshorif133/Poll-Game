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


        // 120 Polls
        for ($index = 0; $index < 500; $index++) {
            Poll::create([
                'match_id' => random_int(1, 2),
                'question' => $this->getQst(),
                'option_1' => 'https://picsum.photos/200/200?random=1',
                'option_2' => 'https://picsum.photos/200/200?random=2',
                'option_type' => 'image',
                'answer' => 'option_1',
                'point' => random_int(10, 30),
                'day' => random_int(1, 4),
                'status' => 'active',
                'description' => 'This is a description',
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }


    public function getQst()
    {

        $questions = [
            "What have you created that you are most proud of?",
            "What's the best thing you got from one of your parents?",
            "What bends your mind every time you think about it?",
            "In your group of friends, what role do you play?",
            "What incredibly strong opinion do you have that is completely unimportant in the grand scheme of things?",
            "What's your favorite piece of clothing you own?",
            "What fictional place would you most like to go to?",
            "What's one place you've travelled that you never want to go back to?",
            "When people come to you for help, what do they usually want help with?",
            "What are you interested in that most people haven't heard of?",
            "Mountains or ocean?",
            "What was your best birthday?",
            "Pizza or tacos?",
            "What's the story behind one of your scars?",
            "Pancakes or waffles?",
            "Pirates or ninjas?",
            "What was the best compliment you've ever received?",
            "If you lost all of your possessions but one, what would you want it to be?",
            "Who inspires you to be better?",
            "What dumb accomplishment are you most proud of?",
            "When was the last time you changed your opinion about something major?",
            "What is something you can never seem to finish?",
            "What is one of your favorite smells?",
            "If you had to change your name, what would you change it to?",
            "What are you a natural at?",
            "What do you like most about your family?",
            "Have you ever saved someone's life?",
            "What's an unpopular opinion you have?",
            "Who is one of your best friends, and what do you love about them?",
            "Do you have any nicknames?",
            "What's one of your favorite comfort foods?",
            "What is your theme song?",
            "What is one of the great values that guides your life?",
            "What's your favorite book?",
            "What's the last book you gave up on and stopped reading?",
            "What's the worst movie you've ever seen?",
            "What issue will you always speak your mind about?",
            "What would you do on a free afternoon in the middle of the week?",
            "Pet peeves?",
            "What's the best piece of advice you ever received?",
            "Who was your favorite teacher and why?",
            "If you could have any superpower, what would it be and why?",
            "What's on your bucket list this year?",
            "If you could live in a book, TV show, or movie, what would it be?",
            "What languages do you speak?",
            "Would you rather be stuck on a broken ski lift or a broken elevator?",
            "If you were a vegetable, what vegetable would you be?",
            "What makes you cry?",
            "Who are some of your heroes?",
            "What's something you wish you'd figured out sooner?",
            "What's your favorite candy?",
            "What's your worst habit?",
            "Favorite city?",
            "What's your go-to dance move?",
            "Do you ever sing when you're alone? What songs?",
            "What's your earliest memory?",
            "What's something you learned in the last week?",
            "What story does your family always tell about you?",
            "What talent would you show off in a talent show?",
        ];

        $randomNumber = rand(0, count($questions) - 1);
        $question = $questions[$randomNumber];
        return $question;
    }
}
