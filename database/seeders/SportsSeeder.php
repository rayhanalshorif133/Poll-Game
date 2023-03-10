<?php

namespace Database\Seeders;

use App\Models\Sports;
use Illuminate\Database\Seeder;

class SportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get the
        Sports::create([
            'name' => 'Football',
            'icon' => '/images/sports/football-img.png',
            'btn_color' => "#00639B",
            'btn_shadow' => "#004a74",
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Sports::create([
            'name' => 'Cricket',
            'icon' => '/images/sports/c1-img.png',
            'btn_color' => "#788C00",
            'btn_shadow' => "#5b6a00",
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Sports::create([
            'name' => 'Tennis',
            'icon' => '/images/sports/tanise-img.png',
            'btn_color' => "#D900B6",
            'btn_shadow' => "#95007d",
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Sports::create([
            'name' => 'Volleyball',
            'icon' => '/images/sports/football-img.png',
            'btn_color' => "#00639B",
            'btn_shadow' => "#004a74",
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
