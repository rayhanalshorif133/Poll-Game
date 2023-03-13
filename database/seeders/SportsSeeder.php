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
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Sports::create([
            'name' => 'Cricket',
            'icon' => '/images/sports/default.png',
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Sports::create([
            'name' => 'Basketball',
            'icon' => '/images/sports/default.png',
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Sports::create([
            'name' => 'Volleyball',
            'icon' => '/images/sports/default.png',
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
