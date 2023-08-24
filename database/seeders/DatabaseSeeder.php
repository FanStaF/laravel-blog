<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
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

        User::truncate();
        Category::truncate();
        Post::truncate();

        User::factory(5)->create();

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        $hobbies = Category::create([
            'name' => 'Hobbies',
            'slug' => 'hobbies',
        ]);

        Post::create([
            'title' => "My Work Post",
            'slug' => 'my-work-post',
            'exerpt' => 'Ex nulla id non aliquip sit eiusmod elit proident amet.',
            'body' => 'Lorem et est culpa dolore tempor enim labore incididunt. Deserunt id eu incididunt duis ut. Voluptate pariatur fugiat fugiat veniam sint anim nisi aute minim reprehenderit.
                        Excepteur adipisicing esse adipisicing mollit aute proident quis do aliquip culpa. Id esse et veniam reprehenderit est ut aliqua. Sit duis nisi aliquip amet reprehenderit pariatur magna commodo ipsum consectetur ex ipsum sunt.
                        Et proident nostrud laborum voluptate irure ut esse ea aute incididunt id proident anim aliquip. Qui culpa consectetur id cillum proident culpa exercitation elit fugiat quis amet aute sint incididunt. Magna quis voluptate do minim anim fugiat ea tempor qui ea commodo voluptate nostrud reprehenderit. Et sit id dolore ipsum cupidatat anim ullamco pariatur adipisicing. Excepteur enim officia minim velit Lorem. Do dolore deserunt reprehenderit qui consequat duis duis in labore nisi.',
            'category_id' => $work->id,
            'user_id' => random_int(1, 5)
        ]);

        Post::create([
            'title' => "My Personal Post",
            'slug' => 'my-personal-post',
            'exerpt' => 'Qui eu sunt reprehenderit pariatur qui consequat irure eu aliqua laborum.',
            'body' => 'Velit elit commodo in cillum aliquip consequat magna cillum irure in. Est incididunt do ipsum eiusmod enim cillum do elit ipsum veniam excepteur laborum. Veniam qui occaecat aute enim id in excepteur cupidatat enim velit nostrud. Ad anim dolore incididunt eiusmod laborum duis. Consequat aliquip amet Lorem ullamco commodo minim consequat consequat esse anim dolore anim in commodo. Labore commodo commodo non laboris reprehenderit ea.
                        Sit officia laborum nisi fugiat aute elit. Enim ex laborum fugiat ullamco do ullamco dolore duis nostrud. Culpa laborum laboris occaecat proident incididunt et voluptate incididunt officia. Enim reprehenderit culpa pariatur ex labore quis.',
            'category_id' => $personal->id,
            'user_id' => random_int(1, 5)
        ]);

        Post::create([
            'title' => "My Hobby Post",
            'slug' => 'my-hobby-post',
            'exerpt' => 'Enim ea exercitation id excepteur culpa dolor sint enim nostrud ad pariatur adipisicing laborum.',
            'body' => 'Fugiat nulla ut esse amet cupidatat. Proident consequat sunt anim ex adipisicing ad sunt pariatur sit proident sint ut mollit proident. Ut laboris sunt amet ex esse dolor officia excepteur sint mollit veniam. Cillum aliqua eu nisi culpa ex consequat mollit reprehenderit dolore. Culpa ipsum amet amet tempor est eiusmod sit consequat duis laboris qui ea. Mollit exercitation nulla anim sit quis in sint non occaecat id eiusmod fugiat consequat. Voluptate occaecat nisi cupidatat amet aliquip duis consequat est dolor.
                        Quis quis ex pariatur sunt velit ullamco Lorem commodo eu cillum aliqua in. Tempor labore in nulla id deserunt magna. Ullamco et in amet eu consectetur quis excepteur eu anim dolor mollit officia cupidatat. Esse do consectetur Lorem aute. Enim labore adipisicing irure nostrud Lorem minim officia. Veniam eiusmod proident consectetur dolor exercitation enim amet quis enim.',
            'category_id' => $hobbies->id,
            'user_id' => random_int(1, 5)
        ]);
    }
}