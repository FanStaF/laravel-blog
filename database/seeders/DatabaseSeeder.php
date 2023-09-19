<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(5)->create();
        Post::factory(2)->create([
            'published_at' => now()->add(1, 'day')
        ]);
        Post::factory(2)->create([
            'published_at' => now()->subtract(1, 'day')
        ]);


        Comment::factory(5)->create();

        User::create([
            'name' => 'Staffan',
            'username' => 'fanstaf',
            'email' => 'fanstaf@hotmail.com',
            'password' => bcrypt('typiskt')
        ]);

    }
}
