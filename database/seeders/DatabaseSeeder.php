<?php

namespace Database\Seeders;

use App\Models\Tag;
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
        Tag::create([
            'tag' => 'job'
        ]);
        Tag::create([
            'tag' => 'seeker'
        ]);

        User::factory()->create();
//        Post::factory(10)->create();



    }
}
