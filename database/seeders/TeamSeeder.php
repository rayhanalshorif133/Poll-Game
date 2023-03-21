<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'name' => 'Ban',
            'logo' => '/images/team/default.png',
            'banner' => '/images/team/default.png',
            'status' => 'active',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nunc ut aliquam ultricies, nunc nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl. Sed euismod, nunc ut aliquam ultricies, nunc nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl.',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Team::create([
            'name' => 'Sri Lanka',
            'logo' => '/images/team/default.png',
            'banner' => '/images/team/default.png',
            'status' => 'active',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nunc ut aliquam ultricies, nunc nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl. Sed euismod, nunc ut aliquam ultricies, nunc nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl.',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Team::create([
            'name' => 'India',
            'logo' => '/images/team/default.png',
            'banner' => '/images/team/default.png',
            'status' => 'active',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nunc ut aliquam ultricies, nunc nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl. Sed euismod, nunc ut aliquam ultricies, nunc nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl.',
            'created_by' => 1,
            'updated_by' => 1,
        ]);


        Team::create([
            'name' => 'Pakistan',
            'logo' => '/images/team/default.png',
            'banner' => '/images/team/default.png',
            'status' => 'active',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nunc ut aliquam ultricies, nunc nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl. Sed euismod, nunc ut aliquam ultricies, nunc nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl.',
            'created_by' => 1,
            'updated_by' => 1,
        ]);


        Team::create([
            'name' => 'Team 5',
            'logo' => '/images/team/default.png',
            'banner' => '/images/team/default.png',
            'status' => 'active',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nunc ut aliquam ultricies, nunc nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl. Sed euismod, nunc ut aliquam ultricies, nunc nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl.',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
