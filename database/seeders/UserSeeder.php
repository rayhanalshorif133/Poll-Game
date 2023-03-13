<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $superuser = Role::create(['name' => 'super-admin']);
        $adminUser = Role::create(['name' => 'admin']);
        // $permission = Permission::create(['name' => 'edit articles']);


        $user = User::create([
            'name' => 'super-admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($superuser);

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($adminUser);
    }
}
