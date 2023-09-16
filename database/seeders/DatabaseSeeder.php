<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(5)->create();
        Post::factory(20)->create();
        Comment::factory(5)->create();
        // User::factory(10)->create();

        User::create([
            'name' => 'Staffan',
            'username' => 'FanStaF',
            'email' => 'staffan@gmail.com',
            'password' => bcrypt('password')

        ]);
    }
}
