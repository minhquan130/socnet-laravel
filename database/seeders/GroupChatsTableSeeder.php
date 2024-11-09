<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupChatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('group_chats')->insert([
            [
                'group_name' => 'Laravel Developers',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'group_name' => 'PHP Enthusiasts',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
