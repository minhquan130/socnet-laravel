<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FriendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('friends')->insert([
            [
                'user_id' => 1,
                'friend_id' => 2,
                'status' => 'accepted',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'friend_id' => 1,
                'status' => 'accepted',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
