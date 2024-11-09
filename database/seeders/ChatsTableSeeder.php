<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chats')->insert([
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'message' => 'Hello, how are you?',
                'sent_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'message' => 'I am fine, thank you!',
                'sent_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
