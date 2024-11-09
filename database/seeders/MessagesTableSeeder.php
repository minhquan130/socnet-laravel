<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('messages')->insert([
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'content' => 'Hi there!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'content' => 'Hello!',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
