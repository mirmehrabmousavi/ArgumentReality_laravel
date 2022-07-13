<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = [
            [
                'name' => 'user',
                'email' => 'a@a.com',
                'password' => bcrypt('123456')
            ], [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'is_admin' => 1
            ]
        ];

        foreach($user as $value) {
            User::create($value);
        }
    }
}
