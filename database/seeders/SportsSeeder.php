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
            'icon' => '/images/sports/default.png',
            'btn_color' => "#00639B",
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Sports::create([
            'name' => 'Cricket',
            'icon' => '/images/sports/default.png',
            'btn_color' => "#788C00",
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Sports::create([
            'name' => 'Tennis',
            'icon' => '/images/sports/default.png',
            'btn_color' => "#D900B6",
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Sports::create([
            'name' => 'Volleyball',
            'icon' => '/images/sports/default.png',
            'btn_color' => "#6AA9CC",
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
