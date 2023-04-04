<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::all()->each(function ($account) {
            $account->delete();
        });
        // 120 Polls
        for ($index = 1; $index <= 500; $index++) {
            $phoneNumber = '01' . rand(10000000, 99999999);
            $account = Account::create([
                'phone' => $phoneNumber,
                'avatar' => 'https://picsum.photos/500/300?random=' . $index,
                'created_at' => now()->subDays(rand(1, 30)),
            ]);
        }
    }
}
