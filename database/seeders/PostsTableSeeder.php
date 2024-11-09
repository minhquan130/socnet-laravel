<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'content' => 'This is my first post!',
                'media_url' => 'https://example.com/image1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'content' => 'Hello world!',
                'media_url' => 'https://example.com/image2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
