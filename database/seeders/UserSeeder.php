<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'Vishnu Sharma',
                'email' => 'vishnu.sharma@gmail.com',
                'password' => bcrypt('111111'),
                'type' => 'user',
            ], [
                'name' => 'Saurabh Sharma',
                'email' => 'saurabh.sharma@gmail.com',
                'password' => bcrypt('111111'),
                'type' => 'admin',
            ],
        ];

        foreach ($admins as $admin) {
            User::create($admin);
        }
    }
}
