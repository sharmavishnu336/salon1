<?php

namespace Database\Seeders;

use App\Models\UserServices;
use Illuminate\Database\Seeder;

class UserServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Hair cut',
                'status' => 1,
            ],
            [
                'name' => 'Shaving',
                'status' => 1,
            ],[
                'name' => 'Spa ',
                'status' => 1,
            ]
        ];

        foreach ($categories as $category) {
            UserServices::create($category);
        }
    }
}
