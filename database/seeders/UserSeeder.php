<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat user dengan role admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('adminadmin')
        ]);

        // Membuat user dengan role user
        $user = User::create([
            'name' => 'User1',
            'email' => 'user1@example.com',
            'password' => bcrypt('user123')
        ]);

        // Menetapkan role ke user
        $admin->assignRole('admin');
        $user->assignRole('user');
    }
}
