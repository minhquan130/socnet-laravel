<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            [
                'post_id' => 1,
                'user_id' => 1,
                'parent_comment_id' => null,
                'content' => 'Nice post!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 1,
                'user_id' => 2,
                'parent_comment_id' => 1,
                'content' => 'Thanks!',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
