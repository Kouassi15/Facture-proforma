<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $user -> role_as = 'admin';
        $user -> save();


        $admin = new Admin();
        $admin -> user_id = $user->id;
        $admin -> save();
    }
}
