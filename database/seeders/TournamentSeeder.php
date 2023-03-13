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
            'start_date' => '2021-09-01',
            'end_date' => '2021-12-01',
            'description' => 'The UEFA Champions League is an annual club football competition organised by the Union of European Football Associations (UEFA) and contested by top-division European clubs, deciding the best team in Europe. It is one of the most prestigious tournaments in the world and the most prestigious club competition in European football, played by the national league champion (and, for some nations, one or more runners-up) of each UEFA national association.',
            'remarks' => 'The tournament was first played in 1955–56,',
            'banner' => '/images/tournament/default.png',
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Tournament::create([
            'sports_id' => 2,
            'name' => 'Indian Premier League',
            'icon' => '/images/tournament/default.png',
            'start_date' => '2021-09-01',
            'end_date' => '2021-12-01',
            'description' => 'The Indian Premier League (IPL) is a professional Twenty20 cricket league in India contested during March or April and May of every year by eight teams representing eight different cities in India. The league was founded by the Board of Control for Cricket in India (BCCI) in 2007. IPL has an exclusive window in ICC Future Tours Programme.',
            'remarks' => 'The IPL is the most-attended cricket league in the world and in 2014 ranked sixth by average attendance among all sports leagues.',
            'banner' => '/images/tournament/default.png',
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
