<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'john_doe',
                'email' => 'john@example.com',
                'password_hash' => Hash::make('password123'),
                'date_of_birth' => '1990-05-15', // Thêm ngày sinh
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'jane_doe',
                'email' => 'jane@example.com',
                'password_hash' => Hash::make('securepassword'),
                'date_of_birth' => '1992-08-22', // Thêm ngày sinh
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
