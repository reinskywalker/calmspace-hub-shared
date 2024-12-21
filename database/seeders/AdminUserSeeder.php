<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'id' => Str::uuid(),
            'name' => 'Andre Reynaldi',
            'email' => 'reynaldi@calmspace.com',
            'password' => bcrypt('adminadmin'),
        ]);
        $user1->assignRole('user', 'admin', 'super-admin');

        $user2 = User::create([
            'id' => Str::uuid(),
            'name' => 'Theodore Verrill Kendrick',
            'email' => 'erick@calmspace.com',
            'password' => bcrypt('adminadmin'),
        ]);
        $user2->assignRole('user', 'admin', 'super-admin');

        $user3 = User::create([
            'id' => Str::uuid(),
            'name' => 'Meri Kasrina Aulia',
            'email' => 'meri@calmspace.com',
            'password' => bcrypt('adminadmin'),
        ]);
        $user3->assignRole('user', 'admin', 'super-admin');

        $user4 = User::create([
            'id' => Str::uuid(),
            'name' => 'Rio Evander Tarigan',
            'email' => 'rio@calmspace.com',
            'password' => bcrypt('adminadmin'),
        ]);
        $user4->assignRole('user', 'admin', 'super-admin');
    }
}
