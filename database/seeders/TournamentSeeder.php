<?php

namespace Database\Seeders;

use App\Models\Tournament;
use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tournament::create([
            'sports_id' => 1,
            'name' => 'UEFA Champions League',
            'icon' => '/images/tournament/default.png',
            'start_date' => '2023-03-17',
            'end_date' => '2023-03-25',
            'duration' => '10',
            'day' => 'waiting',
            'description' => 'The UEFA Champions League is an annual club football competition organised by the Union of European Football Associations (UEFA) and contested by top-division European clubs, deciding the best team in Europe. It is one of the most prestigious tournaments in the world and the most prestigious club competition in European football, played by the national league champion (and, for some nations, one or more runners-up) of each UEFA national association.',
            'remarks' => 'The tournament was first played in 1955–56,',
            'banner' => '/images/tournament/default.png',
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);


        Tournament::create([
            'sports_id' => 2,
            'name' => 'ICC Cricket World Cup',
            'icon' => '/images/tournament/default.png',
            'start_date' => '2023-03-17',
            'end_date' => '2023-03-25',
            'duration' => '10',
            'day' => 'waiting',
            'description' => 'The ICC Cricket World Cup is the international championship of One Day International (ODI) cricket. The event is organised by the sport\'s governing body, the International Cricket Council (ICC), with preliminary qualification rounds leading up to a finals tournament held every four years. The tournament is one of the world\'s most viewed sporting events and is considered the "flagship event of the international cricket calendar" by the ICC.',
            'remarks' => 'The tournament is held in a country or group of countries, which is decided by the ICC. The final is the most-watched one-day international (ODI) in the world, and is considered the "World Cup" of cricket. The tournament is held in England and Wales in 2019.',
            'banner' => '/images/tournament/default.png',
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);



        Tournament::create([
            'sports_id' => 3,
            'name' => 'FIFA World Cup',
            'icon' => '/images/tournament/default.png',
            'start_date' => '2023-03-17',
            'end_date' => '2023-03-25',
            'duration' => '10',
            'day' => 'waiting',
            'description' => 'The FIFA World Cup is an international association football competition contested by the senior men\'s national teams of the members of the Fédération Internationale de Football Association (FIFA), the sport\'s global governing body. The championship has been awarded every four years since the inaugural tournament in 1930, except in 1942 and 1946 when it was not held because of the Second World War.',
            'remarks' => 'The current champion is France, which won its second title at the 2018 tournament in Russia. 32 teams, including the automatically qualified host nation, compete in the tournament phase for the title at venues within the host nation(s) over a period of about a month.',
            'banner' => '/images/tournament/default.png',
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);



        Tournament::create([
            'sports_id' => 4,
            'name' => 'Indian Premier League',
            'icon' => '/images/tournament/default.png',
            'start_date' => '2023-03-17',
            'end_date' => '2023-03-25',
            'duration' => '10',
            'day' => 'waiting',
            'description' => 'The Indian Premier League (IPL) is a professional Twenty20 cricket league in India contested during March or April and May of every year by eight teams representing eight different cities in India. The league was founded by the Board of Control for Cricket in India (BCCI) in 2007. IPL has an exclusive window in ICC Future Tours Programme.',
            'remarks' => 'The IPL is the most-attended cricket league in the world and in 2014 ranked sixth by average attendance among all sports leagues.',
            'banner' => '/images/tournament/default.png',
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
