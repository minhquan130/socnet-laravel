<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupMessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('group_messages')->insert([
            [
                'group_id' => 1,
                'sender_id' => 1,
                'content' => 'Welcome to the Laravel group!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'group_id' => 2,
                'sender_id' => 2,
                'content' => 'Hello PHP lovers!',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
