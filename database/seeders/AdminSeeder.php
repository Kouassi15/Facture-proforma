<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user -> email = 'admin@gmail.com';
        $user -> password = '12345678';
        $user -> name = 'Admin';
        $user -> save();

        $admin = new Admin();
        $admin -> user_id = $user->id;
        $admin -> save();
    }
}
