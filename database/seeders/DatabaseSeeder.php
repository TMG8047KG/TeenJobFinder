<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Type;
use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Tags
        Tag::create(['tag' => 'Remote',]);
        Tag::create(['tag' => 'Hybrid',]);
        Tag::create(['tag' => 'In-person',]);

        //Types
        Category::create(['name' => 'Job Offer']);
        Category::create(['name' => 'Job Seeker']);

//        User::factory()->create();
//        Post::factory(10)->create();



    }
}
