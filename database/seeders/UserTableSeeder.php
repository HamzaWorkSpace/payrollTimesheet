<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'status' => 'active',
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'user',
                'status' => 'active',
            ],
            [
                'name' => 'Manager',
                'email' => 'manager@gmail.com',
                'password' =>bcrypt ('password'),
                'role' => 'manager',
                'status' => 'active',

            ],

        ]);

        // Use the factory to create 25 additional users
        User::factory()->count(15)->create([
            'role' => 'user',
        ]);

        // Use the factory to create 25 additional managers
        User::factory()->count(15)->create([
            'role' => 'manager',
        ]);

        // Use the factory to create 10 additional admins
        User::factory()->count(5)->create([
            'role' => 'admin',
        ]);
    }
}
